<?php
session_start();
include("koneksi.php");
include("create-table-members.php");
include("sorting.php");

if (isset($_GET['edit'])) {
    $_SESSION['edit'] = 'yes';
} else {
    $_SESSION['edit'] = 'no';
    $_SESSION['nama'] = ""; 
    $_SESSION['akun_fb'] = "";
    $_SESSION['email'] = "";
    $_SESSION['regional'] = "";
    $_SESSION['tahun'] = "";
}

if ($_SESSION['edit'] == 'yes') {
    $_SESSION['id'] = $_REQUEST['id'];
    $_SESSION['query'] = mysqli_query($conn, "SELECT * FROM members WHERE id = ". $_SESSION['id']);
    $rowEdit = mysqli_fetch_array($_SESSION['query']);
    $_SESSION['nama'] = $rowEdit['nama'];
    $_SESSION['akun_fb'] = $rowEdit['akun_fb'];
    $_SESSION['email'] = $rowEdit['email'];
    $_SESSION['regional'] = $rowEdit['regional'];
    $_SESSION['tahun'] = $rowEdit['tahun'];
}

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>SGB Team Members</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['msgSuccess'])) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">                
                    <?php echo $_SESSION['msgSuccess'];
                    unset($_SESSION['msgSuccess']);?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
                <?php
                } else if (isset($_SESSION['msgWarn'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">                
                        <?php echo $_SESSION['msgWarn'];
                        unset($_SESSION['msgWarn']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    <?php
                } else if (isset($_SESSION['msgFailed'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">                
                        <?php echo $_SESSION['msgFailed'];
                        unset($_SESSION['msgFailed']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    <?php
                }?>
                <form action="add.php" method="get">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input name="nama" type="text" class="form-control" value="<?php echo $_SESSION['nama'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Akun Facebook</label>
                        <div class="col-sm-10">
                            <input name="akun_fb" type="text" class="form-control" value="<?php echo $_SESSION['akun_fb'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" value="<?php echo $_SESSION['email']?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Regional</label>
                        <div class="col-sm-10">
                            <input name="regional" type="text" class="form-control" value="<?php echo $_SESSION['regional']?>" required>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tahun Bergabung</label>
                        <div class="col-sm-10">
                            <select name="tahun" id="inputtahun" class="form-select" required>
                                <option value="" <?php if ($_SESSION['tahun'] == "") echo "selected" ?> disabled>- Pilih Tahun -</option>    
                                <option value="2012" <?php if ($_SESSION['tahun'] == 2012) echo "selected" ?>>2012</option>
                                <option value="2013" <?php if ($_SESSION['tahun'] == 2013) echo "selected" ?>>2013</option>
                                <option value="2014" <?php if ($_SESSION['tahun'] == 2014) echo "selected" ?>>2014</option>
                                <option value="2015" <?php if ($_SESSION['tahun'] == 2015) echo "selected" ?>>2015</option>
                                <option value="2016" <?php if ($_SESSION['tahun'] == 2016) echo "selected" ?>>2016</option>
                                <option value="2017" <?php if ($_SESSION['tahun'] == 2017) echo "selected" ?>>2017</option>
                                <option value="2018" <?php if ($_SESSION['tahun'] == 2018) echo "selected" ?>>2018</option>
                                <option value="2019" <?php if ($_SESSION['tahun'] == 2019) echo "selected" ?>>2019</option>
                                <option value="2020" <?php if ($_SESSION['tahun'] == 2020) echo "selected" ?>>2020</option>
                                <option value="2021" <?php if ($_SESSION['tahun'] == 2021) echo "selected" ?>>2021</option>
                            </select>
                        </div>
                    </fieldset>
                    <div class="col-12">
                        <button name="btnSubmit" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">Data members</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="find" class="form-control" placeholder="Cari Data">
                            <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-3" id="table">
                    <table class="table table-bordered">
                        <thead class="text-white">
                            <tr>
                                <?php
                                sortData();
                                ?>
                                <th scope="col">No.</th>
                                <th scope="col"><a href='index.php?col=nama&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#table'>Nama</a></th>
                                <th scope="col"><a href='index.php?col=akun_fb&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#table'>Akun Facebook</a></th>
                                <th scope="col"><a href='index.php?col=email&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#table'>Email</a></th>
                                <th scope="col"><a href='index.php?col=regional&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#table'>Regional</a></th>
                                <th scope="col"><a href='index.php?col=tahun&orderBy=<?php echo $_SESSION['newOrderBy'];?>&#table'>Tahun</a></th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['search'])) {
                                $find = $_POST['find'];
                                $_SESSION['query'] = mysqli_query($conn, "SELECT * FROM members
                                WHERE nama LIKE '%$find%' OR akun_fb LIKE '%$find%' OR email LIKE '%$find%'
                                OR regional LIKE '%$find%' OR tahun LIKE '%$find%'");
                            } else {
                                $_SESSION['query'] = mysqli_query($conn, 'SELECT * FROM members');
                                sortData();                                
                            }
                            
                            if (!$_SESSION['query']) {
                                die('SQL Error: ' . mysqli_error($conn));
                            }

                            $num = 1;
                            
                            while ($row = mysqli_fetch_array($_SESSION['query'])) { ?>
                            <tr>
                                <td><?php echo $num++; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['akun_fb']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['regional']; ?></td>
                                <td><?php echo $row['tahun']; ?></td>
                                <td>
                                    <a href="index.php?edit=true&id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> Hapus </button>
                                    
                                    <!-- Modal -->
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
                                                    <a href="hapus-data.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-ok">OK</a>
                                                </div>
                                            </div
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>