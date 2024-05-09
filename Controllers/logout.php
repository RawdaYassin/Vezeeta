<?php

require_once('../Models/User.php');  // Assuming logout.php contains the logout function

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$db = new databaseConnection();
$connection = $db->getConnection();

$user = new User($connection);
// Check if the form is submitted (assuming logout confirmation form)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Call the logout function (assuming it's in a Logout class)
  $user->logout();

  // Set a success message (optional)
  $_SESSION['message'] = 'You have been successfully logged out.';

  // Redirect to the desired page after logout (e.g., home page)
  header('Location: ../home.php');
  exit();
} else {
  // Not a POST request, potentially display the logout confirmation page (optional)
  // ... (redirect or display logout confirmation view) ...
}

?>
