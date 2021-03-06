<?php
class Database {
    // Connection variables
    private $host = "sql110.epizy.com";
    private $dbName = "epiz_25351462_activity";
    private $username = "epiz_25351462";
    private $password = "i99YVrZQHHya";

    public $conn;

    // Method return security connection
    public function dbConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>
