<?php
session_start();
include("../controllers/UserController.php");
$db = new DatabaseConnection;
$conn = $db->con;
$user = new UserController;

$nama = validateInput($conn, $_POST["nama"]);
$email = validateInput($conn, $_POST["email"]);
$image = $_FILES["new_image"]["name"];
$tmpImage = $_FILES["new_image"]["tmp_name"];
$password = validateInput($conn, $_POST["new_password"]);
$confirmNewPassword = validateInput($conn, $_POST["confirm_new_password"]);
$confirmChange = validateInput($conn, $_POST['confirm_change']); 

if(isset($_POST["btnSave"])) {
    if ($user->isPasswordCorrect($confirmChange)) {
        $user->set_user_change($nama, $email, $password, $confirmNewPassword, $image, $tmpImage);
    }
}
?>