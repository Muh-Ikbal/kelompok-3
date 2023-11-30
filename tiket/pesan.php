<!DOCTYPE html>
<html lang="en">
<?php
include "koneksi.php";
include "session.php";
include "proses.php";

if (!isset($_SESSION['tickets'])) {
  $_SESSION['tickets'] = array(); // Inisialisasi array jika belum ada
}

if (isset($_POST['tiket'])) {
  $newTicket = $_POST['tiket'];
  array_push($_SESSION['tickets'], $newTicket);
}
$ticketManager = new TicketManager($conn); // Create an instance of the TicketManager class
$id_user = $ticketManager->getUserId($_SESSION['username']); // Get user ID

if (isset($_POST['hitung']) && $_POST['hitung'] == 'hitung') {
  $tiket = $_POST['tiket'];
  $nama = $_POST['nama'];
  $berangkat = $_POST['berangkat'];
  $tujuan = $_POST['tujuan'];
  $harga = $_POST['harga'];
  $Ttiket = $_POST['Ttiket'];

  $ticketManager->bookTicket($tiket, $nama, $berangkat, $tujuan, $harga, $Ttiket, $id_user);
}

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">

  <title>ONAV</title>
</head>

<body>
  <section class="background2">
    <nav class="navbar navbar-expand-lg fixed-top bg-dark">
      <div class="container-fluid container">
        <a class="navbar-brand text-white" href="#">ONAVV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path fill-rule="evenodd"
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
              </svg>
            </a>
            <?php
            include "koneksi.php";
            $sql = "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($query);
            ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Log Out</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li class="dropdown-item">User
                <?php echo $data["username"] ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="overlay2">
      <h1>PESAN TIKET</h1>
    </div>
  </section>
  <main id="main">
    <section class="container mesan">
      <?php
      $con = mysqli_connect("localhost", "root", "", "db_kapal");
      if (isset($_GET['id_kapal'])) {
        $id = ($_GET['id_kapal']);
        $sql = "SELECT * FROM `tb_jadwal` WHERE id_kapal = '$id'";
        $query = mysqli_query($con, $sql);
        $data = mysqli_fetch_array($query);
        $tujuan = $data['tujuan'];
        $harga = $data['harga'];
      }
      ?>
      <h6 style="text-align: center;">FOR CUSTOMER</h6>
      <form method="post" action="" class="bg-light shadow">
        <input type="hidden" name="id_kapal" value="<?php echo $_GET['id_kapal']; ?>">
        <div class="mb-3 mt-3">
          <?php
          $rang = range(1, 9);
          shuffle($rang);
          $c = implode($rang);
          $res_code = $c;
          ?>
          <label for="tiket" class="form-label">Kode Tiket</label>
          <input type="text" class="form-control" id="tiket" name="tiket" value="<?= $res_code; ?>">
        </div>
        <div class="mb-3 mt-3">
          <?php
          include "koneksi.php";
          $sql = "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'";
          $query = mysqli_query($conn, $sql);
          $data = mysqli_fetch_array($query);
          ?>
          <label for="nama" class="form-label">Nama Pembeli</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['fullname']; ?>">
        </div>
        <div class="mb-3 mt-3">
          <label for="berangkat" class="form-label">Tanggal Keberangkatan</label>
          <input type="date" class="form-control" id="berangkat" name="berangkat">
        </div>
        <div class="mb-3 mt-3">
          <label for="tujuan" class="form-label">Tujuan</label>
          <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>">
        </div>
        <div class="mb-3 mt-3">
          <label for="harga" class="form-label">Harga Tiket (Rp.)</label>
          <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
        </div>
        <div class="mb-3 mt-3">
          <label for="Ttiket" class="form-label">Total tiket</label>
          <input type="number" class="form-control" id="Ttiket" name="Ttiket" oninput="calculateTotal()">
        </div>
        <div class="mb-3 mt-3">
        </div>
        <div class="mb-3 mt-3">
          <label for="tHarga" class="form-label">Total harga</label>
          <input type="number" class="form-control" id="tHarga" name="tHarga" readonly>
        </div>
        <div class="mb-3 mt-3">
          <a href="tiket.php">
            <button type="submit" class="btn btn-primary form-control"
              style="background-color: #027776; padding: 10px; text-align: center;" name="hitung"
              value="hitung">Pesan</button></a>
        </div>
      </form>
    </section>
  </main>

  <script>
    function calculateTotal() {
      var harga = parseFloat(document.getElementById('harga').value);
      var Ttiket = parseFloat(document.getElementById('Ttiket').value);
      var totalHarga = harga * Ttiket;
      document.getElementById('tHarga').value = isNaN(totalHarga) ? '' : totalHarga;
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.addEventListener("scroll", function () {
        var navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
          navbar.classList.add("scrolled");
        } else {
          navbar.classList.remove("scrolled");
        }
      });
    });
  </script>
</body>

</html>