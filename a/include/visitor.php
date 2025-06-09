<?php
// Database credentials
include 'db.php';
// Get the data from the form
$name = $_POST['name'];
$age = $_POST['age'];
$contact = $_POST['contact'];
// Get the current date and time
$date = date("M-d-Y");
$time = date("h:i:s A");
$datetime = date("M-d-Y h:i:s A");
// Insert data into database
$sql_members = "INSERT INTO `visitor`(`name`, `age`, `contact`, `date`, `time`)
    VALUES ('$name','$age','$contact','$date','$time')";
mysqli_query($conn, $sql_members);
// Insert data into history
$activity = "INSERT INTO `history`(`activity`, `date`) VALUES
('Checked-In $name','$datetime')";
// Execute the query
mysqli_query($conn,$activity);
// Alert the user that the data has been added
echo '<script language="javascript" type="text/javascript">
alert("Added Success");
window.location = "../admin-index.php";
</script>';
?>