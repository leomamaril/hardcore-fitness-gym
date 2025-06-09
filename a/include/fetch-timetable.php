<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitize input

    // Fetch data from the database
    $stmt = $conn->prepare("SELECT * FROM timetable WHERE id = ?");
    if (!$stmt) {
        die(json_encode(['error' => 'Prepare failed: ' . $conn->error])); // Return JSON error
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row); // Return data as JSON
    } else {
        echo json_encode(['error' => 'No data found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>