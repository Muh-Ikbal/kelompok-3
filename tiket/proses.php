<?php
include "koneksi.php";

class TicketManager
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getUserId($username)
    {
        $sql = "SELECT * FROM tb_user WHERE username = '$username'";
        $query = mysqli_query($this->conn, $sql);
        $userData = mysqli_fetch_array($query);
        return $userData['id_user'];
    }

    public function bookTicket($tiket, $nama, $berangkat, $tujuan, $harga, $Ttiket, $id_user)
    {
        $tHarga = $harga * $Ttiket;
        $query = "INSERT INTO `tb_tiket` (`id_tiket`, `full_name`, `tgl_berangkat`, `tujuan`, `total_tiket`, `harga_total`, `fk_id_user`, `kode_tiket`) 
                  VALUES (NULL, '$nama', '$berangkat', '$tujuan', '$Ttiket', '$tHarga', '$id_user', '$tiket')";
        $sql = mysqli_query($this->conn, $query);

        if ($sql) {
            echo "<script>alert('Data berhasil ditambahkan'); window.location='tiket.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
        }
    }
}


?>