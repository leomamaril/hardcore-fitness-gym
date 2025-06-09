<?php
// Database credentials
include 'db.php';

// Get the data from the form
$email = mysqli_real_escape_string($conn, $_POST['email']); // Sanitize input
$status = mysqli_real_escape_string($conn, $_POST['action']); // Sanitize input
$mess = 'Your appointment has been ' . $status . ' by the admin.';
$created_at = date("M-d-Y h:i:s A");

// Insert data into database
$sql = "INSERT INTO `notification`(`email`, `status`, `mess`, `created_at`)
        VALUES ('$email', '$status', '$mess', '$created_at')";
if (mysqli_query($conn, $sql)) {
    echo "Notification added successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>