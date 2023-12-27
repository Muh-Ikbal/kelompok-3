<?php
include("koneksi.php");
class Admin
{
    private $conn;
    public $username;
    private $password;
    public function __construct($conn, $username, $password)
    {
        $this->conn = $conn;
        $this->username = $username;
        $this->password = $password;
    }
    public function adminLogin()
    {
        $sql = mysqli_query($this->conn, "SELECT * FROM `admin` WHERE username = '$this->username' ");
        $adminData = mysqli_fetch_assoc($sql);
        if ($adminData) {
            if ($this->password == $adminData['password']) {
                session_start();
                $_SESSION["admin"] = $adminData['username'];
                header("location:index.php");
            } else {
                header("location:login.php?pesan=password salah");
            }
        } else {
            header("location:login.php?pesan=username salah");
        }
    }
}
if (isset($_POST['signin'])) {
    $yourname = $_POST['your_name'];
    $yourpass = $_POST['your_pass'];
    $login = new Admin($conn,$yourname,$yourpass);
    $login -> adminLogin();
}
