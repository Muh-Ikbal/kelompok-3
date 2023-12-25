<?php
include("koneksi.php");
include("oop-login.php");
if (isset($_POST['signin'])) {
    $yourname = $_POST['your_name'];
    $yourpass = $_POST['your_pass'];

    $login = new Login($conn, $yourname, $yourpass);
    $login->loginUser();
}
