<?php

require_once('../Models/User.php'); // Assuming User class is in Models directory
require_once('../Models/databaseConnection.php');

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Create a new database connection
  $db = new databaseConnection();
  $connection = $db->getConnection();

  // Create a new User object
  $user = new User($connection); // Pass the database connection to the User object

  // Attempt to login the user
  if ($user->login($email, $password)) {

    // Login successful
    $_SESSION['user_id'] = $user->getId(); // Store user ID in session
    $_SESSION['message'] = 'Login successful!'; // Set a success message

    // Redirect to a designated page after successful login (e.g., profile page)
    header('Location: profile.php'); // Replace with your desired redirect location
    exit();

  } else {
    // Login failed
    $_SESSION['error_message'] = 'Login failed! Please check your email and password.'; // Set an error message
    header('Location: ../Views/login.php'); // Redirect back to the login page
    exit();
  }
}

// Redirect back to the login page if not a POST request
header('Location: ../Views/login.php');
exit();
?>
