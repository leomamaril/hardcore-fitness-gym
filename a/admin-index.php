<?php
// ===== Conneect Database ===== //

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
            <li class="active">
                <a href="admin-index.php">
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
            <li>
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
    <!-- // ===== Home Section ===== // -->
    <section class="home-section moulpali-regular">
        <div class="header moul-regular">Dashboard</div>
        <div class="container-dashboard">
            <div>
                <div class="grid-container">
                    <!-- ===== Register Button ===== -->
                    <div type="button" data-bs-toggle="modal" data-bs-target="#RegisterCS" style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Register Member</span>
                            </div>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>
                    <!-- ===== Check In / Out Button ===== -->
                    <div data-bs-toggle="modal" data-bs-target="#CheckIn/Out" style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Check-In/Out</span>
                            </div>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>
                    <!-- ===== Users Button ===== -->
                    <div onclick="location.href='admin-member-user.php';" style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Users</span>
                            </div>
                        </div>
                        <div class="float-right">
                            <?php
                            // ===== Count User ===== //
                            $sql = "SELECT count(id) As total from user";
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_assoc($result);
                            $num_rows = $value['total'];
                            ?>
                            <!-- // ===== Display User Count ===== // -->
                            <span class="numCount"><?php echo $num_rows; ?></span>
                        </div>
                    </div>
                    <!-- ===== Monthly Member Button ===== -->
                    <div onclick="location.href='admin-member-monthly.php';" style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Monthly Members</span>
                            </div>
                        </div>
                        <div class="float-right">
                            <?php
                            // ===== Count Monthly Member ===== //
                            $sql = "SELECT count(id) As total from user WHERE plan_type = 'Monthly'";
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_assoc($result);
                            $num_rows = $value['total']
                                ?>
                            <!-- // ===== Display Monthly Member Count ===== // -->
                            <span class="numCount"><?php echo $num_rows; ?></span>
                        </div>
                    </div>
                    <!-- ===== Regular Member Button ===== -->
                    <div onclick="location.href='admin-member-regular.php';" style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Regular Members</span>
                            </div>
                        </div>
                        <div class="float-right">
                            <?php
                            // ===== Count Regular Member ===== //
                            $sql = "SELECT count(id) As total from user WHERE plan_type = 'Regular'";
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_assoc($result);
                            $num_rows = $value['total']
                                ?>
                            <!-- // ===== Display Regular Member Count ===== // -->
                            <span class="numCount"><?php echo $num_rows; ?></span>
                        </div>
                    </div>
                    <!-- ===== Appointment Button ===== -->
                    <div onclick="location.href='admin-appointment.php';" style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Appointment</span>
                            </div>
                        </div>
                        <div class="float-right">
                            <?php
                            // ===== Count Appointment ===== //
                            $sql = "SELECT count(id) As total from appointment";
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_assoc($result);
                            $num_rows = $value['total']
                                ?>
                            <!-- // ===== Display Appointment Count ===== // -->
                            <span class="numCount"><?php echo $num_rows; ?></span>
                        </div>
                    </div>
                    <!-- ===== Feedback Button ===== -->
                    <div onclick="location.href='admin-feedback.php';" style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Feedback</span>
                            </div>
                        </div>
                        <div class="float-right">
                            <?php
                            // ===== Count Feedback ===== //
                            $sql = "SELECT count(id) As total from feedback";
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_assoc($result);
                            $num_rows = $value['total']
                                ?>
                            <!-- // ===== Display Feedback Count ===== // -->
                            <span class="numCount"><?php echo $num_rows; ?></span>
                        </div>
                    </div>
                    <!-- ===== Time Table Button ===== -->
                    <div onclick="location.href='admin-timetable.php';" style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Time Table</span>
                            </div>
                        </div>
                        <div class="float-right">
                        </div>
                    </div>
                    <!-- ===== Visitor Button ===== -->
                    <div onclick="location.href='admin-visitor.php';" style="cursor: pointer;">
                        <!-- div left -->
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Visitor</span>
                            </div>
                        </div>
                        <!-- div right -->
                        <div class="float-right">
                            <?php
                            // ===== Count Visitor ===== //
                            $date = date("M-d-Y");
                            $sql = "SELECT  count(id) As total from visitor WHERE date = '$date'";
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_assoc($result);
                            $num_rows = $value['total']
                                ?>
                            <!-- // ===== Display Visitor Count ===== // -->
                            <span class="numCount"><?php echo $num_rows; ?></span>
                        </div>
                    </div>
                    <!-- ===== Sales Button ===== -->
                    <div style="cursor: pointer;">
                        <div class="float-left">
                            <div>
                            </div>
                            <div>
                                <span class="numCount">Sales</span>
                            </div>
                        </div>
                        <div class="float-right">
                            <?php
                            // ===== Count Sales ===== //
                            $date = date("M-d-Y");
                            // ===== Select Amount from Database ===== //
                            $sql = "SELECT SUM(amount) As total from user WHERE datetime = '$date'";
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_assoc($result);
                            $num_rows = $value['total']
                                ?>
                            <!-- // ===== Display Sales Amount ===== // -->
                            <span class="numCount"><?php echo $num_rows; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="modal fade" id="RegisterCS" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">

                            <div class="content">
                                <!-- // ===== Register Form ===== // -->
                                <form action="include/register.php" method="POST">
                                    <div class="user-details">
                                        <!-- // ===== Name, Email, Mode of Payment ===== // -->
                                        <div class="input-box">
                                            <!-- // ===== Name ===== // -->
                                            <span class="details">Name</span>
                                            <input type="text" id="name" name="name" placeholder="Name" required>
                                            <!-- // ===== Email ===== // -->
                                            <span class="details">Email</span>
                                            <input type="email" id="email" name="email" placeholder="Email" required>
                                            <!-- // ===== Mode of Payment ===== // -->
                                            <span class="details">Mode of Payment</span>
                                            <select name="mop" id="mop" class="select-box">
                                                <?php
                                                // ===== Select Query ===== //
                                                $sql = "SELECT * FROM mop ";
                                                // ===== Execute Query ===== //
                                                $all_mop = mysqli_query($conn, $sql);
                                                // ===== Fetch Data ===== //
                                                while (
                                                    $mop = mysqli_fetch_array(
                                                        $all_mop,
                                                        MYSQLI_ASSOC
                                                    )
                                                ):
                                                    ; ?>
                                                    <!-- // ===== Display Data ===== // -->
                                                    <option value="<?php echo $mop["mop"]; ?>">
                                                        <?php echo $mop["mop"]; ?>
                                                    <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <!-- // ===== Age, Plan, Payment, Contact, Status ===== // -->
                                        <div class="input-box">
                                            <!-- // ===== Age ===== // -->
                                            <span class="details">Age</span>
                                            <input type="text" id="age" name="age" placeholder="Age" required>
                                            <!-- // ===== Plan ===== // -->
                                            <span class="details">Plan</span>
                                            <select name="plan" id="plan" class="select-box">
                                                <?php
                                                // ===== Select Query ===== //
                                                $sql = "SELECT * FROM plan ";
                                                // ===== Execute Query ===== //
                                                $all_mop = mysqli_query($conn, $sql);
                                                // ===== Fetch Data ===== //
                                                while (
                                                    $mop = mysqli_fetch_array(
                                                        $all_mop,
                                                        MYSQLI_ASSOC
                                                    )
                                                ):
                                                    ; ?>
                                                    <!-- // ===== Display Data ===== // -->
                                                    <option value="<?php echo $mop["plan"]; ?>">
                                                        <?php echo $mop["plan"]; ?>
                                                    <?php endwhile; ?>
                                            </select>
                                            <!-- // ===== Payment ===== // -->
                                            <span class="details">Payment</span>
                                            <select name="payment" id="payment" class="select-box">
                                                <?php
                                                // ===== Select Query ===== //
                                                $sql = "SELECT * FROM payment ";
                                                // ===== Execute Query ===== //
                                                $all_payment = mysqli_query($conn, $sql);
                                                // ===== Fetch Data ===== //
                                                while (
                                                    $payment = mysqli_fetch_array(
                                                        $all_payment,
                                                        MYSQLI_ASSOC
                                                    )
                                                ):
                                                    ; ?>
                                                    <!-- // ===== Display Data ===== // -->
                                                    <option value="<?php echo $payment["payment"]; ?>">
                                                        <?php echo $payment["payment"]; ?>
                                                    <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <!-- // ===== Contact, Status ===== // -->
                                        <div class="input-box">
                                            <!-- // ===== Contact ===== // -->
                                            <span class="details">Contact No.</span>
                                            <input type="number" id="contact" name="contact" placeholder="Contact No"
                                                required>
                                            <!-- // ===== Status ===== // -->
                                            <span class="details">Status</span>
                                            <select name="status" id="status" class="select-box">
                                                <?php
                                                // ===== Select Query ===== //
                                                $sql = "SELECT * FROM status ";
                                                // ===== Execute Query ===== //
                                                $all_status = mysqli_query($conn, $sql);
                                                // ===== Fetch Data ===== //
                                                while (
                                                    $status = mysqli_fetch_array(
                                                        $all_status,
                                                        MYSQLI_ASSOC
                                                    )
                                                ):
                                                    ; ?>
                                                    <!-- // ===== Display Data ===== // -->
                                                    <option value="<?php echo $status["stats"]; ?>">
                                                        <?php echo $status["stats"]; ?>
                                                    <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- // ===== Button ===== // -->
                                    <div class="button">
                                        <input type="submit" id="submitData" name="submit" value="Submit">
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="CheckIn/Out" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="content">
                            <!-- // ===== Check-In / Check-Out Form ===== // -->
                            <form action="include/visitor.php" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <!-- ===== Name ===== -->
                                        <span class="details">Name</span>
                                        <input type="text" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="input-box">
                                        <!-- ===== Age ===== -->
                                        <span class="details">Age</span>
                                        <input type="text" id="age" name="age" placeholder="Age" required>
                                    </div>
                                    <div class="input-box">
                                        <!-- ===== Contact No ===== -->
                                        <span class="details">Contact No.</span>
                                        <input type="number" id="contact" name="contact" placeholder="Contact No"
                                            required>
                                    </div>
                                </div>
                                <!-- // ===== Submit Button ===== // -->
                                <div class="button">
                                    <input type="submit" id="submitData" name="submit" value="Submit">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <!-- ===== History Log ===== -->
        <div class="main-top">
            <div class="header moul-regular">Activity Log</div>
        </div>
        <section class="historyLog">

            <table class="table">
                <thead>
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                    // ===== Select Data from Database ===== //
                    $ret = mysqli_query($conn, "SELECT * from history ORDER BY id DESC");
                    $cnt = 1;
                    // ===== Fetch Data from Database ===== //
                    while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <tr>
                            <td data-label="name"><?php echo $row['activity']; ?></td>
                            <td data-label="contact"><?php echo $row['date']; ?></td>
                        </tr>
                        <?php
                        // ===== Increment Counter ===== //
                        $cnt++;
                    } ?>
                </tbody>
            </table>

        </section>
    </section>
</body>

</html>