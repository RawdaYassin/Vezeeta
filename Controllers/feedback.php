<?php

require_once('../Models/user.php'); // Assuming Feedback class is in Models directory

session_start(); // Start the session if not already started

// Get form data
$patientId = $_SESSION['user_id']; // Assuming patient ID retrieved from session
$clinicId = isset($_POST['clinicId']) ? $_POST['clinicId'] : null; // Optional clinic ID
$doctorId = isset($_POST['doctorId']) ? $_POST['doctorId'] : null; // Optional doctor ID
$rating = trim($_POST['rating']);
$comment = trim($_POST['comment']);

// Validate data (optional)
// You can add validation for rating (e.g., within range 1-5) and comment length
if (empty($rating)) {
  $_SESSION['message'] = 'Please select a rating.';
  header('Location: feedback.php'); // Redirect back to feedback page with error message
  exit();
}

if (empty($comment)) {
  $_SESSION['message'] = 'Please enter a comment.';
  header('Location: feedback.php'); // Redirect back to feedback page with error message
  exit();
}

  // Create a new database connection
  $db = new databaseConnection();
  $connection = $db->getConnection();

// Create Feedback object
$feedback = new user($connection); // Replace `$connection` with your connection object

// Submit feedback
$success = $feedback->submitFeedback($patientId, $clinicId, $doctorId, $rating, $comment);

if ($success) {
  $_SESSION['message'] = 'Feedback submitted successfully!'; // Set success message
  header('Location: profile.php'); // Redirect to profile page (or desired page)
  exit();
} else {
  $_SESSION['message'] = 'Feedback submission failed! Please try again.'; // Set error message
  header('Location: feedback.php'); // Redirect back to feedback page with error message
  exit();
}

?>
