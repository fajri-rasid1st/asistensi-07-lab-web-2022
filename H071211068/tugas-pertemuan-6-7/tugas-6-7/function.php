<?php
session_start();

class Connection
{
  public $host = "localhost:3308";
  public $user = "root";
  public $password = "";
  public $db_name = "akademik";
  public $koneksi;

  public function __construct()
  {
    $this->koneksi = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}

class Register extends Connection
{
  public function registration($email, $username, $password, $confirmpassword)
  {
    $duplicate = mysqli_query($this->koneksi, "SELECT * FROM tb_login WHERE email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
      return 10;
      // Username or email has already taken
    } else {
      if ($password == $confirmpassword) {
        $passwordEncrypt = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO tb_login VALUES('', '$email', '$username', '$passwordEncrypt')";
        mysqli_query($this->koneksi, $query);
        return 1;
        // Registration successful
      } else {
        return 100;
        // Password does not match
      }
    }
  }
}

class Login extends Connection
{
  public $id;
  public function login($email, $password)
  {
    $result = mysqli_query($this->koneksi, "SELECT * FROM tb_login WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
      if (password_verify($password, $row["password"])) {
        $this->id = $row["id"];
        return 1;
        // Login successful
      } else {
        return 10;
        // Wrong password
      }
    } else {
      return 100;
      // User not registered
    }
  }

  public function idUser()
  {
    return $this->id;
  }
}

class Select extends Connection
{
  public function selectUserById($id)
  {
    $result = mysqli_query($this->koneksi, "SELECT * FROM tb_login WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
