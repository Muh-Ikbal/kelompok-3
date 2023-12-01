<?php
include "koneksi.php";

class Ship
{
    public $conn;
    public $nama_kapal;
    public $muatan;
    public $tujuan;
    public $harga;
    public $gambar;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function setAttributes($nama_kapal, $muatan, $tujuan, $harga, $gambar)
    {
        $this->nama_kapal = $nama_kapal;
        $this->muatan = $muatan;
        $this->tujuan = $tujuan;
        $this->harga = $harga;
        $this->gambar = $gambar;
    }
}

class JadwalManager extends Ship
{
    public function tambahJadwal()
    {
        $gambar_tmp = $this->gambar["tmp_name"];
        move_uploaded_file($gambar_tmp, "gambar/" . $this->gambar["name"]);

        $gambar = $this->gambar['name'];
        $query = "INSERT INTO tb_jadwal (`id_kapal`, `nama_kapal`, `muatan`, `tujuan`, `harga`, `kapal`) VALUES (NULL, '$this->nama_kapal', '$this->muatan', '$this->tujuan', '$this->harga', '$gambar')";
        $sql = mysqli_query($this->conn, $query);

        return $sql;
    }

    public function updateJadwal($id_kapal)
    {
        if ($this->gambar['name'] != "") {
            $query = "SELECT * FROM tb_jadwal WHERE `id_kapal` = '$id_kapal'";
            $result = mysqli_query($this->conn, $query);
            $data = mysqli_fetch_array($result);
            unlink("gambar/" . $data["kapal"]);

            $gambar_tmp = $this->gambar["tmp_name"];
            move_uploaded_file($gambar_tmp, "gambar/" . $this->gambar["name"]);

            $gambar = $this->gambar['name'];
            $query = "UPDATE `tb_jadwal` SET nama_kapal = '$this->nama_kapal', muatan = '$this->muatan', 
                tujuan = '$this->tujuan', `harga` = '$this->harga', kapal = '$gambar' WHERE `id_kapal` = '$id_kapal'";
        } else {
            $query = "UPDATE `tb_jadwal` SET nama_kapal = '$this->nama_kapal', muatan = '$this->muatan', 
                tujuan = '$this->tujuan', `harga` = '$this->harga' WHERE `id_kapal` = '$id_kapal'";
        }

        $sql = mysqli_query($this->conn, $query);
        return $sql;
    }

    public function hapusJadwal($id_kapal)
    {
        $query_hapus = "SELECT kapal FROM tb_jadwal WHERE `id_kapal` = '$id_kapal'";
        $sql_hapus = mysqli_query($this->conn, $query_hapus);
        $data = mysqli_fetch_array($sql_hapus);
        unlink("gambar/" . $data["kapal"]);

        $query = "DELETE FROM tb_jadwal WHERE id_kapal = '$id_kapal'";
        $sql = mysqli_query($this->conn, $query);

        return $sql;
    }
}

$jadwalManager = new JadwalManager($conn);

if (isset($_POST['btnProses'])) {
    $nama_kapal = $_POST["nama_kapal"];
    $muatan = $_POST["muatan"];
    $tujuan = $_POST["tujuan"];
    $harga = $_POST["harga"];
    $jadwalManager->setAttributes($nama_kapal, $muatan, $tujuan, $harga, $_FILES["gambar"]);

    if ($_POST['btnProses'] == 'tambah') {
        $result = $jadwalManager->tambahJadwal();
    } else {
        $result = $jadwalManager->updateJadwal($_POST['id_kapal']);
    }

    if ($result) {
        header("location:jadwal.php");
    }
} elseif (isset($_GET["hapus"])) {
    $result = $jadwalManager->hapusJadwal($_GET["hapus"]);

    if ($result) {
        header("location:jadwal.php");
    }
}