<?php 
session_start();

require "config.php";
include("function.php");

if (isset($_SESSION['user_id'])) {
    header ("Location: index.php");
    exit;
}

if(isset($_POST['submit'])) {
    
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username)) {

        //read from databse
        $query = "select * from register where username = '$username'";

        $result = mysqli_query($koneksi, $query);

        if($result) {

            if($result && mysqli_num_rows($result) > 0) {
            
                $user_data = mysqli_fetch_assoc($result);
                
                if(password_verify($password, $user_data['password'])) {
                    $_SESSION['user_id'] = $user_data['user_id'];

                    header ("Location: index.php");
                    exit;
                } else {
                    echo "<script>alert('Woops! salah bestiiii.')</script>";
                }
                
            }
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Fjalla+One&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <title>Login</title>
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

    #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: 	#800000;
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
        <form method="post">
            <center><div style="font-size: 30px; margin : 10px; text-decoration: underline; font-family: 'Abril Fatface', cursive;">Log In</div><br></center>

            <div>
                <label style="font-family: 'Sarabun', sans-serif; font-size: 14px;">Username/Email</label>
            <input id="text" type="text" name="username">
            </div><br>

            <div>
                <label style="font-family: 'Sarabun', sans-serif; font-size: 14px;">Password</label>
            <input id="text" type="password" name="password">
            </div><br>

            <center><button id="submit" name="submit" type="submit">Login</button><br><br>

            <div style="font-family: 'Sarabun', sans-serif; font-size: 14px;">Belum punya akun? <a href="register.php">Register</a></div><br></center>
        </form>
    </div>
</body>
</html>








