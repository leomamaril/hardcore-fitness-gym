<?php
// ===== Connect Database ===== //
include "db.php";
session_start();
$page = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: ../signIn-signUp.php");
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
    <!-- Cascading Style Sheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/sidebar.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../assets/js/sidebars.js"></script>
    <title>Hardcore Admin</title>
</head>
<body>
    <!-- // ===== Sidebar ===== // -->
    <div class="sidebar close moulpali-regular">
        <div class="logo-details">
            <img src="../assets/img/304946364_478615410946035_5163354841655361639_n1.png">
            <span class="logo_name moul-regular">Hardcore Fitness Gym Admin</span>
        </div>
        <ul class="nav-links">
            <!-- // ===== Dashboard ===== // -->
            <li>
                <a href="../a/admin-index.php">
                    <i class="material-symbols-outlined">dashboard</i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <!-- // ===== Members ===== // -->
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class="material-symbols-outlined">people</i>
                        <span class="link_name">Members</span>
                    </a>
                    <i class="material-symbols-outlined arrow">expand_more</i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Members</a></li>
                    <li><a href="admin-member-user.php">Users</a></li>
                    <li><a href="admin-member-regular.php">Regular Members</a></li>
                    <li><a href="admin-member-monthly.php">Monthly Members</a></li>
                </ul>
            </li>
            <!-- // ===== Appointment ===== // -->
            <li>
                <a href="admin-appointment.php">
                    <i class="material-symbols-outlined">insert_invitation</i>
                    <span class="link_name">Appointment</span>
                </a>
            </li>
            <!-- // ===== Timetable ===== // -->
            <li>
                <a href="admin-timetable.php">
                    <i class="material-symbols-outlined">apps</i>
                    <span class="link_name">Timetable</span>
                </a>
            </li>
            <!-- // ===== Feedback ===== // -->
            <li class="active">
                <a href="admin-feedback.php">
                    <i class="material-symbols-outlined">feedback</i>
                    <span class="link_name">Feedback</span>
                </a>
            </li>
            <li>

      <div class="profile-details">
        <div class="profile-content">
          <!--<img src="image/profile.jpg" alt="profileImg">-->
        </div>
        <div class="name-job">
          <div class="profile_name"><?php echo $_SESSION['user_name'], ' ';
          echo $_SESSION['user_lname']; ?></div>
          <div class="job"><?php echo $_SESSION['user_role'] ?></div>
        </div>
        <a href="include/logout.php">
          <i class="material-symbols-outlined">
            logout
          </i>
        </a>

      </div>
    </li>
        </ul>
    </div>
    <!-- // ===== Sidebar End ===== // -->
    <!-- // ===== Sidebar Script ===== // -->
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
    <!-- // ===== Sidebar Script End ===== // -->
    <!-- // ===== Feedback Section ===== // -->
    <section class="home-section">
        <section class="historyLog">
            <div class="header moul-regular">Feedback</div>
            <table class="table">
                <thead>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                    // ===== Connect Database ===== //
                    $ret = mysqli_query($conn, "SELECT * from feedback ORDER BY id DESC");
                    $cnt = 1;
                    // ===== Fetch Data from Database ===== //
                    while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <tr>
                            <td data-label="#"><?php echo $cnt; ?></td>
                            <td data-label="name"><?php echo $row['name']; ?></td>
                            <td data-label="email"><?php echo $row['email']; ?></td>
                            <td data-label="message"><?php echo $row['mess']; ?></td>
                            <td data-label="date"><?php echo $row['create_at']; ?></td>
                            <td data-label="Action">
                                    <a href="mailto:<?php echo $row['email']; ?>"> <button type="submit"
                                            name="view">Reply</button></a>
                                </td>
                        </tr>
                        <?php
                        // ===== Increment Counter ===== //
                        ++$cnt;
                    } ?>
                </tbody>
            </table>
            </div>
        </section>
    </section>
</body>
</html>