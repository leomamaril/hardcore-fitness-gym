<nav class="navbar sticky-top navbar-expand-xl navbar-dark bg-navbar pad">
    <a class="navbar-brand mb-1" href="user-index.php">
        <img src="assets/img/304946364_478615410946035_5163354841655361639_n.png" alt="" width="50" height="50">
    </a>
    <!-- Navbar Toggler Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar Links -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
                <a class="nav-link" data-target="#plans" href="#plans">Plans</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#feedback" href="#feedback">Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#timetable" href="#timetable">Timetable</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#contact" href="#contact">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle moul-regular text-white" href="#" id="navbarDarkDropdownMenuLink"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['user_name']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item moul-regular" href="user-profile.php"
                            data-id="<?php echo $row['id']; ?>">Profile</a></li>
                    <li><a class="dropdown-item moul-regular" href="include/logout.php">Logout</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown moulpali-regular">
                <a class="nav-link" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="material-symbols-outlined">notifications</span>
                </a>
                <?php

                include 'db.php';


                $sql = "SELECT * FROM notification ORDER BY created_at DESC";
                $result = mysqli_query($conn, $sql);


                $notifications = [];
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $notifications[] = $row;
                    }
                }
                ?>
                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDarkDropdownMenuLink">
                    <?php if (!empty($notifications)): ?>
                        <?php foreach ($notifications as $notification): ?>
                            <li>
                                <a class="dropdown-item  text-base" href="#">
                                    <?php echo htmlspecialchars($notification['mess']); ?>
                                    <p><small><?php echo htmlspecialchars($notification['created_at']); ?></small></p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><a class="dropdown-item" href="#">No notifications found.</a></li>
                    <?php endif; ?>
                </ul>
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
