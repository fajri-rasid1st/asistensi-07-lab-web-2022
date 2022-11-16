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














<!-- error_reporting(0);
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM register WHERE email='$email'";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO register (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Register</title>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center mt-5">
        <form action="" method="POST" class="login-email">
           <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div><br>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div><br>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div><br>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div><br>
            <div class="input-group">
                <button name="submit" class="btn-primary">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login </a></p>
        </form>
    </div>
</body>
</html> -->
