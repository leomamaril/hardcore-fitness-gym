<?php
session_start();
include 'db.php'; // Include the database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input data
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
    $lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $age = isset($_POST['age']) ? intval($_POST['age']) : 0;
    $plan = isset($_POST['plan']) ? trim($_POST['plan']) : '';
    $payment = isset($_POST['payment']) ? trim($_POST['payment']) : '';
    $contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
    $mop = isset($_POST['mop']) ? trim($_POST['mop']) : '';
    $status = isset($_POST['status']) ? trim($_POST['status']) : '';
    $dos = isset($_POST['dos']) ? trim($_POST['dos']) : '';
    $doe = isset($_POST['doe']) ? trim($_POST['doe']) : '';

    // Validate required fields
    if (empty($fname) || empty($lname) || empty($email) || empty($contact)) {
        echo "Please fill in all required fields.";
        exit();
    }

    // Prepare the SQL query to update the user profile
    $sql = "UPDATE user SET
            fname = ?,
            lname = ?,
            email = ?,
            age = ?,
            plan_type = ?,
            amount = ?,
            contact = ?,
            mop = ?,

            start_date = ?,
            end_date = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind parameters to the query
        $stmt->bind_param(
            "sssissssssi",
            $fname,
            $lname,
            $email,
            $age,
            $plan,
            $payment,
            $contact,
            $mop,

            $dos,
            $doe,
            $id
        );

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to the profile page with a success message
            $_SESSION['success_message'] = "Profile updated successfully!";
            header("Location: ../user-profile.php");
            exit();
        } else {
            // Handle database error
            echo "Error updating profile: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Database query preparation failed.";
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect to the profile page
    header("Location: ../user-profile.php");
    exit();
}
?>