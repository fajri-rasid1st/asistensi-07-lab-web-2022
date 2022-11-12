<?php
session_start();
require_once("app.php");
include_once("controllers/LoginController.php");
$login = new LoginController;
$login->isLoggedIn();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/exacti/floating-labels@latest/floating-labels.min.css" media="screen">
        <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Login | SGB Team Members OOP</title>
    </head>
    <body style="height: 100vh;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card card-box" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-3 mt-md-4">
                        <?php include("features/message.php");?>
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-50 mb-5">Please enter your login and password!</p>
                        <form action="features/auth.php" method="post">
                            <div class="form-label-group outline">
                                <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Email">
                                <span><label>Email</label></span>
                            </div>
                            <div class="form-label-group outline">
                                <input type="password" name="password" class="form-control toggle-password" placeholder="Password">
                                <span><label>Password</label></span>
                            </div>
                            <div>
                                <input type="checkbox" class="toggle">
                                <label>Show Password</label>
                            </div>
                            <button name="btnLogin" class="btn btn-outline-primary btn-md px-4 m-3" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                        </form>
                    </div>

                    <div>
                        <p class="mb-0"> Don't have an account?
                            <a href="register.php" name="register" class="text-50 fw-bold">Register</a>
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="assets/js/toggle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>