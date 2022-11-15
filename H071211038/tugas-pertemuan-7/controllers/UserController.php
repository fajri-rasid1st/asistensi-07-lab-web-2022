<?php
include("../app.php");
include("LoginController.php");

class UserController extends LoginController{
    private $nama, $email, $password, $confirmNewPassword, $image, $tmpImage, $id;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->con;
    }

    public function isPasswordCorrect($confirm)
    {   
        if(!password_verify($confirm, $_SESSION['user']['userPassword'])){
            redirect("Invalid Password", "error", "../my-profile.php");
        } else {
            return true;
        }
    }

    public function set_user_change($nama, $email, $password, $confirmNewPassword, $image, $tmpImage) {
        $this->nama = $nama;
        $this->email = $email;
        $this->password = $password;
        $this->confirmNewPassword = $confirmNewPassword;
        $this->image = renameImage($image);
        $this->tmpImage = $tmpImage;
        $this->id = $_SESSION['user']['userId'];
        $this->isEmailExists();
    }

    private function isNewPasswordMatches()
    {
        if ($this->password !== $this->confirmNewPassword) {
            redirect("New Password Doesn't Match", "error", "../my-profile.php");
        } else {
            $this->editUser();
        }
    }

    private function isPasswordChanges()
    {
        if ($this->password != "") {
            $newPassword = password_hash($this->password, PASSWORD_DEFAULT); 
            return mysqli_query($this->conn, "UPDATE users SET `password` = '$newPassword'
            WHERE `user id` = $this->id");
        }
    }

    private function editUser()
    {   
        if (!file_exists($this->tmpImage) || !is_uploaded_file($this->tmpImage)) {
            if (mysqli_query($this->conn, "UPDATE users SET nama = '$this->nama',
                email = '$this->email' WHERE `user id` = '$this->id'")) {
                $this->isPasswordChanges();
                $this->updateUserSession();
                redirect("Update Profile Success", "success", "../my-profile.php");
            } else {
                redirect("Update Profile Failed", "error", "../my-profile.php");
            }
        } else {
            if (mysqli_query($this->conn, "UPDATE users SET nama = '$this->nama',
                email = '$this->email', `image` = '$this->image'
                WHERE `user id` = $this->id")) {
                unlink("../assets/img/".$_SESSION['user']['userImage']);
                move_uploaded_file($this->tmpImage, "../assets/img/".$this->image);
                $this->isPasswordChanges();
                $this->updateUserSession();
                redirect("Update Profile Success", "success", "../my-profile.php");
            } else {
                redirect("Update Profile Failed", "error", "../my-profile.php");
            }
        }
    }

    private function isEmailExists()
    {
        $checkEmail = mysqli_query($this->conn, 
        "SELECT * FROM users WHERE email='$this->email' AND `user id`!=$this->id");
        if(mysqli_num_rows($checkEmail) == 1){
            return redirect("Email already used by another user", "warning","../my-profile.php");
        } else {
            $this->isNewPasswordMatches();
        }
    }

    public function updateUserSession()
    {
        $checkUser = mysqli_query($this->conn,
        "SELECT * FROM users
        WHERE `user id` = '$this->id'");
        $data = mysqli_fetch_assoc($checkUser);
        $this->userAuth($data);
    }
}

?>