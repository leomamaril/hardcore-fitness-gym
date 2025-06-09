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
            <li>
                <a href="../a/admin-index.php">
                    <i class="material-symbols-outlined">dashboard</i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>

            <!-- // ===== Members ===== // -->
            <li class="active">
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
                    <li class="active"><a href="admin-member-monthly.php">Monthly Members</a></li>
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
    <section class="home-section">
    <section class="historyLog">
        <span class="header moul-regular">Monthly Members</span>
        <table class="table moulpali-regular">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Plan</th>
                    <th>Amount</th>
                    <th>Date Start</th>
                    <th>Date End</th>
                    <th>MOP</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="align-items-center">
                <?php
                // Fetch data from the database
                $ret = mysqli_query($conn, "SELECT * FROM user WHERE plan_type = 'Monthly'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <tr>
                        <td data-label="#"><?php echo $cnt; ?></td>
                        <td data-label="name"><?php echo $row['fname']." ". $row['lname']; ?></td>
                        <td data-label="age"><?php echo $row['age']; ?></td>
                        <td data-label="contact"><?php echo $row['contact']; ?></td>
                        <td data-label="email"><?php echo $row['email']; ?></td>
                        <td data-label="plan"><?php echo $row['plan_type']; ?></td>
                        <td data-label="plan"><?php echo $row['amount']; ?></td>
                        <td data-label="dos"><?php echo $row['start_date']; ?></td>
                        <td data-label="doe"><?php echo $row['end_date']; ?></td>
                        <td data-label="mop"><?php echo $row['mop']; ?></td>
                        <td data-label="status"><?php echo $row['status']; ?></td>
                        <td data-label="Action">
                            <!-- Button to open modal with data-id attribute -->
                            <button type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#EditProfile" data-id="<?php echo $row['id']; ?>">
                                Edit
                            </button>
                        </td>
                    </tr>
                    <?php
                    $cnt++;
                }
                ?>
            </tbody>
        </table>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // When the "Edit" button is clicked
        $('.edit-btn').on('click', function () {
            // Get the ID from the data-id attribute
            var id = $(this).data('id');
            // Send an AJAX request to fetch data
            $.ajax({
                url: 'include/fetch-member.php', // PHP script to fetch member data
                type: 'POST',
                data: { id: id },
                success: function (response) {
                    // Parse the JSON response
                    var data = JSON.parse(response);
                    // Populate the modal fields
                    $('#edit-id').val(data.id);
                    $('#edit-name').val(data.fname);
                    $('#edit-email').val(data.email);

                    $('#edit-age').val(data.age);
                    $('#edit-plan').val(data.plan_type);

                    $('#edit-contact').val(data.contact);
                    $('#edit-mop').val(data.mop);
                    $('#edit-dos').val(data.start_date);
                    $('#edit-doe').val(data.end_date);
                    $('#edit-amount').val(data.amount);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + error);
                }
            });
        });
    });
</script>

    <!-- Modal for Editing -->
    <div class="modal fade" id="EditProfile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="content">
                            <!-- Edit Form -->
                            <form action="include/update-member-m.php" method="POST">
                                <input type="hidden" id="edit-id" name="id">
                                <div class="user-details">
                                    <!-- Name, Email, Mode of Payment -->
                                    <div class="input-box">
                                        <span class="details">Name</span>
                                        <input type="text" id="edit-name" name="name" placeholder="Name" required>
                                        <span class="details">Email</span>
                                        <input type="email" id="edit-email" name="email" placeholder="Email" required>
                                        <span class="details">Mode of Payment</span>
                                        <select name="mop" id="edit-mop" class="select-box">
                                            <?php
                                            $sql = "SELECT * FROM mop";
                                            $all_mop = mysqli_query($conn, $sql);
                                            while ($mop = mysqli_fetch_array($all_mop, MYSQLI_ASSOC)) {
                                                echo '<option value="' . $mop["mop"] . '">' . $mop["mop"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Age, Plan, Payment, Contact, Status -->
                                    <div class="input-box">
                                        <span class="details">Age</span>
                                        <input type="text" id="edit-age" name="age" placeholder="Age" required>
                                        <span class="details">Plan</span>
                                        <select name="plan" id="edit-plan" class="select-box">
                                            <?php
                                            $sql = "SELECT * FROM plan";
                                            $all_plan = mysqli_query($conn, $sql);
                                            while ($plan = mysqli_fetch_array($all_plan, MYSQLI_ASSOC)) {
                                                echo '<option value="' . $plan["plan"] . '">' . $plan["plan"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <span class="details">Payment</span>
                                        <select name="amount" id="edit-amount" class="select-box">
                                            <?php
                                            $sql = "SELECT * FROM payment";
                                            $all_payment = mysqli_query($conn, $sql);
                                            while ($payment = mysqli_fetch_array($all_payment, MYSQLI_ASSOC)) {
                                                echo '<option value="' . $payment["payment"] . '">' . $payment["payment"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Contact, Status, Date Start, Date End -->
                                    <div class="input-box">
                                        <span class="details">Contact No.</span>
                                        <input type="number" id="edit-contact" name="contact" placeholder="Contact No" required>
                                 
                                        <span class="details">Date Start</span>
                                        <input type="date" id="edit-dos" name="dos" required>
                                        <span class="details">Date End</span>
                                        <input type="date" id="edit-doe" name="doe" required>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="button">
                                    <input type="submit" id="submitData" name="submit" value="Update">
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