

<?php
// AdminProfile.php

// Include the necessary models and start the session
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//require_once('../emails__admin/phpmailer/src/Exception.php');
//require_once('../emails__admin/phpmailer/src/PHPMailer.php');
//require_once('../emails__admin/phpmailer/src/SMTP.php');
require_once('../PHPMailer-master/tt.php');
require_once('../Models/admin.php');
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
$admin = new Admin($connection);

// Prepare and execute the query to retrieve user data
//$userType = $_SESSION['user_type'];
$email = $_SESSION['email'];
$admin_id = $_SESSION['admin_id'];
//$userId = $_SESSION['Admin_id'];
$stmt = $connection->prepare("SELECT * FROM Admin WHERE email = ?");
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
	//$dateOfBirth = $userData['date_of_birth'];
	$password = $userData['password'];
    $admin_id = $userData['id'];
    // Add more fields as needed
    $_SESSION['admin_id'] = $admin_id;
    // Pass user data to the view for display
    include('../Views/admin_dashboard.php');
} else {
    // Handle error if user data retrieval fails
    echo "Error: Unable to retrieve user data.";
    // You can redirect to an error page or handle the error accordingly
}


if(isset($_POST['add_doctor'])) {
    // Logic for adding a new doctor
    header("Location: ../Views/add_users.php"); // Redirect to the page for adding a new doctor
    exit();
} elseif(isset($_POST['add_admin'])) {
    // Logic for adding a new admin
    header("Location: ../Views/add_users.php"); // Redirect to the page for adding a new admin
    exit();
} elseif(isset($_POST['add_patient'])) {
    // Logic for adding a new patient
    header("Location: ../Views/add_users.php"); // Redirect to the page for adding a new patient
    exit();
} elseif(isset($_POST['add_clinic'])) {
    // Logic for adding a new clinic
    header("Location: ../Views/add_users.php"); // Redirect to the page for adding a new clinic
    exit();
} elseif(isset($_POST['accept_appointment'])) {
    $appointment_id = $_POST['accept_appointment'];
    $admin->updateAppointment($appointment_id); 
    
} elseif(isset($_POST['decline_appointment'])) {
    $appointment_id = $_POST['decline_appointment'];
    // $admin->updateAppointment($appointment_id, $doctor_id); 
} else {
    // Handle other cases
    echo "Invalid action!";
}




  /*  $subject = "Appointment request acceptance";
    $body = "
    Dear $patient_name,
    
    We are pleased to inform you that your appointment request has been approved. Below are the details of your appointment:
    
    - Date: [Appointment Date]
    - Time: [Appointment Time]
    - Doctor: [Doctor's Name]
    - Clinic: [Clinic Name]
    - Status: Confirmed
    
    Please arrive at the clinic 15 minutes before your appointment time. If you have any questions or need to reschedule, feel free to contact us.
    
    Thank you for choosing our clinic. We look forward to seeing you soon.
    
    Best regards,
    [Your Clinic Name]
    ";
    sendEmail("yassinrawda941@gmail.com", $body ,$subject);
    exit();*/

?>























?>
