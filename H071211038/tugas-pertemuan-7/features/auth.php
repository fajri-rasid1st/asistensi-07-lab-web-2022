<?php
session_start();
include("../controllers/RegisterController.php");
include("../controllers/LoginController.php");

$db = new DatabaseConnection;
$login = new LoginController;
$register = new RegisterController;

$conn = $db->con;
$nama = validateInput($conn, $_POST["nama"]);
$email = validateInput($conn, $_POST["email"]);
$password = validateInput($conn, $_POST["password"]);
$encPassword = password_hash($password, PASSWORD_DEFAULT); 
$image = $_FILES["image"]["name"];
$tmpImage = $_FILES["image"]["tmp_name"];

if(isset($_POST["btnRegister"])) {
    $register->set_user($nama, $email, $encPassword, $image, $tmpImage);
    if($register->isUserExists()) {
        redirect("Email already used by another user", "warning","../register.php");
    } else {
        if ($register->registration()) {
            redirect("Registered!", "success","../login.php");
        } else {
            redirect("Something Went Wrong", "failed", "../register.php");
        }
    }
} else if(isset($_POST["btnLogin"])) {
    $login->set_login($email, $password);
    if($login->userLogin()) {
        redirect("Logged In Successfully", "success", "../index.php");
    } else {
        redirect("Invalid Email or Password", "error", "../login.php");
    }
} else if (isset($_POST["btnLogout"])) {
    if ($login->logout()) {
        redirect("Logged Out", "success","../login.php");
    }
} else {
    redirect("Something Went Wrong", "error", "../login.php");
}
?>