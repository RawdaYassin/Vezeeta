

<?php
require_once('../Models/patient.php');
require_once('../Models/databaseConnection.php');

$db = new DatabaseConnection();
$connection = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["confirm_payment"])) {
        // Retrieve form data
        $payment_method = "Visa";
        $date = date('Y-m-d H:i:s'); // Current date and time
        $amount = 1500;
        $appointment_id = $_POST["appointment_id"];

        // Create PaymentModel instance
        $paymentModel = new Patient($connection);

        // Make payment
        $success = $paymentModel->makePayment($payment_method, $date, $amount, $appointment_id);

        if ($success) {
            echo "Payment successful!";
            // Handle success (e.g., redirect user)
            exit();
        } else {
            echo "Payment failed. Please try again later.";
            // Handle failure (e.g., display error message)
        }
    }
}
?>
