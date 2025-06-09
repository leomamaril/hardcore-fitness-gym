<?php
// ===== Database Connection ===== //
include('db.php'); // Include your database connection file

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update the status in the database
    $sql = "UPDATE appointment SET status = '$status' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo 'success'; // Return success response
    } else {
        echo 'error'; // Return error response
    }
} else {
    echo 'invalid'; // Invalid request
}
?>