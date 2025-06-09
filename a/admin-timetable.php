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
    <link href="assets/css/timetable.css" rel="stylesheet">
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
            <li class="active">
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
    <?php

// Fetch all timetable data
$sql = "SELECT * FROM timetable ORDER BY time_slot, FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$timetableData = [];
while ($row = $result->fetch_assoc()) {
    $timetableData[] = $row;
}

// Organize data by time slots
$organizedData = [];
foreach ($timetableData as $row) {
    $organizedData[$row['time_slot']][$row['day']] = $row;
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.nav-controls li').click(function () {
            var filter = $(this).data('tsfilter');
            $('.nav-controls li').removeClass('active');
            $(this).addClass('active');

            if (filter === 'all') {
                $('.ts-item').show();
            } else {
                $('.ts-item').hide();
                $('.ts-item[data-tsmeta="' + filter + '"]').show();
            }
        });
    });
</script>
<section class="classes-timetable">
    <div class="timetable-container moulpali-regular mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="moul-regular">Timetable</h2>
                </div>
                <!-- <div class="nav-controls">
                    <ul>
                        <li class="active" data-tsfilter="all">All</li>
                        <li data-tsfilter="trainer">Trainer</li>
                        <li data-tsfilter="pilates">Pilates</li>
                        <li data-tsfilter="yoga">Yoga</li>
                    </ul>
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="schedule-table ">
                    <table>
                        <thead>
                            <tr class="text-center">
                                <th></th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $timeSlots = ['07:00', '11:00', '14:00', '17:00', '20:00'];
                            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

                            foreach ($timeSlots as $timeSlot) {
                                echo "<tr>";
                                echo "<td class='workout-time'>{$timeSlot}</td>";

                                foreach ($days as $day) {
                                    if (isset($organizedData[$timeSlot][$day])) {
                                        $activity = $organizedData[$timeSlot][$day];
                                        $activityClass = strtolower($activity['activity']); // Ensure lowercase for filtering
                                        echo "<td data-bs-toggle='modal' data-bs-target='#timetable' data-id='{$activity['id']}' style='cursor: pointer;' class='hover-bg ts-item' data-tsmeta='{$activityClass}'>";
                                        echo "<h6>{$activity['activity']}</h6>";
                                        echo "<span>{$activity['start_time']} - {$activity['end_time']}</span>";
                                        echo "<div class='trainer-name'>{$activity['trainer_name']}</div>";
                                        echo "</td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                }

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function () {
        $('td[data-bs-toggle="modal"]').on('click', function () {
            var id = $(this).data('id'); // Retrieve the data-id attribute
            console.log("ID being sent:", id); // Debugging line

            if (!id) {
                console.error("data-id attribute is missing or undefined.");
                return; // Stop execution if data-id is missing
            }

            $.ajax({
                url: 'include/fetch-timetable.php',
                type: 'POST',
                data: { id: id },
                success: function (response) {
                    console.log("Response from server:", response); // Debugging line
                    try {
                        var data = JSON.parse(response);  // Parse the JSON response
                        console.log("Parsed data:", data); // Debugging line
                        if (data.error) {
                            console.error(data.error);  // Log error if returned
                            alert("Error fetching data: " + data.error);
                        } else {
                            // Populate the form fields with the data returned from the server
                            $('#edit-id').val(data.id);
                            $('#edit-ids').val(data.id);
                            $('#edit-trainer_name').val(data.trainer_name);
                            $('#edit-activity').val(data.activity);
                            $('#edit-start_time').val(data.start_time);
                            $('#edit-end_time').val(data.end_time);
                        }
                    } catch (e) {
                        console.error("Error parsing JSON: " + e);
                        console.error("Response content:", response); // Log the raw response
                        alert("An error occurred while parsing the data.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                    alert("An error occurred while fetching data.");
                }
            });
        });
    });
</script>
<div class="modal fade" id="timetable" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Time Table</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="content">
                        <!-- Edit Form -->
                        <form action="include/update-timetable.php" method="POST">

                            <div class="user-details">
                                <div class="input-boxs">
                                    <span class="details">Name</span>
                                    <input type="text" id="edit-trainer_name" name="trainer_name" placeholder="Name"
                                        required>

                                        <span class="details">Activity</span>
                                    <select id="edit-activity" name="activity" required>
                                        <option value="" disabled selected>Select Activity</option>
                                        <option value="Yoga">Yoga</option>
                                        <option value="Trainer">Trainer</option>
                                        <option value="Pilates">Pilates</option>
                                    </select>
                                    <span class="details">Start Time</span>
                                    <input type="time" id="edit-start_time" name="start_time" required>
                                    <span class="details">End Time</span>
                                    <input type="time" id="edit-end_time" name="end_time" required>
                                </div>

                            </div>
                            <input type="hidden" id="edit-id" name="id">
                            <div class="button">
                                <input type="submit" id="submitData" name="submit" value="Update">
                            </div>

                        </form>

                        <form action="include/update-timetable-clear.php" method="POST">
                        <input type="hidden" id="edit-ids" name="ids">

                            <div class="button">
                                <input type="submit" id="submitData" name="submit" value="Clear">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    </section>

</body>

</html>