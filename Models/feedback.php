

<?php

class Feedback {
  private $feedbackId;
  private $patientId;
  private $doctorId;
  private $clinicId;
  private $rating;
  private $comment;

  public function __construct($feedbackId = null, $patientId, $doctorId = null, $clinicId = null, $rating, $comment)
  {
    $this->feedbackId = $feedbackId;
    $this->patientId = $patientId;
    $this->doctorId = $doctorId;
    $this->clinicId = $clinicId;
    $this->rating = $rating;
    $this->comment = $comment;
  }

  // Getters
  public function getFeedbackId()
  {
    return $this->feedbackId;
  }

  public function getPatientId()  
  {
    return $this->patientId;
  }

  public function getDoctorId()
  {
    return $this->doctorId;
  }

  public function getClinicId()
  {
    return $this->clinicId;
  }

  public function getRating() 
  {
    return $this->rating;
  }

  public function getComment() 
  {
    return $this->comment;
  }

  // Setters (optional, adjust as needed)
  public function setDoctorId($doctorId)
  {
    $this->doctorId = $doctorId;
  }

  public function setClinicId($clinicId)
  {
    $this->clinicId = $clinicId;
  }
}
