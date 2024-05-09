<?php

require_once('../Models/User.php');
require_once('../Models/databaseConnection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $userType =  trim($_POST['userType']);

    $db = new databaseConnection();
    $connection = $db->getConnection();

    $user = new User($connection);

    $loginResult = $user->login($email, $password, $userType);

    if ($loginResult !== false) {
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_type'] = $userType;

        switch ($userType) {
            case 'Patient':
                $_SESSION['message'] = 'Welcome back, Patient!';
                $_SESSION['patient_id'] = $user->getId();
                $redirectPath = '../Controllers/patient_profile.php';
                break;
            case 'Doctor':
                $_SESSION['message'] = 'Welcome back, Doctor!';
                $redirectPath = '../Controllers/doctor_dashboard.php';
                break;
            case 'Clinic':
                $_SESSION['message'] = 'Welcome back, Clinic!';
                $redirectPath = '../Controllers/clinic_dashboard.php';
                break;
            case 'Admin':
                $_SESSION['message'] = 'Welcome back, Admin!';
                $redirectPath = '../Controllers/admin_dashboard.php';
                break;
            default:
                $_SESSION['error_message'] = 'Invalid user type associated with this account.';
                ECHO $_SESSION['error_message'];
                header('Location: ../Views/auth.php');
                exit();
        }

        header('Location: ' . $redirectPath);
        exit();
    } else {
        $_SESSION['error_message'] = 'Login failed! Please check your email and password.';
        ECHO $_SESSION['error_message'];
        header('Location: ../Views/auth.php');
        exit();
    }
}

// Redirect back to the login page if not a POST request
header('Location: ../Views/auth.php');
exit();
?>
