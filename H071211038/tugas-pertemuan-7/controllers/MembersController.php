<?php
class MembersController {
    private $nama, $akun_fb, $email, $regional, $tahun;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->con;
    }
    public function set_data($nama, $akun_fb, $email, $regional, $tahun)
    {
        $this->nama = $nama;
        $this->akun_fb = $akun_fb;
        $this->email = $email;
        $this->regional = $regional;
        $this->tahun = $tahun;
    }

    public function displayData()
    {   
        if (isset($_POST['search'])) {
            $find = $_POST['find'];
            return $this->searchData($find);
        } elseif (isset($_GET['col'])){
            return $this->sortData();
        } else {
            return mysqli_query($this->conn, "SELECT * FROM members");
        }
    }

    public function inputData()
    {
        return mysqli_query($this->conn, "INSERT INTO members (nama, akun_fb, email, regional, tahun)
        VALUES ('$this->nama', '$this->akun_fb', '$this->email', '$this->regional', '$this->tahun')");
    }

    public function deleteData($id) 
    {
        if(mysqli_query($this->conn, "DELETE FROM members WHERE id = $id")) {
            redirect("Data berhasil dihapus", "success", "../index.php");
        } else {
            redirect("Data gagal dihapus", "error", "../index.php");
        }
    }

    public function displayEdit($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM members WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }

    public function editData($id)
    {
        if (mysqli_query($this->conn, "UPDATE members SET nama = '$this->nama',
        akun_fb = '$this->akun_fb', email = '$this->email',
        regional = '$this->regional', tahun = '$this->tahun'
        WHERE id = $id")) {
            redirect("Update Member Success", "success", "../index.php");
        } else {
            redirect("Adding Member Failed", "error", "../index.php");
        }
    }

    public function sortData(){
        $_SESSION['orderBy'] = 'ASC';
        $_SESSION['newOrderBy'] = 'ASC';
        if(isset($_GET['col'])){ 
            $_SESSION['col'] = $_GET['col'];
            $_SESSION['orderBy'] = $_GET['orderBy'];
            
            if($_SESSION['orderBy'] == 'ASC'){
                $_SESSION['newOrderBy'] ='DESC';
            }else{
                $_SESSION['newOrderBy'] ='ASC';
            }
            return mysqli_query($this->conn, "SELECT * FROM members ORDER BY " . $_SESSION['col'] . " " . $_SESSION['orderBy']);
        }
    }

    public function searchData($find)
    {
        return mysqli_query($this->conn, "SELECT * FROM members
        WHERE nama LIKE '%$find%' OR akun_fb LIKE '%$find%'OR email LIKE '%$find%'
        OR regional LIKE '%$find%' OR tahun LIKE '%$find%'");
    }
}
?>