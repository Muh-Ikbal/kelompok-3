<?php
include("koneksi.php");

class UserManager
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getUserByUsername($username)
    {
        $query = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($this->conn));
        return mysqli_fetch_array($query);
    }
}

if (isset($_POST['signin'])) {
    $yourname = $_POST['your_name'];
    $yourpass = $_POST['your_pass'];

    $userManager = new UserManager($conn);
    $userData = $userManager->getUserByUsername($yourname);
    if ($userData) {
        if (password_verify($yourpass, $userData["password"])) {
            session_start();
            $_SESSION["username"] = "$yourname";
            header("location:tiket/index.php");
        } else {
            header("location:login.php?pesan=password salah");
        }
    } else {
        header("location:login.php?pesan=username salah");
    }
}
