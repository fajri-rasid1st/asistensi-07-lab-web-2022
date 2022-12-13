<?php

session_start(); 

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'function.php';
// Submit Form

if(isset($_POST['simpan']) && !isset($_GET['hal'])) {
    $result = mysqli_query($conn, "INSERT INTO datamahasiswa (nama, nim, alamat, email, fakultas)
                                   VALUES ('$_POST[nama]',
                                           '$_POST[nim]',
                                           '$_POST[alamat]',
                                           '$_POST[email]',
                                           '$_POST[fakultas]')
                                   ");
        if($result) {
        echo "  
        <script>
            alert('Data berhasil di masukkan');
            document.location = 'index.php'; 
        </script> ";


        } else {
        echo " 
        <script> 
            alert('Data gagal di masukkan');
            document.location = 'index.php'; 
        </script> ";
        }
}


// Jika salah satu tombol pengaturan di klik

if(isset($_GET['hal'])) {
    // jika edit data
    if($_GET['hal'] == "edit") {
        // menampilkan data
        $tampil = mysqli_query($conn, "SELECT * FROM datamahasiswa WHERE id = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data) {
            $vnama = $data['nama'];
            $vnim = $data['nim'];
            $valamat = $data['alamat'];
            $vemail = $data['email'];
            $vfakultas = $data['fakultas'];
        }

        if(isset($_POST['simpan'])) {
            try {
                $edit = mysqli_query($conn, "UPDATE datamahasiswa SET nama = '$_POST[nama]',
                nim = '$_POST[nim]',
                alamat = '$_POST[alamat]',
                email = '$_POST[email]',
                fakultas = '$_POST[fakultas]'
                WHERE id = '$_GET[id]'
                ");
            
                    echo " 
                    <script> 
                        alert('Data berhasil di edit');
                        document.location = 'index.php';    
                    </script> ";
    
            } catch (\Throwable $th) {
                echo " 
                <script>
                    alert('Data gagal di edit');
                    document.location = 'index.php';
                </script> ";
            }
            // Data yang diedit
        }
    } else if ($_GET['hal'] == "hapus") {
        //mengahpus data
        $hapus = mysqli_query($conn, "DELETE FROM datamahasiswa WHERE id = '$_GET[id]' ");
        if ($hapus) {
            echo " 
            <script> 
                alert('Data suskses di hapus');
                document.location = 'index.php';  
            </script> ";

        } else {
            echo " 
            <script> 
                alert('Data gagal di hapus');
                document.location = 'index.php';
            </script> ";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Administration </title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <a href = 'logout.php' class="me-3 mt-2 d-flex justify-content-end" onclick = "return confirm('Apakah anda ingin logout?') " > Logout </a>
    <div class="col-12 text-center mt-4 headingFont"> <h2> Sleepy University </h2> </div>
    <!-- Awal Form -->
    <div class="container mt-3 form_section pt-1 pb-5 col-6">
        <div class="row justify-content-center">
            <div class=" mt-2 mb-3 text-center">
                Form Penginputan Data Mahasiswa
            </div>
            <div class="col-8">
                <form method="post" action="">
                <div class="mb-3">
                    <label class = "pb-2"> Nama : </label>
                    <input type="text" class="form-control" placeholder = "Your Name" name = "nama" value = "<?=@$vnama?>" required>
                </div>
                <div class="mb-3">
                    <label class = "pb-2"> NIM : </label>
                    <input type="text" class="form-control" placeholder = "Your NIM" name = "nim" value = "<?=@$vnim?>" required>
                </div>
                <div class="mb-3">
                    <label class = "pb-2"> Alamat : </label>
                    <input type="text" class="form-control" placeholder = "Your Address" name = "alamat" value = "<?=@$valamat?>" required>
                </div>
                <div class="mb-3">
                    <label class = "pb-2"> E-Mail : </label>
                    <input type="text" class="form-control" placeholder = "Your E-mail" name = "email" value = "<?=@$vemail?>" required>
                </div>
                <div class="mb-3">
                    <label class = "pb-2"> Fakultas : </label>
                    <select class="form-select" aria-label="Default select example" name = "fakultas" require>
                        <option value="<?=@$vfakultas?>"> <?=@$vfakultas?> </option>
                        <option value="Teknik"> Teknik </option>
                        <option value="Kedokteran"> Kedokteran </option>
                        <option value="Matematika dan Ilmu Pengetahuan Alam"> Matematika dan Ilmu Pengetahuan Alam</option>
                        <option value="Pertanian"> Pertanian </option>
                        <option value="Farmasi"> Farmasi </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3 btn-success me-2" name="simpan" > Submit </button>
                <button type="submit" class="btn btn-danger mt-3 " name = "reset" > Reset Form  </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Form -->

    <!-- Awal Tabel -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Tabel Data Mahasiswa Sleepy University
            </div>
            <div class="card-body">
                <table class = "table table-bordered table-striped">
                    <tr>
                        <th> No. </th>
                        <th> Nama </th>
                        <th> NIM </th>
                        <th> Alamat </th>
                        <th> E-Mail </th>
                        <th> Fakultas </th>
                        <th> Pengaturan </th>
                    </tr>
                    <?php
                        $id = 1;
                        $show = mysqli_query($conn, "SELECT * FROM dataMahasiswa order by id DESC");
                        while($data = mysqli_fetch_array($show)) : 

                     
                    ?>
                    <tr>
                        <td> <?php echo $id++; ?> </td>
                        <td> <?php echo $data['nama']; ?> </td>
                        <td> <?php echo $data['nim']; ?> </td>
                        <td> <?php echo $data['alamat']; ?> </td>
                        <td> <?php echo $data['email']; ?> </td>
                        <td> <?php echo $data['fakultas']; ?> </td>
                        <td> 
                            <a href = "index.php?hal=edit&id=<?=$data['id']?>" class="btn btn-primary btn-sm btn-outline-dark text-white"> Edit </a>
                            <a href = "index.php?hal=hapus&id=<?=$data['id']?>" class="btn btn-danger btn-sm btn-outline-dark text-white" onclick = "return confirm('Apakah anda ingin menghapus data ini?') "> Hapus </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Akhir Tabel -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>