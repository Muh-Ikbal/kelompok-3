<?php
include("koneksi.php");
if (isset($_POST['signin'])) {
    $yourname = $_POST['your_name'];
    $yourpass = $_POST['your_pass'];
    $sql = mysqli_query($conn, "SELECT * FROM `admin` WHERE username='$yourname'");
    $data = mysqli_fetch_array($sql);
    $ai = mysqli_num_rows($sql);
    if ($ai >= 0) {
        if ($yourpass == $data["password"]) {
            session_start();
            $_SESSION["admin"] = $yourname;
            header("location:index.php");
        } else {
            header("location:login.php?pesan=password salah");
        }
    } else {
        header("location:login.php?pesan=username salah");
    }
}
