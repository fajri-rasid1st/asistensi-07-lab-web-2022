<?php 
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'function.php';

if(isset($_POST["login"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            
            // set session 
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;

        } else {
            echo "<script>
                    alert('password anda salah!');
                    document.location = 'login.php'; 
                  </script>";
        }
    } else {
        echo "<script>
                alert('Username tidak tersedia!');
                document.location = 'login.php'; 
             </script>";

    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sleepy University Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>

    <h2 class = "text-center mt-4 text-white"> Login </h2>

    <!-- Awal Form Registrasi -->
    <div class="container mt-5 pt-2 pb-5 col-6 registrasi_form">
        <div class="row justify-content-center">
            <div class="col-8 mt-3">
                <form method="post" action="">
                <div class="mb-3"> 
                    <label class = "pb-2"> Username :</label>
                    <input type="text" class="form-control" name = "username" required>
                </div>
                <div class="mb-3">
                    <label class = "pb-2"> Password : </label>
                    <input type="password" class="form-control" name = "password" required>
                </div>
                <button type="submit" class="btn btn-secondary mt-3 me-2" name="login" > Sign In!  </button>
                </form>

                <div class = "font-regis mt-4 "> Belum mempunyai akun? Silahkan <a href = "registrasi.php"> registrasi </a> terlebih dahulu! </div>
            </div>
        </div>
    </div>
    <!-- Akhir Form Registrasi -->



    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>