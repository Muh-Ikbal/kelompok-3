<!DOCTYPE html>
<?php
include "koneksi.php";
include "session.php";
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ONAV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/dashboard.css" />
</head>

<body>
  <section class="background2">
    <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
      <div class="container-fluid container">
        <a class="navbar-brand text-white" href="#">Onav</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
              </svg>
            </a>
            <?php
            $sql = "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($query);
            ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li class="dropdown-item">
                <?php echo $data['username']; ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="overlay2">
      <h1>Jadwal Pemberangkatan</h1>
    </div>
  </section>

  <!-- booking -->
  <form method="post" action="">
    <div class="container-fluid mt-5 pb-5">
      <div class="container pb-5">
        <div class="bg-light shadow" style="padding: 30px">
          <div class="row align-items-center" style="min-height: 40px">
            <div class="col-md-4">
              <div class="mb-3 mb-md-0">
                <select class="custom-select px-4" style="height: 55px" name="tujuan">
                  <option selected disabled>Tujuan</option>
                  <option value="wakatobi">Wakatobi</option>
                  <option value="kepulauan">Konawe Kepulauan</option>
                  <option value="buton">Button</option>
                  <option value="raha">Raha</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3 mb-md-0">
                <select class="custom-select px-4" style="height: 55px" name="kapal">
                  <option selected disabled>Jenis Kapal</option>
                  <option value="kapal3.jpg">Kapal Kecil</option>
                  <option value="kapal2.jpg">Kapal Sedang</option>
                  <option value="kapal.jpg">Kapal Besar</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px; border-radius: 10px" value="cari" name="cari">
                Cari
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- end booking -->

  <?php
  include("koneksi.php");

  class Jadwal
  {
    protected $conn;
    protected $tujuan;
    protected $kapal;

    public function __construct($conn, $tujuan, $kapal)
    {
      $this->conn = $conn;
      $this->tujuan = $tujuan;
      $this->kapal = $kapal;
    }

    public function cariJadwal()
    {
      $sql = "SELECT * FROM tb_jadwal";

      if ($this->tujuan !== null && $this->kapal !== null) {
        $sql .= " WHERE tujuan='$this->tujuan' AND kapal='$this->kapal'";
      } elseif ($this->tujuan !== null) {
        $sql .= " WHERE tujuan='$this->tujuan'";
      } elseif ($this->kapal !== null) {
        $sql .= " WHERE kapal='$this->kapal'";
      }

      return mysqli_query($this->conn, $sql);
    }
  }

  if (isset($_POST['cari']) && $_POST['cari'] == 'cari') {
    $Tujuan = isset($_POST["tujuan"]) ? $_POST["tujuan"] : null;
    $Kapal = isset($_POST["kapal"]) ? $_POST["kapal"] : null;

    $jadwal = new Jadwal($conn, $Tujuan, $Kapal);
    $query = $jadwal->cariJadwal();
    if (mysqli_num_rows($query) > 0) {
      echo '<section class="tiket">
            <div class="container-fluid mt-1 mb-3 p-4 bg-light">
                <div class="container">
                    <div class="container mb-4">
                        <div class="bg-light shadow p-5">
                            <h4>Selected Ticket Information</h4>';

      while ($data = mysqli_fetch_array($query)) {
        echo '<div class="row">
                    <div class="col-md-5">
                        <img src="../admin/gambar/' . $data[1] . '" alt="Ship Image" class="img-fluid" style="width: 220px;height: 220px;margin-top:30px;margin:30px;" />
                    </div>
                    <div class="col-md-5 " style="margin-top:30px;margin:30px;">
                        <p class="mb-3">Boat Name: ' . $data[5] . '</p>
                        <p class="mb-2">Price: ' . $data[4] . '</p>
                        <p class="mb-2">Destination: ' . $data[3] . '</p>
                        <p class="mb-2">Cargo Capacity: ' . $data[2] . '</p>
                    </div>
                    <div class="col-md-5 ">
                        <a href="pesan.php?id_kapal=' . $data[0] . '"><button type="submit" class="btn btn-outline-primary">Pesan</button></a>
                    </div>
                </div>';
      }

      echo '</div>
                </div>
            </div>
        </section>';
    } else {
      echo '<p>No matching records found</p>';
    }
  }

  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      window.addEventListener("scroll", function() {
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