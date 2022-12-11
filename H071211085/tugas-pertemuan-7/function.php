<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "administrationdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database) or die (myslqi_error($conn));


function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = $data["emails"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek agar username tidak ada yang double

    $result = mysqli_query($conn, "SELECT username from users WHERE username = '$username'");

    if( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
        return false;
    }

    // Cek agar email tidak ada yang double

    $result = mysqli_query($conn, "SELECT email from users WHERE email = '$email'");

    if( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('E-mail sudah terdaftar!');
              </script>";
        return false;
    }

    // Cek Password

    if( $password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false; 
    }

    // Enksripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

   // Menambahkan user baru di database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

?>