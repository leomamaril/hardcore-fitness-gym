<?php
// Start session
session_start();

// Include database connection
include "db.php";

// Check if session variables are set
if (!isset($_SESSION['user_name']) || !isset($_SESSION['user_lname']) || !isset($_SESSION['user_age']) || !isset($_SESSION['user_contact']) || !isset($_SESSION['user_email'])) {
    die("Session variables are not set. Please log in again.");
}

// Sanitize and validate session data
$name = htmlspecialchars($_SESSION['user_name'] . ' ' . $_SESSION['user_lname']); // Concatenate first name and last name
$age = intval($_SESSION['user_age']); // Ensure age is an integer
$contact = htmlspecialchars($_SESSION['user_contact']); // Sanitize contact number
$email = filter_var($_SESSION['user_email'], FILTER_SANITIZE_EMAIL); // Sanitize email

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Other data
$datetime = date("M-d-Y");
$amount = '600';
$status = 'Active';
$mop = 'Walk-In';
$plan = 'Monthly';
$start_date = date('Y-m-d'); // Current date
$end_date = date('Y-m-d', strtotime($plan === 'Regular' ? '+1 day' : '+1 month')); // Calculate end date based on plan

// Update data in the `user` table using prepared statements
$sql_members = "UPDATE `user`
                SET `plan_type` = ?, `start_date` = ?, `end_date` = ?, `status` = ?, `mop` = ?,`amount` = ?,`datetime` = ?
                WHERE `email` = ?"; // Update based on email
$stmt = $conn->prepare($sql_members);

if ($stmt) {
    // Bind parameters to the SQL query
    $stmt->bind_param("ssssssss", $plan, $start_date, $end_date, $status, $mop, $amount,$datetime,$email);

    // Execute the update query
    if ($stmt->execute()) {
        // Insert data into the `history` table to log the update
        $datetime = date("M-d-Y h:i:s A"); // Current date and time
        $activity_description = "Updated user $name with the plan of $plan via $mop"; // Activity description

        $sql_history = "INSERT INTO `history` (`activity`, `date`)
                        VALUES (?, ?)";
        $stmt_history = $conn->prepare($sql_history);

        if ($stmt_history) {
            $stmt_history->bind_param("ss", $activity_description, $datetime);

            if ($stmt_history->execute()) {
                // Alert the user that the data has been updated
                echo '<script language="javascript" type="text/javascript">
                      alert("Updated Successfully");
                      window.location = "../user-index.php";
                      </script>';
            } else {
                // Log the error and display a user-friendly message
                error_log("Error inserting into history: " . $stmt_history->error);
                echo "An error occurred while saving the history. Please try again.";
            }

            $stmt_history->close();
        } else {
            // Log the error and display a user-friendly message
            error_log("Error preparing history statement: " . $conn->error);
            echo "An error occurred while preparing the history statement. Please try again.";
        }
    } else {
        // Log the error and display a user-friendly message
        error_log("Error updating user: " . $stmt->error);
        echo "An error occurred while updating the user details. Please try again.";
    }

    $stmt->close();
} else {
    // Log the error and display a user-friendly message
    error_log("Error preparing user statement: " . $conn->error);
    echo "An error occurred while preparing the statement. Please try again.";
}

// Close the database connection
$conn->close();
?>