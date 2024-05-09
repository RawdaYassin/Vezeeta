<?php
session_start();

require_once('../Models/admin.php');
require_once('../Models/patient.php');
require_once('../Models/databaseConnection.php');

$db = new DatabaseConnection();
$connection = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submissions
    if (isset($_POST['add_user'])) {
        $userType = $_POST['user_type'];
        
        switch ($userType) {
            case 'admin':
                $model = new Admin($connection);
                $result = $model->addAdmin(
                    $_POST['first_name'],
                    $_POST['last_name'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['phone_number'],
                    $_POST['gender']
                );
                $message = $result ? "Admin added successfully!" : "Failed to add admin. Please try again later.";
                break;
            case 'doctor':
                $model = new Admin($connection);
                $result = $model->addDoctor(
                    $_POST['first_name'],
                    $_POST['last_name'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['phone_number'],
                    $_POST['gender'],
                    $_POST['city'],
                    $_POST['country'],
                    $_POST['speciality'],
                    $_POST['clinic']
                );
                $message = $result ? "Doctor added successfully!" : "Failed to add doctor. Please try again later.";
                break;
            case 'clinic':
                $model = new Admin($connection);
                $result = $model->addClinic(
                    $_POST['first_name'] ." ". $_POST['last_name'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['phone_number'],
                    $_POST['address'],
                    $_POST['speciality']
                );
                $message = $result ? "Clinic added successfully!" : "Failed to add clinic. Please try again later.";
                break;
            case 'patient':
                $model = new Patient($connection);
                $result = $model->addPatient(
                    $_POST['first_name'],
                    $_POST['last_name'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['phone_number'],
                    $_POST['gender'],
                    $_POST['date_of_birth']
                );
                $message = $result ? "Patient added successfully!" : "Failed to add patient. Please try again later.";
                break;
            default:
                $message = "Invalid user type.";
                break;
        }

        echo $message;
    }

    header('../Controllers/admin_dashboard.php');
    exit();
}
?>
