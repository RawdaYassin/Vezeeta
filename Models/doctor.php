

<?php

require_once('../Models/databaseConnection.php');
require_once('../Models/user.php');

class Doctor extends User{

  private $connection;
  private $doctorId;
  private $cityId;
  private $country;
  private $clinicName;
  private $speciality;

  // Constructor (can be adjusted based on your requirements)
  public function __construct($db)
  {
    $this->connection = $db;
  }

  // Getters
  public function getDoctorId()
  {
    return $this->doctorId;
  }

  public function getCity()
  {
    return $this->cityId;
  }

  public function getCountry()
  {
    return $this->country;
  }

  public function getClinicName()
  {
    return $this->clinicName;
  }

  public function getSpeciality()
  {
    return $this->speciality;
  }

  // Setters
  public function setCity( $city)
  {
    $this->cityId = $city;
  }

  public function setDoctorID(  $doctorID)
  {
    $this->doctorId = $doctorID;
  }
  public function setCountry(  $country)
  {
    $this->country = $country;
  }

  public function setClinicName(  $clinicName)
  {
    $this->clinicName = $clinicName;
  }

  public function setSpeciality(  $speciality)
  {
    $this->speciality = $speciality;
  }

  public function updateAppointment($appointment_id, $doctor_id) {
    $sql = "UPDATE Appointments SET doctor_id = :doctor_id WHERE appointment_id = :appointment_id";
    try {
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":doctor_id", $doctor_id);  // Bind doctor ID parameter
        $stmt->bindParam(":appointment_id", $appointment_id);  // Bind appointment ID parameter
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error updating appointment: " . $e->getMessage());
        // Handle error (log or display error message)
    }
}



}
