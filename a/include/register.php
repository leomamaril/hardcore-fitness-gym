<?php
// Database credentials
include 'db.php';
// Get the data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$mop = $_POST['mop'];
$age = $_POST['age'];
$plan = $_POST['plan'];
$amount = $_POST['payment'];
$contact = $_POST['contact'];
$status = $_POST['status'];
// Get the current date
$date = date("M-d-Y");
$start_date = date('Y-m-d'); // Current date
$end_date = date('Y-m-d', strtotime($plan === 'Regular' ? '+1 day' : '+1 month')); // Calculate end date based on plan
// Insert data into database
$sql_members = "INSERT INTO `user`(`lname`, `email`, `mop`, `age`, `plan_type`, `amount`, `contact`, `status`, `datetime`,`start_date`,`end_date`)
    VALUES ('$name','$email','$mop','$age','$plan','$amount','$contact','$status','$date','$start_date','$end_date')";
mysqli_query($conn, $sql_members);
// Get the current date and time
$datetime = date("M-d-Y h:i:s A");
// Insert data into history
$activity = "INSERT INTO `history`(`activity`, `date`) VALUES
('Register $name with the plan of $plan via $mop','$datetime')";
// Execute the query
mysqli_query($conn, $activity);
// Alert the user that the data has been added
echo '<script language="javascript" type="text/javascript">
alert("Added Success");
window.location = "../admin-index.php";
</script>';
?>