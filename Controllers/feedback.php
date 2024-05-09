<?php

// Include your model file here if needed
 require_once('../Models/user.php');
 require_once('../Models/databaseConnection.php');
 $db = new DatabaseConnection();
 $connection = $db->getConnection();
    // Assuming you have a method to handle form submission
        // Check if the form is submitted

        session_start();
        $patient_id = $_SESSION['patient_id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if all required fields are filled
            if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['feedback'])) {
                // Additional validation can be added here if needed

                // Assuming you have a model method for submitting feedback
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $feedback = $_POST['feedback'];
                $clinicId = isset($_POST['clinic']) ? $_POST['clinic'] : null;
                $doctorId = isset($_POST['doctor']) ? $_POST['doctor'] : null;
                $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

                // Assuming you have an instance of your model class
                 $model = new User($connection);
                // Replace YourModelClass with the actual class name of your model

                // Assuming you have a method in your model to submit feedback
                $result = $model->submitFeedback($patient_id, $feedback, $clinicId, $doctorId, $rating);

                if ($result) {
                    // Feedback submitted successfully
                    // Redirect to a success page or display a success message
                    // header("Location: success.php");
                    // exit();
                    //echo "Feedback submitted successfully!";
                   // header ('../Controllers/patient_profile.php');
                    exit();
                } else {
                    // Feedback submission failed
                    // Redirect to an error page or display an error message
                    // header("Location: error.php");
                    // exit();
                    echo "Feedback submission failed. Please try again later.";
                }
            } else {
                // Required fields are missing
                // Redirect to an error page or display an error message
                // header("Location: error.php");
                // exit();
                echo "Please fill in all required fields.";
            }
        }
  


?>
