<?php
$servername = "localhost";
$username = "root";
$password = '';

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS `db sgb team`";
if (!mysqli_query($conn, $sql)) {
    echo "error creating database: " . mysqli_error($conn);
}
?>