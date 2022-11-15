<?php 
session_start();

include ('koneksi.php');

$id = $_REQUEST['id'];
try {
    if (isset($id)) {
        $queryDelete= "DELETE FROM members WHERE id = $id";
        if(mysqli_query($conn, $queryDelete)) {
            $_SESSION['msgSuccess'] = "Data berhasil dihapus";
        } else {
            $_SESSION['msgFailed'] = "Data gagal dihapus";
        }
    }
} catch (\Throwable $th) {
    $_SESSION['msgFailed'] = "Data gagal dihapus";
}

header("location: index.php");
?>