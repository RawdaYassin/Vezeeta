<?php
// patientProfile.php

// Include the necessary models and start the session
require_once('../Models/user.php');
require_once('../Models/databaseConnection.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header('Location: ../Views/auth.php');
    exit();
}

// Create a new database connection
$db = new databaseConnection();
$connection = $db->getConnection();

// Prepare and execute the query to retrieve user data
//$userType = $_SESSION['user_type'];
$email = $_SESSION['email'];
$patient_id = $_SESSION['patient_id'];
//$userId = $_SESSION['patient_id'];
$stmt = $connection->prepare("SELECT * FROM Patient WHERE email = ?");
$stmt->execute([$email]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user data is retrieved successfully
if ($userData) {
    // Extract user data for easier access
    $firstName = $userData['first_name'];
    $lastName = $userData['last_name'];
    $email = $userData['email'];
    $phoneNumber = $userData['phone_number'];
    $gender = $userData['gender'];
	$dateOfBirth = $userData['date_of_birth'];
	$password = $userData['password'];
    $patient_id = $userData['patient_id'];
    // Add more fields as needed
    $_SESSION['patient_id'] = $patient_id;
    // Pass user data to the view for display
    include('../Views/patient_profile.php');
} else {
    // Handle error if user data retrieval fails
    echo "Error: Unable to retrieve user data.";
    // You can redirect to an error page or handle the error accordingly
}
?>
