<?php
session_start();

include 'db.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset_password"])) {
    $email = trim($_POST["email"]);

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email exists, redirect to reset password page
        $_SESSION["reset_email"] = $email;
        header("Location: reset-password.php");
        exit();
    } else {
        // Email not found, set error message
        $error_message = "<p style='color: red;'>Email not found. Please enter a valid email address.</p>";
    }
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
    <!-- Cascading Style Sheet -->
    <link href="assets/css/style.css" rel="stylesheet">

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

    <title>Forgot Password</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-xl navbar-dark bg-navbar pad">
        <a class="navbar-brand mb-1" href="index.php">
            <img src="assets/img/304946364_478615410946035_5163354841655361639_n.png" alt="" width="50" height="50">
        </a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
            <ul class="navbar-nav moul-regular">
                <li class="nav-item">
                    <a class="nav-link" data-target="#home" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#services" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#appointment" href="#appointment">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#about" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#plans" href="#plans">Plans </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#feedback" href="#feedback">Feedback </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#timetable" href="#timetable">Timetable </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#contact" href="#contact">Contact</a>
                </li>

            </ul>
        </div>
    </nav>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navLinks = document.querySelectorAll(".nav-link");
            const sections = document.querySelectorAll("section");

            function activateNavLink() {
                let index = sections.length;

                // Loop through sections to find the one in view
                while (--index && window.scrollY + 50 < sections[index].offsetTop) { }

                // Remove active class from all links
                navLinks.forEach((link) => link.classList.remove("active"));

                // Add active class to the current link
                navLinks[index].classList.add("active");
            }

            // Listen for scroll events
            window.addEventListener("scroll", activateNavLink);

            // Activate the first link on page load
            activateNavLink();
        });
    </script>
    <?php
    include 'db.php';

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset_password"])) {
        $email = trim($_POST["email"]);

        // Check if the email exists in the database
        $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Email exists, redirect to reset password page
            $_SESSION["reset_email"] = $email;
            header("Location: reset-password.php");
            exit();
        } else {
            // Email not found, set error message
            $error_message = "<p style='color: red;'>Email not found. Please enter a valid email address.</p>";
        }
    }
    ?>

    <div class="container-fluid ">
        <div class="row">
            <div class="bg-forgot-password">
                <div
                    class="d-flex flex-column justify-content-center align-items-center h-100 text-center text-white pad">
                    <div class="container-forgot moulpali-regular" id="container-login">
                        <div class="form-container-forgot ">
                            <form class="form-base" action="forgot-password.php" method="POST">
                                <h1 class="moul-regular text-base">Forgot Password</h1>
                                <p class="text-base">Enter your email address to reset your password.</p>
                                <?php if (!empty($error_message)) { ?>
                                    <div class="error-message"><?php echo $error_message; ?></div>
                                <?php } ?>
                                <input class="input-base-forgot" type="email" name="email" placeholder="Email" required>
                                <button class="button-base text-base moulpali-regular" type="submit"
                                    name="reset_password">Reset Password</button>
                                <a href="index.php" class="a-decor">Back to Login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script src="assets/js/script.js"></script>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
</body>

</html>