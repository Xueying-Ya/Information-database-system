<?php

require_once 'database.php';

class User {
    private $conn;

    // Constructor
    public function __construct(){
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }


    // Execute queries SQL
    public function runQuery($sql){
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    // Insert


    // Update
    public function update($perID, $date, $time, $status){
        try{
          $stmt = $this->conn->prepare("UPDATE complain SET status = :status WHERE perID = :id AND date = :date AND time = :time");
          $stmt->bindparam(":id", $perID);
		  $stmt->bindparam(":date", $date);
          $stmt->bindparam(":time", $time);
		  $stmt->bindparam(":status", $status);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Delete
  

    // Redirect URL method
    public function redirect($url){
      header("Location: $url");
    }
}
?>
