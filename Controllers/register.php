

<?php

require_once('../Models/patient.php'); // Assuming User class is in Models directory
$db = new databaseConnection();
$connection = $db->getConnection();
// Start the session if not already started (for potential future login functionality)
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $firstName = trim($_POST['firstName']);
  $lastName = trim($_POST['lastName']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $phoneNumber = isset($_POST['phoneNumber']) ? trim($_POST['phoneNumber']) : null;
  $gender = isset($_POST['gender']) ? trim($_POST['gender']) : null;
  $dateOfBirth = isset($_POST['dateOfBirth']) ? trim($_POST['dateOfBirth']) : null;

  // Create a new User object
  $user = new Patient($connection); // Replace `$connection` with your database connection

  // Attempt to register the user
  if ($user->addPatient($firstName, $lastName, $email, $password, $phoneNumber, $gender, $dateOfBirth)) {

    // Registration successful
    $_SESSION['message'] = 'Registration successful! Please login to continue.'; // Set a success message
    header('Location: ../Views/auth.php'); // Redirect to login page
    exit();

  } else {
    // Registration failed
    $_SESSION['error_message'] = 'Registration failed! Please try again.'; // Set an error message
   // echo "ggggggggggg";
  }
}

// Redirect back to the registration page if not a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../Views/auth.php');
  exit();
}
