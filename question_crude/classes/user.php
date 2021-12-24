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
    public function insert($question){
      try{
        $stmt = $this->conn->prepare("INSERT INTO question (question) VALUES(:name)");
        $stmt->bindparam(":name", $question);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    // Update
    public function update($question,$qID){
        try{
          $stmt = $this->conn->prepare("UPDATE question SET question = :name WHERE qID = :id");
          $stmt->bindparam(":name", $question);
          $stmt->bindparam(":id", $qID);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Delete
    public function delete($qID){
      try{
        $stmt = $this->conn->prepare("DELETE FROM question WHERE qID = :id");
        $stmt->bindparam(":id", $qID);
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
