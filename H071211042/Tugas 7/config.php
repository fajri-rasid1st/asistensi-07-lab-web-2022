<?php 
 
$host = "localhost";
$user = "root";
$pass = "";
$db = "akademik";
 
$conn = mysqli_connect($host, $user, $pass, $db);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>