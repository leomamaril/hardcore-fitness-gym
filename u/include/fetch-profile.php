<?php
session_start();
include 'db.php'; // Ensure this file contains the database connection logic

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row); // Return data as JSON
        } else {
            echo json_encode(["error" => "No user found"]);
        }
    } else {
        echo json_encode(["error" => "Database query failed"]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>