<?php
include("koneksi.php");

class User
{
    protected $password;
    public $username;
    public $fullname;
    public function __construct($password, $username, $fullname)
    {
        $this->password = $password;
        $this->username = $username;
        $this->fullname = $fullname;
    }
}

class UserManager extends User
{
    protected $conn;
    public function __construct($conn, $password, $username, $fullname)
    {
        parent::__construct($password, $username, $fullname);
        $this->conn = $conn;
    }

    public function createUser()
    {
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO tb_user (username, password, fullname) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->username, $hashedPassword, $this->fullname);
        return $stmt->execute();
    }
}

if (isset($_POST['signup']) && $_POST['signup'] == 'Register') {
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    
    $userManager = new UserManager($conn, $password, $uname, $fname);
    $result = $userManager->createUser();

    if ($result) {
        echo "<script>window.alert('Selamat, Akun anda berhasil dibuat'); window.location.href='login.php';</script>";
    } else {
        echo "<script>window.alert('Oops!!, Terjadi kesalahan!!!'); window.location.href='register.php';</script>";
    }
}
