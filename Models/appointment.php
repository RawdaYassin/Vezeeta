

<?php

class Appointment {
  private $appointmentId;
  private $patientId;
  private $doctorId;
  private $appointmentTime;
  private $appointmentDate;
  private $status;

  public function __construct( $appointmentId = null, $patientId, $doctorId,  $appointmentTime, $appointmentDate, $status)
  {
    $this->appointmentId = $appointmentId;
    $this->patientId = $patientId;
    $this->doctorId = $doctorId;
    $this->appointmentTime = $appointmentTime;
    $this->appointmentDate = $appointmentDate;
    $this->status = $status;
  }

  // Getters
  public function getAppointmentId()
  {
    return $this->appointmentId;
  }

  public function getPatientId()
  {
    return $this->patientId;
  }

  public function getDoctorId()
  {
    return $this->doctorId;
  }

  public function getAppointmentTime()
  {
    return $this->appointmentTime;
  }

  public function getAppointmentDate()
  {
    return $this->appointmentDate;
  }

  public function getStatus()
  {
    return $this->status;
  }

  // Setters (optional, adjust as needed)
  public function setStatus($status)
  {
    $this->status = $status;
  }
}
