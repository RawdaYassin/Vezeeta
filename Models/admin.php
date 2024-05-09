

<?php

require_once('../Models/databaseConnection.php');
require_once('../Models/user.php');

class Admin extends User{
  private $connection;
  private $id;

  public function __construct($db)
  {
      $this->connection=$db;
  }

  // Getters
  public function getId()
  {
    return $this->id;
  }

  
  public function addAdmin($firstName, $lastName, $email, $password, $phoneNumber , $gender) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->connection->prepare("INSERT INTO Admin (first_name, last_name, email, password, phone_number, gender) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $email, $hashedPassword, $phoneNumber, $gender]);
        
        return true; // Registration successful
    } catch (PDOException $e) {
        // Handle database errors here (log or display error message)
        return false; // Registration failed
    }
}

public function addDoctor($firstName, $lastName, $email, $password, $phoneNumber , $gender , $city, $country, $speciality, $clinicId) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->connection->prepare("INSERT INTO Doctor (first_name, last_name, email, password, phone_number, gender, city, country, speciality, clinic_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $email, $hashedPassword, $phoneNumber, $gender, $city, $country, $speciality, $clinicId]);
        
        return true; // Registration successful
    } catch (PDOException $e) {
        // Handle database errors here (log or display error message)
        return false; // Registration failed
    }
}

public function addClinic($name, $email, $password, $phoneNumber , $address, $speciality) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->connection->prepare("INSERT INTO Clinic (name, email, password, phone_number, address, speciality) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $hashedPassword, $phoneNumber, $address, $speciality]);
        
        return true; // Registration successful
    } catch (PDOException $e) {
        // Handle database errors here (log or display error message)
        return false; // Registration failed
    }
}


  public function managePatientAccount( $action, PDO $connection, $data )
  {
    // Validate action parameter (update or delete)
    $validActions = ['update', 'delete'];
    if (!in_array($action, $validActions)) {
      return ['error' => 'Invalid action provided'];
    }
      $patient = new Patient($connection);
    // Access patient data (assuming this method belongs to a class with patient information)
    $patientId = $patient->getPatientId(); // Replace with your method to get patient ID
  
    if ($action === 'update') {
      // Validate and sanitize update data (if provided)
      if (!$data || !is_array($data)) {
        return ['error' => 'Missing or invalid update data'];
      }
  
      $updateData = [];
      foreach ($data as $field => $value) {
        // Validate allowed fields for update (e.g., first_name, last_name, etc.)
        if (in_array($field, ['first_name', 'last_name', 'gender', 'phone_number', 'date_of_birth'])) {
          $updateData[$field] = $value;
        }
      }
  
      if (empty($updateData)) {
        return ['error' => 'No valid fields provided for update'];
      }
  
      // Build update query with prepared statements
      $sql = "UPDATE Patient SET ";
      $params = [];
      $i = 0;
      foreach ($updateData as $field => $value) {
        $sql .= $field . "= ?";
        if ($i < count($updateData) - 1) {
          $sql .= ", ";
        }
        $params[] = $value;
        $i++;
      }
      $sql .= " WHERE patient_id = ?";
      $params[] = $patientId;
  
      try {
        $stmt = $connection->prepare($sql);
        $stmt->execute($params);
        return ['success' => 'Patient account updated successfully'];
      } catch (PDOException $e) {
        error_log("Error updating patient: " . $e->getMessage());
        return ['error' => 'An error occurred while updating the account'];
      }
    } else { // action === 'delete'
      // Confirm deletion with user (optional, security best practice)
      // ... (implementation for confirmation)
  
      try {
        // Delete patient data from Patient and User tables (assuming foreign key relationship)
        $connection->beginTransaction(); // Start transaction for data integrity
  
        $sql = "DELETE FROM Patient WHERE patient_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$patientId]);
  
        //$sql = "DELETE FROM User WHERE id = (SELECT user_id FROM Patient WHERE patient_id = ?)";
        //$stmt = $connection->prepare($sql);
        //$stmt->execute([$patientId]);
  
        $connection->commit(); // Commit transaction if successful deletion
        return ['success' => 'Patient account deleted successfully'];
      } catch (PDOException $e) {
        $connection->rollBack(); // Rollback transaction on error
        error_log("Error deleting patient: " . $e->getMessage());
        return ['error' => 'An error occurred while deleting the account'];
      }
    }
  }
  /*
  public function manageDoctorAccount( $action, PDO $connection, $data = null)
{
  $doctor = new Doctor();
  // Validate action parameter (update or delete)
  $validActions = ['update', 'delete'];
  if (!in_array($action, $validActions)) {
    return ['error' => 'Invalid action provided'];
  }

  // Access doctor data (assuming this method belongs to a class with doctor information)
  $doctorId = $doctor->getDoctorId(); // Replace with your method to get doctor ID

  if ($action === 'update') {
    // Validate and sanitize update data (if provided)
    if (!$data || !is_array($data)) {
      return ['error' => 'Missing or invalid update data'];
    }

    $updateData = [];
    foreach ($data as $field => $value) {
      // Validate allowed fields for update (e.g., first_name, last_name, etc.)
      if (in_array($field, ['first_name', 'last_name', 'gender', 'phone_number', 'city', 'country', 'speciality'])) {
        $updateData[$field] = $value;
      }
    }

    if (empty($updateData)) {
      return ['error' => 'No valid fields provided for update'];
    }

    // Build update query with prepared statements
    $sql = "UPDATE Doctor SET ";
    $params = [];
    $i = 0;
    foreach ($updateData as $field => $value) {
      $sql .= $field . "= ?";
      if ($i < count($updateData) - 1) {
        $sql .= ", ";
      }
      $params[] = $value;
      $i++;
    }
    $sql .= " WHERE doctor_id = ?";
    $params[] = $doctorId;

    try {
      $stmt = $connection->prepare($sql);
      $stmt->execute($params);
      return ['success' => 'Doctor account updated successfully'];
    } catch (PDOException $e) {
      error_log("Error updating doctor: "  . $e->getMessage());
      return ['error' => 'An error occurred while updating the account'];
    }
  } else { // action === 'delete'
    // Confirm deletion with user (optional, security best practice)
    // ... (implementation for confirmation)

    try {
      // Delete doctor data from Doctor table
      $sql = "DELETE FROM Doctor WHERE doctor_id = ?";
      $stmt = $connection->prepare($sql);
      $stmt->execute([$doctorId]);

      return ['success' => 'Doctor account deleted successfully'];
    } catch (PDOException $e) {
      error_log("Error deleting doctor: " . $e->getMessage());
      return ['error' => 'An error occurred while deleting the account'];
    }
  }
}

public function manageClinicAccount( $action, PDO $connection, $data = null)
{
  $clinic = new Clinic();
  // Validate action parameter (update or delete)
  $validActions = ['update', 'delete'];
  if (!in_array($action, $validActions)) {
    return ['error' => 'Invalid action provided'];
  }

  // Access clinic data (assuming this method belongs to a class with clinic information)
  $clinicId = $clinic->getClinicId(); // Replace with your method to get clinic ID

  if ($action === 'update') {
    // Validate and sanitize update data (if provided)
    if (!$data || !is_array($data)) {
      return ['error' => 'Missing or invalid update data'];
    }

    $updateData = [];
    foreach ($data as $field => $value) {
      // Validate allowed fields for update (e.g., name, address, etc.)
      if (in_array($field, ['name', 'email', 'phone_number', 'address', 'speciality'])) {
        $updateData[$field] = $value;
      }
    }

    if (empty($updateData)) {
      return ['error' => 'No valid fields provided for update'];
    }

    // Build update query with prepared statements
    $sql = "UPDATE Clinic SET ";
    $params = [];
    $i = 0;
    foreach ($updateData as $field => $value) {
      $sql .= $field . "= ?";
      if ($i < count($updateData) - 1) {
        $sql .= ", ";
      }
      $params[] = $value;
      $i++;
    }
    $sql .= " WHERE clinic_id = ?";
    $params[] = $clinicId;

    try {
      $stmt = $connection->prepare($sql);
      $stmt->execute($params);
      return ['success' => 'Clinic account updated successfully'];
    } catch (PDOException $e) {
      error_log("Error updating clinic: " . $e->getMessage());
      return ['error' => 'An error occurred while updating the account'];
    }
  } else { // action === 'delete'
    // Confirm deletion with user (optional, security best practice)
    // ... (implementation for confirmation)

    // Check if any doctors are associated with the clinic before deletion
    $sql = "SELECT COUNT(*) FROM Doctor WHERE clinic_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$clinicId]);
    $associatedDoctors = $stmt->fetchColumn();

    if ($associatedDoctors > 0) {
      return ['error' => 'Cannot delete clinic with associated doctors. Please reassign doctors before deletion.'];
    }

    try {
      // Delete clinic data from Clinic table
      $sql = "DELETE FROM Clinic WHERE clinic_id = ?";
      $stmt = $connection->prepare($sql);
      $stmt->execute([$clinicId]);

      return ['success' => 'Clinic account deleted successfully'];
    } catch (PDOException $e) {
      error_log("Error deleting clinic: " . $e->getMessage());
      return ['error' => 'An error occurred while deleting the account'];
    }
  }
}

public function manageAdminAccount( $action, PDO $connection, ?array $data = null)
{
  // Validate action parameter (update or delete)
  $validActions = ['update', 'delete'];
  if (!in_array($action, $validActions)) { // Using loose comparison here
    return ['error' => 'Invalid action provided'];
  }

  // Access admin data (assuming this method belongs to a class with admin information)
  $adminId = $this->id; // Replace with your method to get admin ID

  // **Important Note:** Deleting an admin account should be done with extreme caution 
  // as it can compromise system security. Consider disabling the account instead.

  if ($action === 'update') {
    // Validate and sanitize update data (if provided)
    if (!$data || !is_array($data)) {
      return ['error' => 'Missing or invalid update data'];
    }

    $updateData = [];
    foreach ($data as $field => $value) {
      // Validate allowed fields for update (e.g., first_name, last_name, etc.)
      if (in_array($field, ['first_name', 'last_name', 'gender', 'phone_number', 'email'])) {
        $updateData[$field] = $value;
      }
    }

    if (empty($updateData)) {
      return ['error' => 'No valid fields provided for update'];
    }

    // Build update query with prepared statements
    $sql = "UPDATE Admin SET ";
    $params = [];
    $i = 0;
    foreach ($updateData as $field => $value) {
      $sql .= $field . "= ?";
      if ($i < count($updateData) - 1) {
        $sql .= ", ";
      }
      $params[] = $value;
      $i++;
    }
    $sql .= " WHERE id = ?";
    $params[] = $adminId;

    try {
      $stmt = $connection->prepare($sql);
      $stmt->execute($params);
      return ['success' => 'Admin account updated successfully'];
    } catch (PDOException $e) {
      error_log("Error updating admin: " . $e->getMessage());
      return ['error' => 'An error occurred while updating the account'];
    }
  } else {  //action === 'delete'
    // **Consider disabling the admin account instead of deletion**
    //return ['warning' => 'Deleting an admin account is not recommended. Consider disabling the account instead.'];

    /* Uncomment the following code if deletion is absolutely necessary, 
       but use with extreme caution due to security implications 

     try {
       // Delete admin data from Admin table
       $sql = "DELETE FROM Admin WHERE id = ?";
       $stmt = $connection->prepare($sql);
       $stmt->execute([$adminId]);

       return ['success' => 'Admin account deleted successfully'];
     } catch (PDOException $e) {
       error_log("Error deleting admin: " . $e->getMessage());
       return ['error' => 'An error occurred while deleting the account'];
     }
  }
}
*/
public function acceptAppointment($appointment_id) {
  $sql = "UPDATE Appointments SET Status = :status WHERE AppointmentID = :appointment_id";
  try {
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(":status", "Confirmed");  // Bind status parameter
    $stmt->bindParam(":appointment_id", $appointment_id);  // Bind appointment ID parameter
    $stmt->execute();
  } catch (PDOException $e) {
    error_log("Error accepting appointment: " . $e->getMessage());
    // Handle error (log or display error message)
  }
}

public function updateAppointment($appointment_id) {
  $status = 'Confirmed';  // New status value
  
  $sql = "UPDATE Appointments SET status = :status WHERE appointment_id = :appointment_id";
  
  try {
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(":status", $status);  // Bind status parameter
    $stmt->bindParam(":appointment_id", $appointment_id);  // Bind appointment ID parameter
    $stmt->execute();
  } catch (PDOException $e) {
    error_log("Error updating appointment: " . $e->getMessage());
    // Handle error (log or display error message)
  }
}


public function removeAppointment($appointment_id) {
  $sql = "DELETE FROM Appointments WHERE AppointmentID = :appointment_id";
  try {
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(":appointment_id", $appointment_id);  // Bind appointment ID parameter
    $stmt->execute();
  } catch (PDOException $e) {
    error_log("Error deleting appointment: " . $e->getMessage());
    // Handle error (log or display error message)
  }
}

/*
public function SendMail($email, $name, $username, $password) {
  // Consider using a secure method to send credentials like one-time password or password reset link
  // This example is left unchanged for demonstration purposes
  include '../emails__admin/send.php';

  $mailer->setFrom("shahdalsayed20042017@gmail.com", "Doc Admin");  // the sender
  $mailer->addAddress($email, $name);

  $mailer->Subject = "sending username and password";

  $mailer->isHTML(true);

  $mailer->Body = "hello $name <br>this is the <strong>$username</strong> and <strong>$password</strong>";
  $mailer->AltBody = "hello $name this is the $username and $password";

  $mailer->send();
}/*

public function displayUsers() {
  $sql = "SELECT * FROM Patient";
  try {
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch data as associative array
    return $data;
  } catch (PDOException $e) {
    error_log("Error displaying users: " . $e->getMessage());
    return [];  // Return empty array on error
  }
}

public function displayAppointments() {
  $sql = "SELECT * FROM Appointment";
  try {
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch data as associative array
    return $data;
  } catch (PDOException $e) {
    error_log("Error displaying appointments: " . $e->getMessage());
    return [];  // Return empty array on error
  }
}
*/
public function getClinics() {

    // Fetch clinics from the database
    $sql = "SELECT * FROM Clinic";
    try {
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $clinics = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch data as associative array
      return $clinics;
    } catch (PDOException $e) {
      error_log("Error displaying appointments: " . $e->getMessage());
      return [];  // Return empty array on error
    }
    
}

function getDoctors() {

  // Fetch clinics from the database
  $sql = "SELECT * FROM Doctor";
  try {
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch data as associative array
    return $doctors;
  } catch (PDOException $e) {
    error_log("Error displaying appointments: " . $e->getMessage());
    return [];  // Return empty array on error
  }
  
}
/*
public function getDoctorsByClinic($clinicName) {
  try {
      // Query to get the clinic ID based on the clinic name
      $stmt = $this->connection->prepare("SELECT clinic_id FROM Clinic WHERE name = ?");
      $stmt->execute([$clinicName]);
      $clinicRow = $stmt->fetch(PDO::FETCH_ASSOC);

      // Check if the query was successful
      if ($clinicRow) {
          // Fetch the clinic ID
          $clinicId = $clinicRow['clinic_id'];

          // Query to get doctors based on the clinic ID
          $stmt = $this->connection->prepare("SELECT * FROM Doctor WHERE clinic_id = ?");
          $stmt->execute([$clinicId]);
          $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $doctors;
      } else {
          return []; // Return empty array if clinic not found
      }
  } catch (PDOException $e) {
      error_log("Error fetching doctors: " . $e->getMessage());
      return [];  // Return empty array on error
  }
}

public function getDoctorIdByName($doctorName) {
  try {
      $sql = "SELECT doctor_id FROM Doctor WHERE CONCAT(first_name, ' ', last_name) = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute([$doctorName]);
      $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
      return $doctor ? $doctor['doctor_id'] : null;
  } catch (PDOException $e) {
      error_log("Error fetching doctor ID: " . $e->getMessage());
      return null;
  }
}

*/
// Function to insert appointment
public function insertAppointment($patientId, $doctorId, $clinic_id, $appointmentDate, $appointmentSpeciality, $status) {
  $sql = "INSERT INTO Appointments (patient_id, doctor_id, clinic_id, appointment_date, appointment_speciality, status) VALUES (?, ?, ?,?, ?, ?)";
  try {
      $stmt = $this->connection->prepare($sql);
      return $stmt->execute([$patientId, $doctorId, $clinic_id, $appointmentDate, $appointmentSpeciality, $status]);
  } catch (PDOException $e) {
      error_log("Error inserting appointment: " . $e->getMessage());
      return false;
  }
}



}

