<?php
session_start();
include("controllers/AuthController.php");
include("controllers/MembersController.php");
$num = 1;
$members = new MembersController;

$result = $members->displayData();
if (isset($_GET['editId'])) {
    $_SESSION['edit'] = true;
} else {
    $_SESSION['edit'] = false;
    $editData['nama'] = "";
    $editData['akun_fb'] = "";
    $editData['email'] = "";
    $editData['regional'] = "";
    $editData['tahun'] = "";
}
if ($_SESSION['edit'] == true) {
    $_SESSION['editId'] = $_GET['editId'];
    $editData = $members->displayEdit($_SESSION['editId']);
}
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
    <header>
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark fixed-top">
            <div class="container-fluid">
                <a class=" navbar-brand" href="my-profile.php">
                    <img src="assets/img/<?php echo $_SESSION['user']['userImage'] != "" ? $_SESSION['user']['userImage'] : 'profile.png'; ?>" height=45>
                    <?php echo "Hi, ".$_SESSION['user']['userName']."!"; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <form action="features/auth.php" method="post">
                            <button name="btnLogout" class="btn btn-primary btn-md nav-link text-white" type="submit" style="border-color: transparent; background-color: transparent;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                        </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
        <div class="container p-5 mt-5">
        <?php include("features/message.php");?>
        <div class="card">
            <div class="card-header bg-dark text-white">
                Create / Edit Data
            </div>
            <div class="card-body">
                <form action="features/Members.php" method="post">
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Nama</label>
                        <div class="col-md-10">
                            <input name="nama" type="text" class="form-control" value="<?php echo $editData['nama']?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Akun Facebook</label>
                        <div class="col-md-10">
                            <input name="akun_fb" type="text" class="form-control" value="<?php echo $editData['akun_fb'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" value="<?php echo $editData['email']?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Regional</label>
                        <div class="col-md-10">
                            <input name="regional" type="text" class="form-control" value="<?php echo $editData['regional']?>" required>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <label class="col-md-2 col-form-label">Tahun</label>
                        <div class="col-md-10">
                            <select name="tahun" id="inputtahun" class="form-select" required>
                                <option value="" <?php if ($editData['tahun'] == "") echo "selected" ?> disabled>- Pilih Tahun Bergabung -</option>    
                                <option value="2012" <?php if ($editData['tahun'] == 2012) echo "selected" ?>>2012</option>
                                <option value="2013" <?php if ($editData['tahun'] == 2013) echo "selected" ?>>2013</option>
                                <option value="2014" <?php if ($editData['tahun'] == 2014) echo "selected" ?>>2014</option>
                                <option value="2015" <?php if ($editData['tahun'] == 2015) echo "selected" ?>>2015</option>
                                <option value="2016" <?php if ($editData['tahun'] == 2016) echo "selected" ?>>2016</option>
                                <option value="2017" <?php if ($editData['tahun'] == 2017) echo "selected" ?>>2017</option>
                                <option value="2018" <?php if ($editData['tahun'] == 2018) echo "selected" ?>>2018</option>
                                <option value="2019" <?php if ($editData['tahun'] == 2019) echo "selected" ?>>2019</option>
                                <option value="2020" <?php if ($editData['tahun'] == 2020) echo "selected" ?>>2020</option>
                                <option value="2021" <?php if ($editData['tahun'] == 2021) echo "selected" ?>>2021</option>
                            </select>
                        </div>
                    </fieldset>
                    <div class="col-12">
                        <button name="btnSubmit" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header bg-dark text-white">Data members</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="find" class="form-control" placeholder="Cari Data">
                            <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <?php
                                $members->sortData();
                                ?>
                                <th scope="col">No.</th>
                                <th scope="col" id="nama"><a href='index.php?col=nama&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#nama'>Nama</a></th>
                                <th scope="col" id="akun"><a href='index.php?col=akun_fb&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#akun'>Akun Facebook</a></th>
                                <th scope="col" id="email"><a href='index.php?col=email&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#email'>Email</a></th>
                                <th scope="col" id="regional"><a href='index.php?col=regional&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#regional'>Regional</a></th>
                                <th scope="col" id="tahun"><a href='index.php?col=tahun&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#tahun'>Tahun</a></th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                foreach($result as $row) {
                            ?>
                            <tr>
                                <td><?php echo $num++; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['akun_fb']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['regional']; ?></td>
                                <td><?php echo $row['tahun']; ?></td>
                                <td>
                                    <a href="index.php?editId=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> Hapus </button>
                                    
                                    <div class="modal fade" id="exampleModal-<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">  
                                                        Apakah Anda yakin untuk menghapus data ini?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="features/Members.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-ok">OK</a>
                                                </div>
                                            </div
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>