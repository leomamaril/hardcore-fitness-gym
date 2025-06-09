<?php
// ===== Conneect Database ===== //

include "../db.php";
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Fetch user data
        } else {
            echo "No user found.";
        }
    } else {
        echo "Database query failed.";
    }
} else {
    echo "User not logged in.";
}

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
    <nav class="navbar sticky-top navbar-expand-xl navbar-dark bg-navbar pad">
        <a class="navbar-brand mb-1" href="user-index.php">
            <img src="assets/img/304946364_478615410946035_5163354841655361639_n.png" alt="" width="50" height="50">
        </a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
            <ul class="navbar-nav moul-regular">
                <li class="nav-item">
                    <a class="nav-link" data-target="user-index.php #home" href="user-index.php#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="user-index.php #services"
                        href="user-index.php#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="user-index.php #appointment"
                        href="user-index.php#appointment">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="user-index.php #about" href="user-index.php#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="user-index.php #plans" href="user-index.php#plans">Plans </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="user-index.php #feedback" href="user-index.php#feedback">Feedback
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="user-index.php #timetable" href="#timetable">Timetable </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="user-index.php #contact" href="#contact">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle moul-regular text-white" href="#" id="navbarDarkDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['user_name']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item moul-regular" class="edit-btn" href="user-profile.php"
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

    <!-- Home Panel -->
    <section id="home">
    <div class="container-fluid">
        <div class="row">
            <div class="bg">
                <div class="bg-image"></div>
                <div class="d-flex flex-column justify-content-center align-items-center h-100 text-center text-white pad">
                    <h1 class="display-1 moul-regular">
                        Profile
                    </h1>

                </div>
            </div>
        </div>
    </div>
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
                    url: 'include/fetch-profile.php', // Path to the PHP script
                    type: 'POST',
                    data: { id: id },
                    success: function (response) {
                        // Parse the JSON response
                        var data = JSON.parse(response);
                        if (data.error) {
                            alert(data.error); // Show error message if any
                        } else {
                            // Populate the form fields
                            $('#edit-id').val(data.id);
                            $('#edit-fname').val(data.fname);
                            $('#edit-lname').val(data.lname);
                            $('#edit-email').val(data.email);
                            $('#edit-age').val(data.age);
                            $('#edit-plan').val(data.plan_type);
                            $('#edit-amount').val(data.amount);
                            $('#edit-contact').val(data.contact);
                            $('#edit-mop').val(data.mop);
                            $('#edit-status').val(data.status);
                            $('#edit-dos').val(data.start_date);
                            $('#edit-doe').val(data.end_date);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error: " + status + error);
                    }
                });
            });
        });
    </script>
    <div class="containers">
        <div class="content pad">
            <!-- // ===== Register Form ===== // -->
            <form action="include/update-profile.php" method="POST">
                <input type="hidden" id="edit-id" name="id" value="<?php echo $row['id']; ?>">
                <!-- Hidden field for ID -->
                <div class="user-details">
                    <!-- First Name -->
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" id="edit-fname" name="fname" placeholder="First Name"
                            value="<?php echo $row['fname']; ?>" required>
                    </div>
                    <!-- Last Name -->
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" id="edit-lname" name="lname" placeholder="Last Name"
                            value="<?php echo $row['lname']; ?>" required>
                    </div>
                    <!-- Email -->
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" id="edit-email" name="email" placeholder="Email"
                            value="<?php echo $row['email']; ?>" required>
                    </div>
                    <!-- Age -->
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="text" id="edit-age" name="age" placeholder="Age" value="<?php echo $row['age']; ?>"
                            required>
                    </div>
                    <!-- Plan -->
                    <div class="input-box">
                        <span class="details">Plan</span>
                        <select name="plan" id="edit-plan" class="select-box" disabled>
                            <?php
                            $sql = "SELECT * FROM plan";
                            $all_plan = mysqli_query($conn, $sql);
                            while ($plan = mysqli_fetch_array($all_plan, MYSQLI_ASSOC)) {
                                $selected = ($plan['plan'] == $row['plan_type']) ? 'selected' : '';
                                echo '<option value="' . $plan["plan"] . '" ' . $selected . '>' . $plan["plan"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Contact -->
                    <div class="input-box">
                        <span class="details">Contact No.</span>
                        <input type="number" id="edit-contact" name="contact" placeholder="Contact No"
                            value="<?php echo $row['contact']; ?>" required>
                    </div>
                    <!-- Mode of Payment -->
                    <div class="input-box">
                        <span class="details">Mode of Payment</span>
                        <select name="mop" id="edit-mop" class="select-box" disabled>
                            <?php
                            $sql = "SELECT * FROM mop";
                            $all_mop = mysqli_query($conn, $sql);
                            while ($mop = mysqli_fetch_array($all_mop, MYSQLI_ASSOC)) {
                                $selected = ($mop['mop'] == $row['mop']) ? 'selected' : '';
                                echo '<option value="' . $mop["mop"] . '" ' . $selected . '>' . $mop["mop"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Date Start -->
                    <div class="input-box">
                        <span class="details">Date Start</span>
                        <input type="date" id="edit-dos" name="dos" value="<?php echo $row['start_date']; ?>"  disabled>
                    </div>
                    <!-- Date End -->
                    <div class="input-box">
                        <span class="details">Date End</span>
                        <input type="date" id="edit-doe" name="doe" value="<?php echo $row['end_date']; ?>"  disabled>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="button">
                    <input type="submit" id="submitData" name="submit" value="Update Profile">
                </div>
            </form>
        </div>
    </div>


    <!-- Timetable -->
    <?php include 'php/timetable.php' ?>
    <!-- Contact Panel -->
    <?php include 'php/contact.php' ?>
    <!-- To make the animation work it needs to declare AOS.init-->
    <script>AOS.init();</script>

</body>

</html>