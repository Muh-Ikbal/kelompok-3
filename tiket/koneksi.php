<?php
$conn = mysqli_connect("localhost","root","","db_kapal");
if (mysqli_connect_errno()) {
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
    exit();
}
?>
