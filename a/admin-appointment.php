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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
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
            <li class="active">
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
    <!-- // ===== Appointment Section ===== // -->
    <section class="home-section">
        <section class="historyLog">
            <div class="header moul-regular">Appointment</div>
            <table class="table">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // ===== Select Data from Database ===== //
        $ret = mysqli_query($conn, "SELECT * from appointment");
        $cnt = 1;
        // ===== Fetch Data from Database ===== //
        while ($row = mysqli_fetch_array($ret)) {
            $status = $row['status']; // Get the current status
            $isDisabled = ($status === 'Approved' || $status === 'Declined') ? 'disabled' : ''; // Disable if already approved or declined
            ?>
            <tr class="text-center" id="row-<?php echo $row['id']; ?>">
                <td data-label="#"><?php echo $cnt; ?></td>
                <td data-label="name"><?php echo $row['name']; ?></td>
                <td data-label="contact"><?php echo $row['contact']; ?></td>
                <td data-label="email"><?php echo $row['email']; ?></td>
                <td data-label="date"><?php echo $row['date']; ?></td>
                <td data-label="time"><?php echo $row['time']; ?></td>
                <td data-label="status" id="status-<?php echo $row['id']; ?>">
                    <?php echo $status; // Display current status ?>
                </td>
                <td data-label="Action" class="align-items-center">
                    <!-- Accept Button -->
                    <button type="button" class="accept-btn" data-id="<?php echo $row['id']; ?>" data-email="<?php echo $row['email']; ?>" <?php echo $isDisabled; ?>>
    Accept
</button>
                <!-- Decline Button -->
                <button type="button" class="decline-btn" data-id="<?php echo $row['id']; ?>" data-email="<?php echo $row['email']; ?>" <?php echo $isDisabled; ?>>
                    Decline
                </button>
                </td>
            </tr>
            <?php
            // ===== Increment Counter ===== //
            ++$cnt;
        } ?>
    </tbody>
</table>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
    // Handle Accept Button Click
    $('.accept-btn').click(function () {
        var id = $(this).data('id'); // Get the appointment ID
        var email = $(this).data('email'); // Get the email
        updateStatus(id, 'Approved'); // Update status in the database
        sendRequest(id, email, 'Approved'); // Send email notification
    });

    // Handle Decline Button Click
    $('.decline-btn').click(function () {
        var id = $(this).data('id'); // Get the appointment ID
        var email = $(this).data('email'); // Get the email
        updateStatus(id, 'Declined'); // Update status in the database
        sendRequest(id, email, 'Declined'); // Send email notification
    });

    // Function to Update Status via AJAX
    function updateStatus(id, status) {
        $.ajax({
            url: 'include/update_status.php', // PHP file to handle the update
            type: 'POST',
            data: {
                id: id,
                status: status
            },
            success: function (response) {
                if (response === 'success') {
                    // Update the status text in the table
                    $('#status-' + id).text(status);
                    // Disable the buttons after updating the status
                    $('#row-' + id + ' .accept-btn, #row-' + id + ' .decline-btn').attr('disabled', true);
                } else {
                    alert('Failed to update status.');
                }
            },
            error: function () {
                alert('An error occurred.');
            }
        });
    }

    // Function to Send Data via AJAX
    function sendRequest(id, email, action) {
        $.ajax({
            url: 'include/notification.php', // PHP file to handle the request
            method: 'POST',
            data: {
                id: id,
                email: email,
                action: action

            },
            success: function (response) {
                alert(response); // Show response from the server
                location.reload(); // Reload the page to reflect changes
            },
            error: function (xhr, status, error) {
                console.error("Error: " + error); // Log errors
            }
        });
    }
});
</script>
        </section>
    </section>
</body>
</html>