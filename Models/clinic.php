

<?php


require_once('../Models/databaseConnection.php');
require_once('../Models/user.php');


class Clinic extends User{
  private $connection;
  private $clinicId;
  private $name;
  private $description;
  private $location;
  private $price;
  private $rate;
  private $adminId;

  public function __construct($db)
  {
    $this->connection = $db;
  }

  // Getters
  public function getClinicId()
  {
    return $this->clinicId;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getLocation()
  {
    return $this->location;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getRate()
  {
    return $this->rate;
  }

  public function getAdminId()
  {
    return $this->adminId;
  }

  // Setters
  public function setName($name)
  {
    $this->name = $name;
  }
  public function setClinicId($id)
  {
    $this->clinicId = $id;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function setLocation($location)
  {
    $this->location = $location;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function setRate($rate)
  {
    $this->rate = $rate;
  }

  public function setAdminId($adminId)
  {
    $this->adminId = $adminId;
  }

  public function updateAppointment($appointment_id, $clinic_id) {
    $sql = "UPDATE Appointments SET clinic_id = :clinic_id WHERE appointment_id = :appointment_id";
    try {
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":clinic_id", $clinic_id);  // Bind clinic ID parameter
        $stmt->bindParam(":appointment_id", $appointment_id);  // Bind appointment ID parameter
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error updating appointment: " . $e->getMessage());
        // Handle error (log or display error message)
    }
}



}
