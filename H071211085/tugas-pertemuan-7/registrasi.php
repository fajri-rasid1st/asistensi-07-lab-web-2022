<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'function.php';

if(isset($_POST['registrasi'])) {
    if(registrasi($_POST) > 0 ) {
        echo "<script>
                alert('User berhasil ditambahkan!');
                document.location = 'login.php';
                
             </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sleepy University Sign Up! </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

    <h2 class = "text-center mt-4 text-white"> Sign Up </h2>

    <!-- Awal Form Registrasi -->
    <div class="container mt-5 pt-2 pb-5 col-6 registrasi_form">
        <div class="row justify-content-center">
            <div class="col-8 mt-3">
                <form method="post" action="">
                <div class="mb-3"> 
                    <label class = "pb-2"> Username : </label>
                    <input type="text" class="form-control" name = "username" required>
                </div>
                <div class="mb-3">
                    <label class = "pb-2"> E-Mail : </label>
                    <input type="email" class="form-control" name = "emails" required>
                </div>
                <div class="mb-3">
                    <label class = "pb-2"> Password : </label>
                    <input type="password" class="form-control" name = "password" required>
                </div>
                <div class="mb-3">
                    <label class = "pb-2"> Konfirmasi Password : </label>
                    <input type="password" class="form-control" name = "password2" required>
                </div>
                <button type="submit" class="btn btn-secondary mt-3 me-2" name="registrasi" > Register!  </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Form Registrasi -->



    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>