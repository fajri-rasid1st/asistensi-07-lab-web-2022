  <?php
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

  // input data
  if (isset($_POST['simpan']) && !isset($_GET['hal'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $genre = htmlspecialchars($_POST['genre']);
    $pengarang = htmlspecialchars($_POST['pengarang']);
    $isbnbuku = htmlspecialchars($_POST['isbnbuku']);
    $harga = htmlspecialchars($_POST['harga']);

    try {
      $query = "INSERT INTO tobuku VALUES ('', '$judul', '$penerbit', '$genre', '$pengarang', '$isbnbuku', '$harga')";
      $simpan = mysqli_query($koneksi, $query);
      echo "<script>
            alert('Sukses menyimpan data');
            document.location.href='index.php';
          </script>";
    } catch (mysqli_sql_exception) {
      echo "<script>
            alert('Gagal menyimpan data');
            document.location.href='index.php';
          </script>";
    }
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
        $id = $_POST['id'];
        $judul = htmlspecialchars($_POST['judul']);
        $penerbit = htmlspecialchars($_POST['penerbit']);
        $genre = htmlspecialchars($_POST['genre']);
        $pengarang = htmlspecialchars($_POST['pengarang']);
        $isbnbuku = htmlspecialchars($_POST['isbnbuku']);
        $harga = htmlspecialchars($_POST['harga']);

        try {
          //data akan diedit
          $edit = mysqli_query($koneksi, "UPDATE tobuku SET 
                                            judul = '$judul',
                                            penerbit = '$penerbit',
                                            genre = '$genre',
                                            pengarang = '$pengarang',
                                            isbnbuku = '$isbnbuku',
                                            harga = '$harga' 
                                      WHERE id = '$id'
                                    ");

          echo "<script>
            alert('Edit data Sukses');
            document.location.href='index.php';
          </script>";
        } catch (mysqli_sql_exception) {
          echo "<script>
            alert('Edit data Gagal');
            document.location.href='index.php';
          </script>";
        }
      }
    } elseif ($_GET['hal'] == "hapus") {
      $query = "DELETE FROM tobuku WHERE id = '$_GET[id]' ";
      $hapus = mysqli_query($koneksi, $query);

      if ($hapus) {
        echo "<script>
            alert('Hapus data Sukses!');
            document.location.href='index.php';
          </script>";
      } else {
        echo "<script>
            alert('Hapus data Gagal!');
            document.location.href='index.php';
          </script>";
      }
    }
  }



  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tugas Praktikum PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
      .mx-auto {
        width: 1050px
      }

      .card {
        margin-top: 10px;
        background-color: #FFFAFA;
      }
    </style>
  </head>

  <body>
    <!-- awal container -->
    <div class="container">
      <h1 class="text-center">BookStore Edition</h1>


      <div class="row">

        <div class="col-md-8 mx-auto">
          <!-- awal card -->
          <div class="card">
            <div class="card-header bg-danger bg-gradient text-white">
              Form Tambah Buku
            </div>
            <div class="card-body">
              <!-- awal form -->
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
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                </div>
              </form>
              <!-- akhir form -->

            </div>
            <div class="card-footer bg-danger bg-gradient">

            </div>
          </div>
          <!-- akhir card -->
        </div>

      </div>


      <div class="card mt-3">
        <div class="card-header bg-danger bg-gradient text-white">
          Form Daftar Buku
        </div>
        <div class="card-body">
          <div class="col-md-6 mx-auto">
            <form method="POST">
              <div class="input-group mb-3">
                <input type="text" name="btncari" class="form-control" placeholder="Masukkan kata kunci">
                <button class="btn btn-primary" name="cari" type="submit">Cari</button>
                <button class="btn btn-danger" name="reset" type="submit">Reset</button>
              </div>
            </form>
          </div>
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
              $pencarian = "SELECT * FROM tobuku WHERE judul LIKE '%$keyword%' or genre LIKE '%$keyword%' ORDER BY id DESC ";
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
                  <a href="index.php?hal=edit&id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                  <a href="index.php?hal=hapus&id=<?= $data['id'] ?>" onclick="return confirm('ingin hapus data?')" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            <?php endwhile; ?>


          </table>
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer bg-danger bg-gradient">

        </div>
      </div>
    </div>
    <!-- akhir container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>

  </html>