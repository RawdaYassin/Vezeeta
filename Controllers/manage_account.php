<?php

session_start();

// Include your model file here if needed
require_once('../Models/patient.php');
require_once('../Models/databaseconnection.php');

// Initialize the database connection
$db = new DatabaseConnection();
$connection = $db->getConnection();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = new Patient($connection); // Instantiate the Patient model class
    
    // Extract form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phone_number'];
    $dateOfBirth = $_POST['date_of_birth'];

    if (isset($_POST['update'])) {
        // Handle account update
        $result = $model->updateAccount($firstName, $lastName, $email, $password, $phoneNumber, $dateOfBirth);

        if ($result) {
            // Account updated successfully
            echo "Account updated successfully!";
            exit(); // Exit after successful update
        } else {
            // Account update failed
            echo "Failed to update account. Please try again later.";
        }
    } elseif (isset($_POST['delete'])) {
        // Handle account deletion
        $result = $model->deleteAccount($email);

        if ($result) {
            // Account deleted successfully
            echo "Account deleted successfully!";
        } else {
            // Account deletion failed
            echo "Failed to delete account. Please try again later.";
        }
    }
}
?>
