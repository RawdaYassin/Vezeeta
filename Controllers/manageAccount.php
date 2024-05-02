<?php

// Assuming User class is in Models directory
require_once('../Models/User.php');

session_start(); // Initiate session

// Create a new database connection
$db = new databaseConnection();
$connection = $db->getConnection();

// Create a new User object
$user = new User($connection); // Pass the database connection to the User object

if (!isset($_SESSION['user_id'])) {
  // User is not logged in, redirect to login page
  header("Location: ../Views/login.php");
  exit;
}

// Check if form is submitted for updating or deleting account
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["update"])) {
    // Process update request
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phoneNumber = $_POST["phoneNumber"];

    // Call the updateAccount method of User class
    $updateResult = $user->updateAccount($firstName, $lastName, $email, $password, $phoneNumber);

    // Check update result and handle accordingly
    if ($updateResult) {
      // Update successful
      // Redirect user to account management page with success message
      header("Location: ../Views/manageAccount?update=success");
      exit;
    } else {
      // Update failed
      // Redirect user to account management page with error message
      header("Location: ../Views/manageAccount?update=error");
      exit;
    }
  } elseif (isset($_POST["delete"])) {
    // Process delete request

    // Call the deleteAccount method of User class
    $deleteResult = $user->deleteAccount();

    // Check delete result and handle accordingly
    if ($deleteResult) {
      // Deletion successful
      // Log the user out and redirect to login page with success message
      session_destroy(); // Destroy the session
      header("Location: ../Views/login.php?delete=success");
      exit;
    } else {
      // Deletion failed
      // Redirect user to account management page with error message
      header("Location: ../Views/manageAccount.php?delete=error");
      exit;
    }
  }
}

// Uncomment and replace with the path to your manage_account.html file
// include('../Views/manage_account.html'); 

?>
