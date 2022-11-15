<?php
require_once("create-database.php");

class DatabaseConnection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db sgb team";
    
    public function __construct()
    {
        $con = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if (!$con) {
            die("connection failed: " . mysqli_connect_error());
        }
        return $this->con = $con;
    }    
}
?>