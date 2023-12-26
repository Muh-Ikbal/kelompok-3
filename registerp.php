<?php
include("koneksi.php");
include("oop-login.php");
if (isset($_POST['signup']) && $_POST['signup'] == 'Register') {
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $userManager = new UserManager($conn,$uname, $password, $fname);
    $result = $userManager->createUser();
   

    if ($result) {
        echo "<script>window.alert('Selamat, Akun anda berhasil dibuat'); window.location.href='login.php';</script>";
    } else {
        echo "<script>window.alert('Oops!!, Terjadi kesalahan!!!'); window.location.href='register.php';</script>";
    }
}
