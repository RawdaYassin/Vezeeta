<!DOCTYPE html>
<html>
<head>
    <style>
        .doctors-table {
            width: 100%;
            border-collapse: collapse;
        }

        .doctors-table th, .doctors-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .doctors-table th {
            background-color: #f2f2f2;
        }

        .doctors-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .doctors-table tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
// Controller code for handling the search functionality

// Assuming your model class is named 'HealthCareModel' and you have an instance of it named '$model'

// Include the necessary model file and create an instance of the model class
require_once('../Models/databaseConnection.php');
require_once('../Models/patient.php');
$db = new DatabaseConnection();
$connection = $db->getConnection();

$model = new Patient($connection);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['doctor_search'])) {
        // Doctor search form submitted
        $doctorName = $_POST['doctor_name'];
        $country = $_POST['country'];
        $speciality = $_POST['speciality'];
        
        // Call the model function to search for doctors
        $doctors = $model->findDoctor($doctorName, $country, $speciality);
        
        if (!empty($doctors)): ?>
            <div class="search-results">
                <h3>Doctors Search Results:</h3>
                <div class="doctors-list">
                    <table class="doctors-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($doctors as $doctor): ?>
                                <tr>
                                    <td><?php echo $doctor['first_name'] . ' ' . $doctor['last_name']; ?></td>
                                    <td><?php echo $doctor['speciality']; ?></td>
                                    <td><?php echo $doctor['country']; ?></td>
                                    <td><?php echo $doctor['city']; ?></td>
                                    <td><?php echo $doctor['phone_number']; ?></td>
                                    <td><?php echo $doctor['email']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif;
    } elseif (isset($_POST['clinic_search'])) {
        // Clinic search form submitted
        $clinicName = $_POST['clinic_name'];
        //$country = $_POST['country'];
        $speciality = $_POST['speciality'];
        
        // Call the model function to search for clinics
        $clinics = $model->findClinic($clinicName, $speciality);
        if (!empty($clinics)): ?>
            <div class="search-results">
                <h3>Clinics Search Results:</h3>
                <div class="doctors-list">
                    <table class="doctors-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clinics as $clinic): ?>
                                <tr>
                                    <td><?php echo $clinic['name']; ?></td>
                                    <td><?php echo $clinic['speciality']; ?></td>
                                    <td><?php echo $clinic['address']; ?></td>
                                    <td><?php echo $clinic['phone_number']; ?></td>
                                    <td><?php echo $clinic['email']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif;
    }
}
?>
</body>
</html>
