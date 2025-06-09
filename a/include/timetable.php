<?php
// Database credentials
include 'db.php';
// Get the data from the form
$day = $_POST['day'];
$time_slot = $_POST['time_slot'];
$activity = $_POST['activity'];
$trainer_name = $_POST['trainer_name'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];

$user = $_SESSION['user_name'];
// Insert data into database
$sql_members = "INSERT INTO `timetable`(`day`, `time_slot`, `activity`, `trainer_name`, `start_time`, `end_time`)
    VALUES ('$day','$time_slot','$activity','$trainer_name','$start_time','$end_time')";
mysqli_query($conn, $sql_members);
// Get the current date and time
$datetime = date("M-d-Y h:i:s A");
// Insert data into history
$activity = "INSERT INTO `history`(`activity`, `date`) VALUES
('Admin $user set a TimeTable','$datetime')";
// Execute the query
mysqli_query($conn, $activity);
// Alert the user that the data has been added
echo '<script language="javascript" type="text/javascript">
alert("Added Success");
window.location = "../admin-index.php";
</script>';
?>