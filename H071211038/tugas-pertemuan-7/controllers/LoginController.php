<?php
class LoginController {
    private $email, $password;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->con;
    }
    public function set_login($email, $password)
    {
        $this->email = $email; 
        $this->password = $password;
    }
    public function userLogin()
    {
        $checkUser = mysqli_query($this->conn,
        "SELECT * FROM users
        WHERE email = '$this->email'");
        if (mysqli_num_rows($checkUser) == 1) {
            $data = mysqli_fetch_assoc($checkUser);
    		if(password_verify($this->password, $data['password'])){
                $this->userAuth($data);
                return true;
            }
        } else {
            return false;
        }
    }
    public function userAuth($data)
    {
        $_SESSION['authenticated'] = true;
        $_SESSION['user'] = [
            'userId' => $data['user id'],
            'userName' => $data['nama'],
            'userEmail' => $data['email'],
            'userImage' => $data['image'],
            'userPassword' => $data['password'],
        ];
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['authenticated']) === true) {
            redirect("You are already logged in", "warning","index.php");
        } else {
            return false;
        }
    }

    public function logout()
    {
        if (isset($_SESSION['authenticated']) == true) {
            unset($_SESSION['authenticated']);
            unset($_SESSION['user']);
            return true;
        } else {
            return false;
        }
        
    }
}
?>