<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hardcore";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: {$conn->connect_error}");
}
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    // Validate form data (basic validation)
    if (empty($name) || empty($contact) || empty($email) || empty($date) || empty($time)) {
        die("All fields are required.");
    }
    // Insert data into the database
    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO appointment (name, contact, email, date, time) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        // Bind parameters to the statement
        $stmt->bind_param("sssss", $name, $contact, $email, $date, $time);
        // Execute the statement
        if ($stmt->execute()) {
            echo "Appointment booked successfully!";
            header("Location: ../user-index.php");
        } else {
            echo "Error: {$stmt->error}";
        }
        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
// Close the connection
$conn->close();
