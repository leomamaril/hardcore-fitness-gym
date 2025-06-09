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
                <li class="nav-item ">
                    <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        LogIn
                    </a>
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
    while (--index && window.scrollY + 50 < sections[index].offsetTop) {}

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

    <!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content ">
      <div class="modal-header ">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container-login moulpali-regular" id="container-login">
            <div class="form-container-login sign-up-container-login">
            <form class="form-base" action="register.php" method="POST">
                <h1 class="moul-regular">Sign Up</h1>
                <div class="row row-cols-sm-2">
                    <div class="col">
                        <input type="text" placeholder="First Name" class="input-signup" name="fname" required/>
                    </div>
                    <div class="col">
                        <input type="text" placeholder="Last Name" class="input-signup" name="lname" required/>
                </div>

                </div>
                <div class="row row-cols-2">
                    <div class="col">
                        <input type="text" placeholder="Contact #" class="input-signup" name="contact" required/>
                    </div>
                    <div class="col">                        <input type="number" placeholder="Age" class="input-signup" name="age" required/>
                    </div>

                </div>
                <input class="input-base" type="email" placeholder="Email" name="email" required/>
                <input class="input-base" type="password" placeholder="Password" name="password" required/>
                <button style="color:#444;" type="submit" value="Submit" class="moul-regular button-base">Sign Up</button>
            </form>
            </div>
            <div class="form-container-login sign-in-container-login">
                <form class="form-base" action="login.php" method="POST">
                    <h1 class="moul-regular">Sign in</h1>


                        <?php if (isset($_GET['error'])) {?>
                            <span class="moulpali-regular"><?php echo $_GET["error"]; ?></span>
                        <?php } ?>
                    <input class="input-base" type="email" placeholder="Email" name="email" required/>
                    <input class="input-base" type="password" placeholder="Password" name="password" required/>
                    <a class="a-base" href="forgot-password.php">Forgot your password?</a>
                    <button style="color:#444;" class="moul-regular button-base">
                     Sign In
                    </button>
                </form>
            </div>
            <div class="overlay-container-login">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1 class="moul-regular">Welcome Back!</h1>
                        <p class="p-base">To keep connected with us please login with your personal info</p>
                        <button class="ghost moul-regular button-base" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1 class="moul-regular">Hello, Friend!</h1>
                        <p class="p-base">Enter your personal details and start journey with us</p>
                        <button class="ghost moul-regular button-base" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <script src="assets/js/script.js" ></script>

    </div>
  </div>
</div>