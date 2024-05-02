<?php

require_once('../Models/databaseConnection.php');
class User {

  // Database connection (replace with your connection details)
  //private $conn;

//private $db = new databaseConnection();
private $connection;

  // User properties
  private $id;
  private $firstName;
  private $lastName;
  private $email;
  private $phoneNumber;
  private $gender;

  public function __construct($db) {
    $this->connection = $db;
  }

  
  public function getId() {
    return $this->id;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function setFirstName($firstName) {
    $this->firstName = $firstName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPhoneNumber() {
    return $this->phoneNumber;
  }

  public function setPhoneNumber($phoneNumber) {
    $this->phoneNumber = $phoneNumber;
  }

  public function getGender() {
    return $this->gender;
  }

  public function setGender($gender) {
    $this->gender = $gender;
  }

  // Register a new user
  public function register($firstName, $lastName, $email, $password, $phoneNumber = null, $gender = null) {

    // Check if email already exists
    try {
      $stmt = $this->connection->prepare("SELECT COUNT(*) FROM User WHERE email = ?");
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
      $stmt = $this->connection->prepare("INSERT INTO User (first_name, last_name, email, password, phone_number, gender) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->execute([$firstName, $lastName, $email, $hashedPassword, $phoneNumber, $gender]);
      $this->id = $this->connection->lastInsertId();
      return true; // Registration successful
    } catch (PDOException $e) {
      // Handle database errors here (log or display error message)
      return false; // Registration failed
    }
  }
  

  // Login user
  public function login($email, $password) {

    // Get user by email
    try {
        $stmt = $this->connection->prepare("SELECT * FROM User WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false; // User not found
        }

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Login successful, populate user details
            $this->id = $user['id'];
            $this->firstName = $user['first_name'];
            $this->lastName = $user['last_name'];
            $this->email = $user['email'];
            $this->phoneNumber = $user['phone_number'];
            $this->gender = $user['gender'];
            return true;
        } else {
            return false; // Incorrect password
        }
    } catch (PDOException $e) {
        // Handle database errors here
        // Log or display the error
        return false; // Login failed
    }
  }

  // Logout user (session management needed for real implementation)
  public function logout() {
    // Start the session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
  }

  // Manage user account (details can be updated here)
  public function updateAccount($firstName, $lastName, $phoneNumber = null, $gender = null) {

    try {
        $stmt = $this->connection->prepare("UPDATE User SET first_name = ?, last_name = ?, phone_number = ?, gender = ? WHERE id = ?");
        $stmt->execute([$firstName, $lastName, $phoneNumber, $gender, $this->id]);
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->gender = $gender;
        return true; // Update successful
    } catch (PDOException $e) {
        // Handle database errors here
        // Log or display the error
        return false; // Update failed
    }
  }

  // Submit user feedback (assuming Feedback table structure as provided)
  public function submitFeedback($patientId, $clinicId = null, $doctorId = null, $rating, $comment) {

    try {
        $stmt = $this->connection->prepare("INSERT INTO Feedback (patient_id, clinic_id, doctor_id, rating, comment) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$patientId, $clinicId, $doctorId, $rating, $comment]);
        return true; // Feedback submitted successfully
    } catch (PDOException $e) {
        // Handle database errors here
        // Log or display the error
        return false; // Feedback submission failed
    }
  }

  // Additional notes:

  // Error handling: Consider adding more specific error handling for database operations
  // (e.g., using try-catch blocks or checking for PDOExceptions).

  // Security: This code demonstrates basic security practices like password hashing. 
  // For additional security, consider using prepared statements for all database interactions 
  // to prevent SQL injection vulnerabilities.

  // Session management: The `logout` method provides a placeholder for session management. 
  // Implement session handling logic for a complete logout functionality.
}
?>
