<?php
include("../app.php");

class RegisterController {
    private $nama, $email, $password, $image;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->con;
    }

    public function set_user($nama, $email, $password, $image, $tmpImage) {
        $this->nama = $nama;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
        $this->tmpImage = $tmpImage;
    }

    public function registration()
    {   if(!file_exists($this->tmpImage) || !is_uploaded_file($this->tmpImage)) {
            return mysqli_query($this->conn, "INSERT INTO users (nama, email, `password`)
            VALUE('$this->nama', '$this->email', '$this->password')");
        } else {
            $this->image = renameImage($this->image);
            mysqli_query($this->conn, "INSERT INTO users (nama, email, `password`, `image`)
            VALUE('$this->nama', '$this->email', '$this->password','$this->image')");
            return move_uploaded_file($this->tmpImage, "../assets/img/".$this->image);
        }
    }

    public function isUserExists()
    {
        $checkUser = mysqli_query($this->conn, 
        "SELECT * FROM users WHERE email='$this->email'");
        if(mysqli_num_rows($checkUser)){
            return true;
        } else {
            return false;
        }
    }
}

?>