<?php

class DatabaseConnection {

  private $host = "localhost";
  private $dbname = "Vezeeta";
  private $username = "root";
  private $password = "";

  private $dataSource;
  private $connection;

  // Initializes the connection and throws an exception if it fails
  public function __construct() {
    try {
      $this->dataSource = "mysql:host=$this->host;dbname=$this->dbname";
      $this->connection = new PDO($this->dataSource, $this->username, $this->password);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connection succeeded";
    } catch (PDOException $e) {
      throw new Exception("Connection failed: " . $e->getMessage());
    }
  }

  // Allows access to the PDO connection object
  public function getConnection() {
    return $this->connection;
  }

  // Closes the connection (error handling optional)
  public function __destruct() {
    $this->connection = null;
  }

//to establish connection
//require_once('../Models/databaseConnection.php'); //connection file path
//$db = new databaseConnection();
//$connection = $db->getConnection();
}
