<?php
// Start session
session_start();
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, fname, lname, age, contact, pass, type FROM user WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->bind_result($id, $fname, $lname, $age, $contact, $hashed_password, $type);
        if ($stmt->fetch()) {
            echo "User found: $fname<br>";
            echo "Hashed password from DB: $password<br>";
            echo "Provided password: $password<br>";

            if (password_verify($password, $hashed_password)) {
                echo "Password verified!";
                // Password is correct, start session and redirect
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $fname;
                $_SESSION['user_age'] = $age;
                $_SESSION['user_contact'] = $contact;
                $_SESSION['user_lname'] = $lname;
                $_SESSION['user_role'] = $type;
                $_SESSION['user_email'] = $email;

          // Free the result set
          $stmt->free_result();

          if ($type === 'admin') {
              // Insert login activity into history
              $date = date("M-d-Y h:i:s A");

              $activity = "INSERT INTO `history`(`activity`, `date`) VALUES (?, ?)";

              // Prepare and execute the activity query
              $stmt_activity = $conn->prepare($activity);
              if (!$stmt_activity) {
                  die("Prepare failed: " . $conn->error);
              }
              $activity_message = "admin $fname has logged in";
              $stmt_activity->bind_param("ss", $activity_message, $date);
              if ($stmt_activity->execute()) {
                  // Redirect to admin dashboard
                  header("Location: a/admin-index.php");
              } else {
                  die("Error inserting activity: " . $stmt_activity->error);
              }
              $stmt_activity->close();
          } else {
              // Redirect to user dashboard
              $date = date("M-d-Y h:i:s A");

              $activity = "INSERT INTO `history`(`activity`, `date`) VALUES (?, ?)";

              // Prepare and execute the activity query
              $stmt_activity = $conn->prepare($activity);
              if (!$stmt_activity) {
                  die("Prepare failed: " . $conn->error);
              }
              $activity_message = "User $fname has logged in";
              $stmt_activity->bind_param("ss", $activity_message, $date);
              if ($stmt_activity->execute()) {
                  // Redirect to admin dashboard
                  header("Location: u/user-index.php");
              } else {
                  die("Error inserting activity: " . $stmt_activity->error);
              }
              $stmt_activity->close();

          }
          exit();
      } else {
          echo "Invalid password!";
          header("Location: index.php?error=Incorrect Username or Password");
          exit();
      }
  } else {
      echo "No user found with this email!";
      header("Location: index.php?error=User not found");
      exit();
  }
} else {
  echo "Error executing query: {$stmt->error}";
}

// Close the statement and connection
$stmt->close();
$conn->close();
}
?>