<?php
session_start();
include("../app.php");
include("../controllers/MembersController.php");
$members = new MembersController;
$db = new DatabaseConnection;
$conn = $db->con;
$nama = validateInput($conn, $_POST["nama"]);
$akun_fb = validateInput($conn, $_POST["akun_fb"]);
$email = validateInput($conn, $_POST["email"]);
$regional = validateInput($conn, $_POST["regional"]);
$tahun = validateInput($conn, $_POST["tahun"]);
if(isset($_POST["btnSubmit"])) {
    $members->set_data($nama, $akun_fb, $email, $regional, $tahun);
    if ($_SESSION['edit'] == true) {
        $members->editData($_SESSION['editId']);
    } elseif ($_SESSION['edit'] == false) {
        try {
            if ($members->inputData()) { 
                redirect("Adding Member Success", "success", "../index.php");
            }
        } catch (\Throwable $th) {
            redirect("Adding Member Failed", "error", "../index.php");
        }
    }  
}

if (isset($_REQUEST["id"])) {
    $members->deleteData($_REQUEST["id"]);
}
?>