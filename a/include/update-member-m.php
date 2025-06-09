<?php
// Include your database connection file
include('db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the form data and sanitize it
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mop = mysqli_real_escape_string($conn, $_POST['mop']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $plan = mysqli_real_escape_string($conn, $_POST['plan']);
    $payment = mysqli_real_escape_string($conn, $_POST['amount']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $dos = mysqli_real_escape_string($conn, $_POST['dos']);
    $doe = mysqli_real_escape_string($conn, $_POST['doe']);

    // Prepare the update query
    $sql = "UPDATE user SET
            email = '$email',
            mop = '$mop',
            age = '$age',
            plan_type = '$plan',
            amount = '$payment',
            contact = '$contact',
            start_date = '$dos',
            end_date = '$doe'
            WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the page or show a success message
        echo "<script>alert('Profile updated successfully!'); window.location.href = '../admin-member-monthly.php';</script>";
    } else {
        // If there's an error, show the error message
        echo "<script>alert('Error updating profile: " . mysqli_error($conn) . "'); window.location.href = '../admin-member-regular.php';</script>";
    }
}
?>
