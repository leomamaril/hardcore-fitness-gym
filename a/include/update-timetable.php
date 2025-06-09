<?php
// Include your database connection file
include('db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the form data and sanitize it
    $id = intval($_POST['id']); // Ensure ID is an integer
    $activity = mysqli_real_escape_string($conn, $_POST['activity']);
    $trainer_name = mysqli_real_escape_string($conn, $_POST['trainer_name']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($conn, $_POST['end_time']);

    // Prepare the update query
    $sql = "UPDATE timetable SET
            activity = '$activity',
            trainer_name = '$trainer_name',
            start_time = '$start_time',
            end_time = '$end_time'
            WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the page or show a success message
        echo "<script>alert('Record updated successfully!'); window.location.href = '../admin-timetable.php';</script>";
    } else {
        // If there's an error, show the error message
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "'); window.location.href = '../admin-timetable.php';</script>";
    }
}
?>