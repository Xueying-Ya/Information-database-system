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
    public function update($surveyID,$status){
        try{
          $stmt = $this->conn->prepare("UPDATE survey SET status = :status WHERE surveyID = :id");
          $stmt->bindparam(":id", $surveyID);
		  $stmt->bindparam(":status", $status);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Delete
    public function delete($surveyID){
      try{
        $stmt_survey = $this->conn->prepare("DELETE FROM survey WHERE surveyID = :id");
		$stmt_ans = $this->conn->prepare("DELETE FROM answer WHERE surveyID = :id");
		$stmt_make = $this->conn->prepare("DELETE FROM make WHERE surveyID = :id");
        $stmt_survey->bindparam(":id", $surveyID);
		$stmt_ans->bindparam(":id", $surveyID);
		$stmt_make->bindparam(":id", $surveyID);
        $stmt_survey->execute();
		$stmt_ans->execute();
		$stmt_make->execute();
		$path='_Newsurvey'.$surveyID.'.php';
		if (file_exists($path)) {unlink($file);}
        return $stmt_survey;
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
