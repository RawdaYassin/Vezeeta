<?php

class Payment {
  private $paymentId;
  private $paymentMethod;
  private $date;
  private $amount;
  private $appointmentId;

  public function __construct( $paymentId = null, $paymentMethod, $date, $amount = null, $appointmentId = null)
  {
    $this->paymentId = $paymentId;
    $this->paymentMethod = $paymentMethod;
    $this->date = $date;
    $this->amount = $amount;
    $this->appointmentId = $appointmentId;
  }

  // Getters
  public function getPaymentId()
  {
    return $this->paymentId;
  }

  public function getPaymentMethod()
  {
    return $this->paymentMethod;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function getAmount()
  {
    return $this->amount;
  }

  public function getAppointmentId()
  {
    return $this->appointmentId;
  }


  

}
