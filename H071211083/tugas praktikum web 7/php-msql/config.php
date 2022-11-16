<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "akademik";

$koneksi = mysqli_connect($host, $user,$pass,$db);
if (!$koneksi) {
    die("tidak bisa terkoneksi ke database");
} 