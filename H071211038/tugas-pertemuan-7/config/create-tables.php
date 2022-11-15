<?php
require_once('koneksi.php');
$db = new DatabaseConnection;
$conn = $db->con;

$sql = "CREATE TABLE IF NOT EXISTS members (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(255) NOT NULL,
            akun_fb VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            regional VARCHAR(255) NOT NULL,
            tahun INT(4) NOT NULL
        );
        CREATE TABLE IF NOT EXISTS users (
            `user id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `image` VARCHAR(255)
        )";

if (!mysqli_multi_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
}

?>