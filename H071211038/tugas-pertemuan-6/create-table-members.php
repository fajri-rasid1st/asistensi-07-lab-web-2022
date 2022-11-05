<?php
include('koneksi.php');

$sql = "CREATE TABLE IF NOT EXISTS members (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    akun_fb VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    regional VARCHAR(255) NOT NULL,
    tahun INT(4) NOT NULL
    )";

if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
}

?>