<?php
include("koneksi.php");

class User
{
    protected $password;
    public $username;
    public $fullname;
    public function __construct($username,$password, $fullname)
    {
        $this->username = $username;
        $this->password = $password;
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
        $queri = $this->conn->prepare("INSERT INTO tb_user (username, password, fullname) VALUES (?, ?, ?)");
        $queri->bind_param("sss", $this->username, $hashedPassword, $this->fullname);
        return $queri->execute();
    }
}
class Login extends User
{
    protected $conn;
    public function __construct($conn, $username, $password)
    {
        parent::__construct($username, $password, '');
        $this->conn = $conn;
    }

    public function loginUser()
    {
        $queri = $this->conn->prepare("SELECT * FROM tb_user WHERE username = ?");
        $queri->bind_param("s", $this->username);
        $queri->execute();
        $result = $queri->get_result();
        $userData = $result->fetch_assoc();

        if ($userData) {
            if (password_verify($this->password, $userData["password"])) {
                session_start();
                $_SESSION["username"] = $this->username;
                header("location:tiket/index.php");
            } else {
                header("location:login.php?pesan=password salah");
            }
        } else {
            header("location:login.php?pesan=username salah");
        }
    }
}
