<?php
session_start();

require "config.php";
include("function.php");

    if(isset($_POST['submit'])) {
        
        //sesuatu terpost
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username)) {
            $query = "select * from register where username = '$username'";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) === 1) {
                echo "<script>alert('username sudah terdaftar')</script>";
            }else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $user_id = random_num(20);

                $query = "insert into register (user_id, username, password) values ('$user_id', '$username', '$password_hash')";
    
                mysqli_query($koneksi, $query);
    
                echo "<script>
                alert('berhasil registrasi');
                document.location.href = 'login.php';
                </script>";
            }
        } else {
            echo "<script>alert('masukan informasi yang valid')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <title>register</title>
</head>

<style>
    #text{
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        font-family: 'Sarabun', sans-serif;
        width: 100%;
    }

    #submit{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: #800000;
        border: none;
        border-radius: 5px;
        font-family: 'Sarabun', sans-serif;
        font-size: 14px;
    }

    #box{
        background-color: #FFB6C1;
        margin: auto;
        width: 300px;
        padding: 20px;
        margin-top: 100px;
        justify-content: center;
        border-radius: 10px;
    }
</style>

<body>
<div id="box">
        <form action="" method="post">
            <center><div style="font-size: 30px; margin : 10px; text-decoration: underline; font-family: 'DM Serif Display', serif;">Registrasi</div><br></center>

            <div>
                <label style="font-family: 'Sarabun', sans-serif; font-size: 14px;">Username/Email</label>
                <input id="text" type="text" name="username">
            </div><br>

            <div>
                <label style="font-family: 'Sarabun', sans-serif; font-size: 14px;">Password</label>
                <input id="text" type="password" name="password">
            </div><br>

            <center><button id="submit" name="submit" type="submit">Create</button><br><br>

            <div style="font-family: 'Sarabun', sans-serif; font-size: 14px;">Sudah punya akun? <a href="login.php">Login</a></div><br></center>
        </form>
    </div>
</body>
</html>














