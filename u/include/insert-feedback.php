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
    $email = $_POST['email'];
    $mess = $_POST['message'];
    $create_at = date(  'Y-m-d h:i:s');
    // Validate form data (basic validation)
    if (empty($name) || empty($mess) || empty($email)) {
        die("All fields are required.");
    }
    // Insert data into the database
    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO feedback (name, email, mess, create_at) VALUES (?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        // Bind parameters to the statement
        $stmt->bind_param("ssss", $name, $email, $mess,$create_at);
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
