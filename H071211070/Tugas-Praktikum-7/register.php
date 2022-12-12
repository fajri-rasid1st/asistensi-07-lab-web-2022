<?php

require_once("config.php");

$error = "";

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    if(!$name || !$username){
        $error = "Masukkan Nama/Username yang Valid!";
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $error = "Username sdh ada";
        } else {
             // query
        $sql = "INSERT INTO users (name, username, email, password) 
                VALUES (:name, :username, :email, :password)"; // placeholder
        $stmt = $db->prepare($sql);

        // bind parameter atau mengisi placeholder
        $param = array(
            ":name" => $name,
            ":username" => $username,
            ":password" => $password,
            ":email" => $email
        );
        // eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($param);

        // user sudah terdaftar maka alihkan ke halaman login

        if($saved) header("Location: login.php");
        }  
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
			crossorigin="anonymous"
		/>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p><a href="landingPage.html">Home</a>

        <h4>Daftar sebagai Admin </h4>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input required class="form-control" type="text" name="name" placeholder="Nama kamu" />
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input required class="form-control" type="text" name="username" placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input required class="form-control" type="email" name="email" placeholder="name@example.com" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input required class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-primary btn-block mt-3" name="register" value="Daftar" />
            <div>
                <?php
                if ($error) {
                ?>
                <div class="alert alert-danger d-flex align-items-left mt-3" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-circle-fill me-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                    </svg>
                    <div>
                    <?php echo $error ?>
                    </div>
                </div>
                <?php
                header("refresh:5;url=register.php");
                }
                ?>
            </div>
        </form>   
               
        </div>
    </div>
</div>
</body>
</html>