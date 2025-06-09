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
<!-- Navigation here -->

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
    <section id="contact">
        <div class="container-fluid bg-base mt-2">
            <div
                class="row row-cols-1 row-cols-md-3 g-2 g-lg-3 text-start-center moulpali-regular justify-content-center text-white pad">
                <div class="col ">
                    <div class="">
                        <h4 class="moul-regular fs-5 contact-text-header">Contact Us</h4>
                        <p class="fs-6"><a href="tel:+63 999 6666 999" class="a-decor-contact">+63 999 6666 999</a></p>
                        <p class="fs-6">Quezon Boulevard, Bayambang, Pangasinan, Bayambang,<br> Philippines, 2324</p>
                        <p class="fs-6"><a href="mailto:hardcorefitness@gmail.com"
                                class="a-decor-contact">hardcorefitness@gmail.com</a></p>
                                <h4 class="moul-regular fs-5 contact-text-header">Opening Hours</h4>
                        <p class="fs-6"><span class="moul-regular">Mon-Sat</span>: 07:00AM - 08:00PM</p>
                        <p class="fs-6"><span class="moul-regular">Sunday</span>: 08:00AM - 12:00NN</p>
                    </div>
                </div>
                <div class="col ">
                    <div class="">
                        <h4 class="moul-regular fs-5 contact-text-header">Popular Link</h4>
                       <span><a href="#home" class="a-decor-contact fs-6">Home</a></span><br>
                       <span><a href="#services" class="a-decor-contact fs-6">Services</a></span><br>
                       <span><a href="#appointment" class="a-decor-contact fs-6">Appointment</a></span><br>
                       <span><a href="#about" class="a-decor-contact fs-6">About</a></span><br>
                       <span><a href="#plans" class="a-decor-contact fs-6">Plans</a></span><br>
                       <span><a href="#feedback" class="a-decor-contact fs-6">Feedback</a></span><br>
                       <span><a href="#contact" class="a-decor-contact fs-6">Timetable</a></span>
                    </div>
                </div>
                <div class="col ">
                    <div class="">
                        <h4 class="moul-regular fs-5 contact-text-header">Location</h4>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3838.9379978345205!2d120.45431247588985!3d15.80722298483497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339149225781f061%3A0x15d7558906d00996!2sHardcore%20Fitness%20Gym!5e0!3m2!1sen!2sph!4v1741323802410!5m2!1sen!2sph"
                            style="border:0;" width="100%" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </iframe>
                    </div>
                </div>
            </div>
            <div
                class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3 text-start-center moulpali-regular  justify-content-center text-white">
                <div class="col ">
                    <div class=" p-3 text-center">
                        <span class="fs-6">©Copyright 2025 © Allrights reserved | Hardcore Fitness gym</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- To make the animation work it needs to declare AOS.init-->
    <script>
        AOS.init();
    </script>
</body>
</html>