<?php
// ===== Conneect Database ===== //

include "../db.php";
session_start();
$page = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google font Moul/Moulpali -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moul&family=Moulpali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=notifications" />
    <!-- Cascading Style Sheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <!-- Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Hardcore</title>
</head>

<body>
    <!-- Navigation -->
    <?php include 'php/navigation.php' ?>
    <!-- Home Panel -->
    <?php include 'php/home.php' ?>
    <!-- Exercise Panel -->
    <?php include 'php/services.php' ?>
    <!-- Book a Appointment -->
    <?php include 'php/appointment.php' ?>
    <!-- Abaout Us Panel -->
    <?php include 'php/about.php' ?>
    <!-- Plans Panel -->
    <?php include 'php/plan.php' ?>
    <!-- Feedback -->
    <?php include 'php/feedback.php' ?>
    <!-- User Feedback -->
    <?php include 'php/user_feedback.php' ?>
    <!-- Timetable -->
    <?php include 'php/timetable.php' ?>
    <!-- Contact Panel -->
    <?php include 'php/contact.php' ?>
    <!-- To make the animation work it needs to declare AOS.init-->
    <script>AOS.init();</script>
</body>

</html>