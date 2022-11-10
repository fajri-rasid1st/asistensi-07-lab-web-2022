<?php 

require_once("config.php");

$error = "";

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query atau mengisi placeholder
    $param = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($param);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman index
            header("Location: index.php");
        }else{
            // jika salah satunya salah
            $error = "Username atau Password yang Anda Masukkan Tidak Diketahui";
        }
    } else {
        //jika username dan password kosong
        $error = "Masukkan Username/Email dan Password Anda";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
			crossorigin="anonymous"
		/>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row-1">
        <div class="col-md-6">
        <p><a href="landingPage.html">Home</a>
        <h4>Login Admin</h4>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username atau Email" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn btn-primary btn-block mt-3" name="login" value="Masuk" />
        </form>
        </div>
        <div class="col-md-6">
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
          header("refresh:5;url=login.php");
        }
        ?>
        </div>

    </div>
</div>
</body>
</html>