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
    public function insert($activity_name){
      try{
        $stmt = $this->conn->prepare("INSERT INTO activity (activity_name) VALUES(:name)");
        $stmt->bindparam(":name", $activity_name);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    // Update
    public function update($activity_name,$activityID){
        try{
          $stmt = $this->conn->prepare("UPDATE activity SET activity_name = :name WHERE activityID = :id");
          $stmt->bindparam(":name", $activity_name);
          $stmt->bindparam(":id", $activityID);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Delete
    public function delete($activityID){
      try{
        $stmt = $this->conn->prepare("DELETE FROM activity WHERE activityID = :id");
        $stmt->bindparam(":id", $activityID);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Redirect URL method
    public function redirect($url){
      header("Location: $url");
    }
}
?>
