<?php
// AdminProfile.php

// Include necessary models and start the session
require_once('../Models/doctor.php');
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
$doctor = new Doctor($connection);

// Prepare and execute the query to retrieve user data
$email = $_SESSION['email'];
$stmt = $connection->prepare("SELECT * FROM Doctor WHERE email = ?");
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
    $city = $userData['city'];
    $country = $userData['country'];
    $speciality = $userData['speciality'];
    $password = $userData['password'];
    $doctor_id = $userData['doctor_id'];
    // Add more fields as needed
    $_SESSION['doctor_id'] = $doctor_id;
    $_SESSION['speciality'] = $speciality;
    $_SESSION['country'] =  $country;
    $_SESSION['city'] =  $city;
    // Pass user data to the view for display
    include('../Views/doctor_dashboard.php');
} else {
    // Handle error if user data retrieval fails
    echo "Error: Unable to retrieve user data.";
    // You can redirect to an error page or handle the error accordingly
}

if(isset($_POST['accept_appointment'])) {
    $appointment_id = $_POST['accept_appointment'];
    $doctor->updateAppointment($appointment_id, $doctor_id); 
    
} elseif(isset($_POST['decline_appointment'])) {
    $appointment_id = $_POST['decline_appointment'];
   // $doctor->updateAppointment($appointment_id, $doctor_id); 
    
}
?>
