<?php
session_start();
include("controllers/AuthController.php");

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SGB Team Members OOP</title>
</head>
<body>
    <div class="container p-5 my-5">
        <?php include("features/message.php");?>
        <div class="card">
            <div class="card-header bg-dark text-white">
                <a href="index.php" class="text-white"><i class="fa fa-arrow-left me-2" aria-hidden="true"></i></a>
                My Profile
            </div>
            <div class="card-body m-3">
                <div class="row">
                    <div class="col-lg-2" align="center">
                        <img class="img-fluid mb-3" src="assets/img/<?php echo $_SESSION['user']['userImage'] != "" ? $_SESSION['user']['userImage'] : 'profile.png'; ?>">
                    </div>
                    <div class="col-lg-10">
                        <form action="features/user.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">Nama</label>
                                <div class="col-lg-9">
                                    <input name="nama" type="text" class="form-control" value="<?php echo $_SESSION['user']['userName']?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">Email</label>
                                <div class="col-lg-9">
                                    <input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" value="<?php echo $_SESSION['user']['userEmail'] ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">New Photo</label>
                                <div class="col-lg-9">
                                    <input type="file" name="new_image" accept="image/png, image/jpeg, image/jfif" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">New Password</label>
                                <div class="col-lg-9">
                                    <input name="new_password" type="password" class="form-control toggle-password" minlength="8">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-lg-3 col-form-label">Confirm New Password</label>
                                <div class="col-lg-9 position-relative">
                                    <input name="confirm_new_password" type="password" class="form-control toggle-password-2" minlength="8">
                                    <input type="checkbox" class="toggle">
                                    <label>Show Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">
                                        <i class="fa fa-floppy-disk me-2"></i>
                                        Save Edit
                                    </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Perubahan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">  
                                                    Masukkan Password Anda untuk memperbarui
                                                </div>
                                                <input name="confirm_change" type="password" class="form-control toggle-password-3" minlength="8">
                                                <input type="checkbox" class="toggle-2">
                                                <label>Show Password</label>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="features/user.php" method="post">
                                                    <button name="btnSave" class="btn btn-primary btn-ok">OK</button>
                                                </form>                                            
                                            </div>
                                            </div
                                        </div>
                                    </div>
                                </div>
                            </form> 
                        </div>
                        <div class="col-6" align="end">
                            <form action="features/auth.php" method="post">
                                <button name="btnLogout" class="btn btn-warning">
                                    <i class="fa fa-sign-out me-2" aria-hidden="true"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
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