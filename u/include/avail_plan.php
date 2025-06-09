<?php
// Start session
session_start();

// Include database connection
include('db.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
        exit;
    }


    $user_id = $_SESSION['user_id'];


    $plan_type = $_POST['plan_type'];


    $start_date = date('Y-m-d'); // Current date
    $end_date = date('Y-m-d', strtotime($plan_type === 'Regular' ? '+1 day' : '+1 month'));


    // Update the user's plan in the database
    $sql = "UPDATE `user` SET `plan_type`='$plan_type',`start_date`='$start_date',`end_date`='$end_date',`status`='Active',`user_id`='$user_id' WHERE id = $user_id";
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the page or show a success message
        echo "<script>alert('Record updated successfully!'); window.location.href = '../admin-timetable.php';</script>";
    } else {
        // If there's an error, show the error message
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "'); window.location.href = '../admin-timetable.php';</script>";
    }
}

// Close the database connection
$conn->close();
?>