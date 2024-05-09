

<?php
//session_start();
//require_once('../Models/patient.php'); 
require_once('../Models/databaseConnection.php');
require_once('../Models/admin.php'); 

$admin = new Admin($connection);
$db = new DatabaseConnection();
$connection = $db->getConnection();

if(isset($_POST['submit'])) {
    // Include the model
    


    // Get user session data
    session_start();
    $patient_id = isset($_SESSION['patient_id']) ? $_SESSION['patient_id'] : null;

    // Check if the patient ID is set in the session
    if(!$patient_id) {
        // Handle the case where patient ID is not set
        echo "Patient ID is not set.";
        exit; // Stop further execution
    }

    // Create a new instance of the admin model
    

    // Get form data
    //$doctorName = isset($_POST['doctor']) ? trim($_POST['doctor']) : null;
    //$clinicName = isset($_POST['clinic']) ? trim($_POST['clinic']) : null;
    $appointmentDate = $_POST['date']; // Assuming appointment date is today
    //$appointmentTime = date('Y-m-d H:i:s'); // Assuming appointment time is now
    $status = 'Pending'; // Assuming the appointment status is pending
    $doctor_id = NULL;
    $clinic_id = NULL;
    $speciality = $_POST['speciality'];
    // Fetch the doctor ID based on the doctor's name
    //$doctorId = $admin->getDoctorIdByName($doctorName);

    // Check if the doctor ID was found
   // if(!$doctorId) {
        // Handle the case where doctor ID is not found
     //   echo "Doctor not found.";
     //   exit; // Stop further execution
    //}

    // Insert appointment data into the database
    $success = $admin->insertAppointment($patient_id, $doctor_id, $clinic_id, $appointmentDate, $speciality, $status);

    // Check if the insertion was successful
    //if($success) {
       // echo "Appointment successfully booked!";
   // } else {
      //  echo "Failed to book appointment. Please try again.";
   // }
}

header('Location: ../Views/book_appointment.php');

?>
