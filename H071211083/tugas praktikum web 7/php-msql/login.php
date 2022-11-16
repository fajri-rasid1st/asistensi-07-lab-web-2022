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








<!-- ##############################################################################################################
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: http://localhost/php-msql/index.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $password;
    $sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        echo 'test';
        header("Location: http://localhost/php-msql/index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
    <title>Regis</title>
</head>
<body>
    <!-- <div class="alert alert-warning" role="alert">
     <?php# echo $_SESSION['error']?>
    </div>
  -->
    <!-- <div class="container">
    <center> 
        <div class="card w-50 mt-5">
        <div class="card-header">
        </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <form action="login.php" method="POST">
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                            <div class="input-group">
                                <input type="email" placeholder="Email" name="email" value="<?php #echo $email; ?>" required>
                            </div><br>
                            <div class="input-group">
                                <input type="password" placeholder="Password" name="password" value="<?php #echo $_POST['password']; ?>" required>
                            </div><br>
                            <div class="input-group">
                                <button name="submit" class="btn-primary">Login</button>
                            </div>
                        <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
                </form>
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </center>
    </div>
</body>
</html> --> -->