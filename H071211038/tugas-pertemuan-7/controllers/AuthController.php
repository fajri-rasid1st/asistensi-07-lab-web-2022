<?php
include("app.php");

class AuthController{
    public function __construct()
    {
        // $db = new DatabaseConnection;
        // $this->conn = $db->con;
        $this->isLoggedIn();
    }

    private function isLoggedIn()
    {
        if (!isset($_SESSION['authenticated'])) {
            redirect("Login to Access the Page", "warning", "login.php");
            return false;
        } else {
            return true;
        }
    }
}

$authenticated = new AuthController;
?>