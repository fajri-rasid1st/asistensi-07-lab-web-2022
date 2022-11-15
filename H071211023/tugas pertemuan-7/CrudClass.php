<?php
class CRUDHelper
{
  public static function insert(mysqli $koneksi, $data)
  {
    $judul = htmlspecialchars($data['judul']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $genre = htmlspecialchars($data['genre']);
    $pengarang = htmlspecialchars($data['pengarang']);
    $isbnbuku = htmlspecialchars($data['isbnbuku']);
    $harga = htmlspecialchars($data['harga']);

    try {
      $query = "INSERT INTO tobuku VALUES ('', '$judul', '$penerbit', '$genre', '$pengarang', '$isbnbuku', '$harga')";

      mysqli_query($koneksi, $query);

      echo
      "<script>
              Swal.fire({
                icon: 'success',
                title: 'Data Berhasil ditambahkan',
              }).then((_) => document.location.href='index.php');
        </script>";
    } catch (mysqli_sql_exception) {
      echo
      "<script>
              Swal.fire({
                icon: 'error',
                title: 'Gagal menyimpan data',
              }).then((_) => document.location.href='index.php');
        </script>";
    }
  }

  public static function edit(mysqli $koneksi, $data)
  {
    $id = $data['id'];
    $judul = htmlspecialchars($data['judul']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $genre = htmlspecialchars($data['genre']);
    $pengarang = htmlspecialchars($data['pengarang']);
    $isbnbuku = htmlspecialchars($data['isbnbuku']);
    $harga = htmlspecialchars($data['harga']);
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

      echo
      "<script>
              Swal.fire({
                icon: 'success',
                title: 'Data Berhasil edit',
              }).then((_) => document.location.href='index.php');
        </script>";
    } catch (mysqli_sql_exception) {
      echo
      "<script>
              Swal.fire({
                icon: 'error',
                title: 'Data Gagal edit',
              }).then((_) => document.location.href='index.php');
        </script>";
    }
  }

  public static function hapus(mysqli $koneksi)
  {
    $query = "DELETE FROM tobuku WHERE id = '$_GET[id]' ";
    $hapus = mysqli_query($koneksi, $query);

    if ($hapus) {
      echo
      "<script>
              Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dihapus',
              }).then((_) => document.location.href='index.php');
        </script>";
    } else {
      echo
      "<script>
              Swal.fire({
                icon: 'error',
                title: 'Data Gagal Dihapus',
              }).then((_) => document.location.href='index.php');
        </script>";
    } 
  }
}

