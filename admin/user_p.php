<?php
include("koneksi.php");

if (isset($_GET["hapus"])) {
    $sql = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = $_GET[hapus]");
    if ($sql) {
        header("location:user.php");
    } else {
        echo "Error deleting user.";
    }
}