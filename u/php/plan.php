<?php

// Include database connection
include "db.php";

// Check if session variables are set
if (!isset($_SESSION['user_email'])) {
    die("Session variables are not set. Please log in again.");
}

// Sanitize and validate session data
$email = filter_var($_SESSION['user_email'], FILTER_SANITIZE_EMAIL); // Sanitize email

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Check if the user already has an active subscription
$sql_check = "SELECT `status`, `start_date`, `end_date` FROM `user` WHERE `email` = ?";
$stmt_check = $conn->prepare($sql_check);

if ($stmt_check) {
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $stmt_check->bind_result($status, $start_date, $end_date);
        $stmt_check->fetch();

        // Check if the status is 'Active'
        $is_active = ($status === 'Active');
    } else {
        $is_active = false; // No subscription found
        $start_date = null;
        $end_date = null;
    }

    $stmt_check->close();
} else {
    die("Error preparing check statement: " . $conn->error);
}
?>
 <div id="subscription-data"
         data-is-active="<?php echo $is_active ? 'true' : 'false'; ?>"
         data-start-date="<?php echo $start_date; ?>"
         data-end-date="<?php echo $end_date; ?>">
    </div>
<section id="plans" class="text-base">
        <div class="container-fluid h-100 mt-5 mb-5">
            <div class="d-flex flex-column justify-content-center align-items-center text-center">
                <h1 class="fs-5 moul-regular">MEMBERSHIP PLAN</h1>
                <p id="message" class="text-danger"></p> <!-- Message for active subscription -->
            </div>
            <div class="row row-cols-2 row-cols-lg-2 g-2 g-lg-2 text-center moulpali-regular mt-3 justify-content-center">
                <div class="col-md-3 align-items-center" data-aos="zoom-in">
                    <div class="p-3 border bg-light">
                        <img src="../assets/img/fitness-clubs-gyms-pandemic-regulations-abstract-concept_335657-3127.png" class="img-fluid" width="100" height="100">
                        <h4 class="moul-regular fs-6">Regular</h4>
                        <p class="fs-4">₱60/<span class="fs-6">a day</span></p>
                        <p>Get access to entire gym</p>
                        <p>Free consultation to coaches</p>
                        <form class="mt-4">
                            <button id="regular-button" class="btn moulpali-regular text-base" id="btn-outline-gradient" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalTogglewalk">Avail Now</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 align-items-center" data-aos="zoom-in">
                    <div class="p-3 border bg-light">
                        <img src="../assets/img/smart-training-abstract-concept-vector-illustration-smart-training-online-programs-tools-new-gym-technology-fitness-coaching-application-improve-health-fat-loss-toning-abstract-metaphor_335657-1445.png" class="img-fluid" width="100" height="100">
                        <h4 class="moul-regular fs-6">Monthly</h4>
                        <p class="fs-4">₱600/<span class="fs-6">a month</span></p>
                        <p>Get access to entire gym</p>
                        <p>Free consultation to coaches</p>
                        <form class="mt-4">
                            <button id="monthly-button" class="btn moulpali-regular text-base" id="btn-outline-gradient" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Avail Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Get subscription data from the HTML element
        const subscriptionData = document.getElementById('subscription-data');
        const isActive = subscriptionData.getAttribute('data-is-active') === 'true';
        const startDate = subscriptionData.getAttribute('data-start-date');
        const endDate = subscriptionData.getAttribute('data-end-date');

        // Disable the buttons if the user already has an active subscription
        window.onload = function() {
            if (isActive) {
                document.getElementById("regular-button").disabled = true;
                document.getElementById("monthly-button").disabled = true;
                document.getElementById("message").innerText = `You already have an active subscription from ${startDate} to ${endDate}.`;
            }
        };
    </script>

    <!-- Modal Monthly -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid h-100" id="home">
                        <div class="row h-100">
                            <div class="bg-payment">
                                <div class="d-flex flex-column align-items-center h-100 text-center justify-content-center">
                                    <h1 class="display-5 moul-regular">Monthly Membership</h1>
                                    <p class="fs-6 moulpali-regular">Monthly: ₱600.00</p>
                                    <div class="">
                                        <div class="row row-cols-sm-2">
                                            <div class="col">
                                                <a href="include/monthly-ewallet-payment.php" title="E-Wallet">
                                                    <img width="50" height="50" src="https://img.icons8.com/external-sbts2018-lineal-color-sbts2018/58/external-e-wallet-payment-1-sbts2018-lineal-color-sbts2018.png" alt="external-e-wallet-payment-1-sbts2018-lineal-color-sbts2018" />
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="include/monthly-walkin-payment.php" title="Walk-In">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960" width="50" fill="currentColor">
                                                        <path d="m280-40 112-564-72 28v136h-80v-188l202-86q14-6 29.5-7t29.5 4q14 5 26.5 14t20.5 23l40 64q26 42 70.5 69T760-520v80q-70 0-125-29t-94-74l-25 123 84 80v300h-80v-260l-84-64-72 324h-84Zm260-700q-33 0-56.5-23.5T460-820q0-33 23.5-56.5T540-900q33 0 56.5 23.5T620-820q0 33-23.5 56.5T540-740Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="fs-6 moulpali-regular mt-3">
                                        You will save ₱1,200/ Month compared to the walk-in plan. <br>
                                        Recurring billing.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Walk-In -->
    <div class="modal fade" id="exampleModalTogglewalk" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid h-100" id="home">
                        <div class="row h-100">
                            <div class="bg-payment">
                                <div class="d-flex flex-column align-items-center h-100 text-center justify-content-center">
                                    <h1 class="display-5 moul-regular">Regular Membership</h1>
                                    <p class="fs-6 moulpali-regular">Daily: ₱100.00</p>
                                    <div class="">
                                        <div class="row row-cols-sm-2">
                                            <div class="col">
                                                <a href="include/regular-ewallet-payment.php" title="E-Wallet">
                                                    <img width="50" height="50" src="https://img.icons8.com/external-sbts2018-lineal-color-sbts2018/58/external-e-wallet-payment-1-sbts2018-lineal-color-sbts2018.png" alt="external-e-wallet-payment-1-sbts2018-lineal-color-sbts2018" />
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="include/regular-walkin-payment.php" title="Walk-In">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 -960 960 960" width="50" fill="currentColor">
                                                        <path d="m280-40 112-564-72 28v136h-80v-188l202-86q14-6 29.5-7t29.5 4q14 5 26.5 14t20.5 23l40 64q26 42 70.5 69T760-520v80q-70 0-125-29t-94-74l-25 123 84 80v300h-80v-260l-84-64-72 324h-84Zm260-700q-33 0-56.5-23.5T460-820q0-33 23.5-56.5T540-900q33 0 56.5 23.5T620-820q0 33-23.5 56.5T540-740Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="fs-6 moulpali-regular mt-3">
                                        Want to save ₱1,200/ Month? Switch to <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Monthly</a>.<br>
                                        Recurring billing.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!--Walk-In - Walk-In payment -->
  <!-- <div class="modal fade" id="WexampleModalToggleWalkin" aria-hidden="true" aria-labelledby="WexampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Walk-In</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid h-100" id="home">
            <div class="row h-100">
              <div class="bg-payment">
                <div class="d-flex flex-column align-items-center h-100 text-center justify-content-center ">
                  <h1 class="display-3 moul-regular ">
                    Congratulations!
                  </h1>
                  <p class="fs-4 moulpali-regular">
                    for becoming a member here at Hardcore Fitness gym.
                  </p>
                  <p class="fs-6 moulpali-regular mt-5 pt-5">
                    Note:
                  </p>
                  <p class="fs-6 moulpali-regular">
                    Please note that you have to pay it first at the counter to use our equipments.<br>
                    Thank you and Congratulations.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
 <!--Monthy- Walk-In payment -->
  <!-- <div class="modal fade" id="exampleModalToggleWalkin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Walk-In</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid h-100" id="home">
            <div class="row h-100">
              <div class="bg-payment">
                <div class="d-flex flex-column align-items-center h-100 text-center justify-content-center ">
                  <h1 class="display-3 moul-regular ">
                    Congratulations!
                  </h1>
                  <p class="fs-4 moulpali-regular">
                    for becoming a member here at Hardcore Fitness gym.
                  </p>
                  <p class="fs-6 moulpali-regular mt-5 pt-5">
                    Note:
                  </p>
                  <p class="fs-6 moulpali-regular">
                    Please note that you have to pay it first at the counter to use our equipments.<br>
                    Thank you and Congratulations.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!--Monthly Gcash payment -->
  <!-- <div class="modal fade" id="exampleModalToggleGcash" aria-hidden="true" aria-labelledby="exampleModalToggleGcash"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">E-Wallet</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <iframe src="http://localhost/HardcoreFitness/u/php/monthly_payment.php" title="description"
            style="width:100%; height:400px;"></iframe>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
            data-bs-dismiss="modal">Back to Payment</button>
        </div>
      </div>
    </div>
  </div>
  </div> -->