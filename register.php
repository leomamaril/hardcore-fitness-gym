<?php
include 'db.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $contact = $_POST['contact'];
    $age     = $_POST['age'];
    $email   = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user (fname, lname, contact, age, email, pass) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $fname, $lname, $contact, $age, $email, $pass);
    // Execute the statement
    if ($stmt->execute()) {
        echo "alert('New record inserted successfully')";
        // Redirect to login page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: {$stmt->error}";
    }
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
