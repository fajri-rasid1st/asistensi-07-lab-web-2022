<?php
require_once "header.php";
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>

<?php
require_once "dbconfig.php";
require "CrudClass.php";

// Cek status login user 
if (!$user->isLoggedIn()) {
  header("location: login.php"); //Redirect ke halaman login 
}

// koneksi database
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "dbtokobuku";
$port       = "8111";

$koneksi    = mysqli_connect($host, $user, $pass, $db, $port);
if (!$koneksi) { //cek koneksi
  die("Tidak bisa terkoneksi ke database");
}

if (isset($_POST['simpan']) && !isset($_GET['hal'])) {
  CRUDHelper::insert($koneksi, $_POST);
}

//pengujian apakah data akan diedit atau disimpan baru
if (isset($_GET['hal'])) {
  if ($_GET['hal'] == "edit") {
    //tampilkan data yang akan diedit
    $tampil = mysqli_query($koneksi, "SELECT * FROM tobuku WHERE id = '$_GET[id]'");

    $data = mysqli_fetch_assoc($tampil);

    // data ditemukan
    $vid = $data['id'];
    $vjudul = $data['judul'];
    $vpenerbit = $data['penerbit'];
    $vgenre = $data['genre'];
    $vpengarang = $data['pengarang'];
    $visbn = $data['isbnbuku'];
    $vharga = $data['harga'];

    if (isset($_POST['simpan'])) {
      CRUDHelper::edit($koneksi, $_POST);
    }
  } elseif ($_GET['hal'] == "hapus") {
    CRUDHelper::hapus($koneksi);
  }
}
?>

<div class="container">
  <h1 class="text-center mt-4 mb-2"><b>Book Store Edition</b></h1>
  <!-- Form Tambah Buku dan Daftar Buku -->
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-header bg-danger bg-gradient text-white">Form Tambah Buku</div>
        <div class="card-body">
          <form action="" method="POST">

            <input type="hidden" name="id" id="id" value="<?= isset($vid) ? $vid : "" ?>"></input>
            <div class="mb-3">
              <label class="form-label">Judul Buku</label>
              <input type="text" name="judul" id="judul" value="<?= isset($vjudul) ? $vjudul : "" ?>" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Penerbit Buku</label>
              <input type="text" name="penerbit" id="penerbit" value="<?= isset($vpenerbit) ? $vpenerbit : "" ?>" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Genre Buku</label>
              <select class="form-control" name="genre" id="genre" required>
                <option value="" <?= !isset($vgenre) ? "selected" : "" ?>>-PILIH GENRE-</option>
                <option value="Romantis" <?= isset($vgenre) ? ($vgenre == "Romantis" ? "selected" : "") : "" ?>>Romantis</option>
                <option value="Horor" <?= isset($vgenre) ? ($vgenre == "Horor" ? "selected" : "") : "" ?>>Horor</option>
                <option value="Historical" <?= isset($vgenre) ? ($vgenre == "Historical" ? "selected" : "") : "" ?>>Historical</option>
                <option value="Fiksi Ilmiah" <?= isset($vgenre) ? ($vgenre == "Fiksi Ilmiah" ? "selected" : "") : "" ?>>Fiksi Ilmiah</option>
                <option value="Thriller" <?= isset($vgenre) ? ($vgenre == "Thriller" ? "selected" : "") : "" ?>>Thriller</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Pengarang Buku</label>
              <input type="text" name="pengarang" id="pengarang" value="<?= isset($vpengarang) ? $vpengarang : "" ?>" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">ISBN</label>
              <input type="number" name="isbnbuku" id="isbnbuku" value="<?= isset($visbn) ? $visbn : "" ?>" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Harga Buku</label>
              <input type="number" name="harga" id="harga" value="<?= isset($vharga) ? $vharga : "" ?>" class="form-control" required>
            </div>
            <div class="col-12 text-center">
              <input type="submit" name="simpan" value="Simpan Data" class="btn" style="color : white; background : #30A2A0;" />
            </div>
          </form>
        </div>
        <div class="card-footer bg-danger bg-gradient"></div>
      </div>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-header bg-danger bg-gradient text-white">Form Daftar Buku</div>
    <div class="card-body">
      <div class="col-md-6 mx-auto">
        <form action="" method="POST">
          <div class="input-group mb-3 text-center">
            <input type="text" name="btncari" id="keyword" class="form-control" placeholder="Masukkan kata kunci">
            <button type="submit" name="cari" id="cari" class="btn" style="color : white; background : #30A2A0;">Cari</button>
            <button class="btn btn-danger" name="reset" id="reset" type="submit">Reset</button>
          </div>
        </form>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover table bordered">
          <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Genre</th>
            <th>Pengarang</th>
            <th>ISBN</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>

          <?php
          // persiapan memasukkan data
          $no = 1;

          //untuk pencarian data
          //ketika tombol cari di klik
          if (isset($_POST['cari'])) {
            //menampilkan data yang akan dicari
            $keyword = $_POST['btncari'];
            $pencarian = "SELECT * FROM tobuku WHERE judul LIKE '%$keyword%' or genre LIKE '%$keyword%' or 
                            pengarang LIKE '%$keyword%' or penerbit LIKE '%$keyword%' or isbnbuku LIKE '%$keyword%' 
                            or harga LIKE '%$keyword%' ORDER BY id DESC ";
          } else {
            $pencarian = "SELECT * FROM tobuku ORDER BY id DESC";
          }
          $tampil = mysqli_query($koneksi, $pencarian);
          while ($data = mysqli_fetch_array($tampil)) :
          ?>

            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['judul'] ?></td>
              <td><?= $data['penerbit'] ?></td>
              <td><?= $data['genre'] ?></td>
              <td><?= $data['pengarang'] ?></td>
              <td><?= $data['isbnbuku'] ?></td>
              <td><?= "Rp. " . $data['harga'] ?></td>
              <td>
                <a href="index.php?hal=edit&id=<?= $data['id'] ?>" class="btn" style="color : white; background : #658978;">Edit</a>
                <a href="index.php?hal=hapus&id=<?= $data['id'] ?>" onclick="return confirm ('Yakin ingin menghapus data?')" class=" btn btn-danger" >Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </table>
      </div>
    </div>
    <div class="card-footer bg-danger bg-gradient text-center">
      <a href="logout.php" class="btn text-white" type="button"><b>LogOut</b></a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  </body>

  </html>