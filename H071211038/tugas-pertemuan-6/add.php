<?php
session_start();
include("koneksi.php");

$id = $_SESSION['id'];
try {
    if (isset($_GET['btnSubmit'])) {
        $nama = $_GET['nama'];
        $akun_fb = $_GET['akun_fb'];
        $email = $_GET['email'];
        $regional = $_GET['regional'];
        $tahun = $_GET['tahun'];
    
        if ($_SESSION['edit'] == 'yes') {
            $queryUpdate = "UPDATE members SET nama = '$nama', akun_fb = '$akun_fb',
            email = '$email', regional = '$regional', tahun = '$tahun'
            WHERE id = $id";
            if(mysqli_query($conn, $queryUpdate)) {
                $_SESSION['msgSuccess'] = "Data berhasil diperbarui";
            } else {
                $_SESSION['msgFailed'] = "Data gagal diperbarui";
            }
        } else if ($_SESSION['edit'] == 'no'){
            $queryInsert = "INSERT INTO members (nama, akun_fb, email, regional, tahun)
            VALUES ('$nama', '$akun_fb', '$email', '$regional', '$tahun')";
            if(mysqli_query($conn, $queryInsert)) {
                $_SESSION['msgSuccess'] = "Data berhasil ditambahkan";
            } else {
                $_SESSION['msgFailed'] = "Data gagal ditambahkan";
            }
        }
    }
} catch (\Throwable $th) {
    if ($_SESSION['edit'] == 'yes') {
        $_SESSION['msgFailed'] = "Data gagal diperbarui";
    } else {
            $_SESSION['msgFailed'] = "Data gagal ditambahkan";
    }
}
header("location: index.php");
?>