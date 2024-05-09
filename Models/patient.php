

<?php

require_once('../Models/databaseConnection.php');
require_once('../Models/user.php');

class Patient extends User{

  private $connection;

  private $patientId;
  private $name;
  private $email;
  private $phoneNumber;
  private $dateOfBirth;


  
  public function __construct($db) {
    $this->connection = $db;
  }

  // Getters
  public function getPatientId()
  {
    return $this->patientId;
  }


  public function getName()
  {
    return $this->name;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }

  public function getDateOfBirth()
  {
    return $this->dateOfBirth;
  }

  // Setters
  public function setName($name)
  {
    $this->name = $name;
  }

  public function setEmail( $email)
  {
    $this->email = $email;
  }

  public function setPhoneNumber( $phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }

  public function setDateOfBirth($dateOfBirth)
  {
    $this->dateOfBirth = $dateOfBirth;
  }


  public function addPatient($firstName, $lastName, $email, $password, $phoneNumber = null, $gender = null, $dataOfBirth) {

    // Check if email already exists
    try {
      $stmt = $this->connection->prepare("SELECT COUNT(*) FROM Patient WHERE email = ?");
      $stmt->execute([$email]);
      $count = $stmt->fetchColumn();
      if ($count > 0) {
        return false; // Email already exists
      }
    } catch (PDOException $e) {
      // Handle database errors here (log or display error message)
      return false; // Registration failed
    }
  
    // Hash password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
    // Insert user data
    try {
      $stmt = $this->connection->prepare("INSERT INTO Patient (first_name, last_name, email, password, phone_number, gender, date_of_birth) VALUES (?, ?, ?, ?, ?,?, ?)");
      $stmt->execute([$firstName, $lastName, $email, $hashedPassword, $phoneNumber, $gender, $dataOfBirth]);
      $this->patientId = $this->connection->lastInsertId();
      return true; // Registration successful
    } catch (PDOException $e) {
      // Handle database errors here (log or display error message)
      return false; // Registration failed
    }
  }
  
/*
  public function viewHealthcareProviders(PDO $connection, string $providerType = null)
  {
    $data = [];
  
    if (!empty($providerType) && !in_array($providerType, ['doctor', 'clinic'])) {
      return ['error' => 'Invalid provider type specified'];
    }
  
    // Build query based on provider type
    $sql = "SELECT * FROM ";
    if ($providerType === 'doctor') {
      $sql .= "Doctor";
    } else if ($providerType === 'clinic') {
      $sql .= "Clinic";
    }
  
    try {
      $stmt = $connection->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $data[$providerType . 's'] = $results; // Adjust key name based on type
    } catch (PDOException $e) {
      error_log("Error fetching " . $providerType . "s: " . $e->getMessage());
      return ['error' => 'An error occurred while retrieving ' . $providerType . 's'];
    }
  
    return $data;
  }
  */
public function updateAccount($firstName, $lastName, $email = null, $password = null, $phoneNumber = null, $dateOfBirth) {
  try {
      // Fetch patient_id based on the provided email
      $stmt = $this->connection->prepare("SELECT patient_id FROM Patient WHERE email = ?");
      $stmt->execute([$email]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$result) {
          // Patient with the provided email does not exist
          return false;
      }

      $patientId = $result['patient_id']; // Get patient_id from the database

      $updates = []; // Array to store fields to be updated
      $params = []; // Array to store parameter values

      if (!empty($firstName)) {
          $updates[] = "first_name = ?";
          $params[] = $firstName;
      }

      if (!empty($lastName)) {
          $updates[] = "last_name = ?";
          $params[] = $lastName;
      }

      if (!empty($email)) {
          $updates[] = "email = ?";
          $params[] = $email;
      }

      if (!empty($password)) {
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          $updates[] = "password = ?";
          $params[] = $hashedPassword;
      }

      if (!empty($phoneNumber)) {
          $updates[] = "phone_number = ?";
          $params[] = $phoneNumber;
      }

      // Check if any fields need updating
      if (empty($updates)) {
          return true; // No changes requested, consider returning a message
      }

      $updateString = implode(", ", $updates); // Create comma-separated list of updates
      $sql = "UPDATE Patient SET $updateString WHERE patient_id = ?"; // Build the query dynamically

      $stmt = $this->connection->prepare($sql);
      $params[] = $patientId; // Use fetched patient_id as the last parameter
      $stmt->execute($params);

      // Update object properties only if update was successful
      $this->setFirstName($firstName); // Update only if provided
      $this->setLastName($lastName); // Update only if provided
      $this->email = $email ?? $this->email; // Update only if provided
      $this->phoneNumber = $phoneNumber ?? $this->phoneNumber; // Update only if provided

      return true; // Update successful
  } catch (PDOException $e) {
      // Log the error message for debugging
      error_log("Error updating user account: " . $e->getMessage());
      return false; // Update failed
  }
}


public function deleteAccount($email) {
  try {
      $stmt = $this->connection->prepare("DELETE FROM Patient WHERE email = ?");
      $stmt->execute([$email]);

      if ($stmt->rowCount() === 0) {
          throw new Exception("No patient found with the provided email.");
      }

      // Assuming session is already started elsewhere in your application
      session_destroy(); // Destroy the session

      return true; // Deletion successful
  } catch (PDOException $e) {
      // Handle database errors here
      // Log or display the error
      return false; // Deletion failed
  } catch (Exception $e) {
      // Handle other exceptions (e.g., patient not found)
      // Log or display the error
      return false; // Deletion failed
  }
}


  
  /*
  public function viewAccount($patientId) {

    // Create a new database connection
    $db = new databaseConnection();
    $connection = $db->getConnection();
  
    // Prepare a query to select patient information
    $stmt = $connection->prepare("SELECT * FROM Patient WHERE patient_id = ?");
    $stmt->execute([$patientId]);
    $st = $connection->prepare("SELECT * FROM Appointments WHERE patient_id = ?");
    $st->execute([$patientId]);

    // Fetch the patient data as an associative array
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);
    $patient = $st->fetch(PDO::FETCH_ASSOC);

    return $patient;
  }
*/

public function inputFilter($value) {
  if($value != ''){
      $value = trim($value);
      $value = stripslashes($value);
      $value = htmlspecialchars($value);
      return $value;
  } else {
      return false;
  }
}

public function getAllDoctors() {
  $sql = "SELECT * FROM Doctor";
  $stmt = $this->connection->prepare($sql);
  $stmt->execute();
  $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $doctors;
}

public function findDoctorById($id) {
  if($this->inputFilter($id)) {
      $id = $this->inputFilter($id);
      $sql = "SELECT * FROM Doctor WHERE doctor_id = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute([$id]);
      $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
      return $doctor;
  } else {
      header('Location: /doctors.php');
  }
}

public function findDoctor($name, $country, $speciality) {
  // Split the name parameter into first name and last name
  $names = explode(' ', $name);
  $firstName = NULL;
  $lastName = NULL;
if (isset($names[0])) {
    $firstName = $this->inputFilter($names[0]);
} else {
    // Handle the case where first name is not provided
}
if (isset($names[1])) {
    $lastName = $this->inputFilter($names[1]);
} else {
    // Handle the case where last name is not provided
}


  // Check if input filter returns valid values for first name and last name
  if ($firstName || $lastName || $country ||$speciality) {
      // Construct the SQL query to search for doctors based on first name, last name, country, and speciality
      $sql = "SELECT * FROM Doctor WHERE first_name LIKE ? OR last_name LIKE ? OR country = ? OR speciality = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(["$firstName", "$lastName", $country, $speciality]);
      $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $doctors;
  } else {
      // Redirect to a default page (e.g., doctors.php) if input is invalid
      header('Location: /doctors.php');
      exit(); // Terminate script execution after redirection
  }
}

  
public function getAllClinics() {
  $sql = "SELECT * FROM Clinic";
  $stmt = $this->connection->prepare($sql);
  $stmt->execute();
  $clinics = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $clinics;
}

public function findClinicById($id) {
  if($this->inputFilter($id)) {
      $id = $this->inputFilter($id);
      $sql = "SELECT * FROM Clinic WHERE clinic_id = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute([$id]);
      $clinic = $stmt->fetch(PDO::FETCH_ASSOC);
      return $clinic;
  } else {
      header('Location: /clinics.php');
  }
}
public function findClinic($name, $speciality) {
  if ($name || $speciality  ) {
      $name = $this->inputFilter($name);
      $sql = "SELECT * FROM Clinic WHERE name LIKE ?  OR speciality = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(["$name", $speciality]);
      $clinics = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $clinics;
  } else {
      header('Location: /clinics.php');
      exit(); // Terminate script execution after redirection
  }
}


    public function makePayment($payment_method, $date, $amount, $appointment_id) {
        $sql = "INSERT INTO Payment (payment_method, date, amount, appointment_id) VALUES (:payment_method, :date, :amount, :appointment_id)";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":payment_method", $payment_method);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":appointment_id", $appointment_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Error making payment: " . $e->getMessage());
            return false;
        }
    
}

}
?>