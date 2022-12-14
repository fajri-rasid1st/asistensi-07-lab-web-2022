<?php
$host       = "localhost:3308";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
  die("Tidak bisa terkoneksi ke database");
}
?>