<!DOCTYPE html>
<html lang="en">
<?php
include("koneksi.php");
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/dashboard.css" />

</head>

<body>
  <section class="bg-primary background">
    <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
      <div class="container-fluid container">
        <a class="navbar-brand text-white" href="#">ONAV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div class="overlay">
      <h1>
        <img src="images/Modern Initial MB Logo.png" alt="logo Aplikasi" class="img-responsive" style="width: 200px;" />
      </h1>
      <h1>
        Selamat Datang di
        <b style="font-family: Futura Md BT">ONAV</b>
      </h1>
      <p style="font-family: Brush Script Std; font-size: 21px">
        Pesan tiket hanya dengan 1 klik
      </p>
      <a href="tiket/index.php"><button type="button" class="btn btn-primary">Cari Tiket</button></a>
    </div>

  </section>
  <!-- booking -->
  <div class="container booking text-center">
    <!-- Added text-center class -->
    <div class="icon-box text-center">
      <h3 class="center" style="text-align: center;">
        Mengapa memilih <b>ONAV</b>?
      </h3>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

      </div>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <h1>
            <i class="ion-flash"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-lightning-fill" viewBox="0 0 16 16">
                <path
                  d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641z" />
              </svg></i>
          </h1>
          <h4>Cepat</h4>
          <p>Kami menggunakan pelayan cepat seperti kilat</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <h1>
            <i class="ion-flash"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-lock-fill" viewBox="0 0 16 16">
                <path
                  d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
              </svg></i>
          </h1>
          <h4>Aman</h4>
          <p>Keamanan adalah kunci utama dari transaksi tiket</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <h1>
            <i class="ion-flash"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-cash" viewBox="0 0 16 16">
                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                <path
                  d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
              </svg></i>
          </h1>
          <h4>Murah</h4>
          <p>
            Tak perlu merogoh koceh lebih. Kami menyediakan tiket termurah
            untuk anda
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <h1>
            <i class="ion-flash"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                <path
                  d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2z" />
                <path
                  d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5z" />
              </svg></i>
          </h1>
          <h4>Tiket langsung jadi</h4>
          <p>
            Ya. Sekarang ini anda dapat mencetak tiket dimanapun anda berada.
            Jadi anda tak perlu repot-repot untuk ke bandara terlebih dahulu
          </p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <h1>
            <i class="ion-flash"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-clock-fill" viewBox="0 0 16 16">
                <path
                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
              </svg></i>
          </h1>
          <h4>Tepat Waktu</h4>
          <p>Alokasi waktu kami tepat sesuai jadwal dari bandara langsung</p>
        </div>
      </div>
    </div>
  </div>

  <!-- end booking -->

  <!--end footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-6">
          <div class="footer-widget">
            <h1>
              <b style="font-family: Futura Md BT">ONAV</b><img src="images/ONAV log putih.png" alt="logo"
                width="100px">
            </h1>
            <p>Kampus Bumi Tridharma Anduonohu, Jalan H.E.A. Mokodompit, Kodya Kendari, Sulawesi Tenggara</p>
            <p>Telp: (021) 123456</p>
            <p>Email: kelompok3@gmail.com</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="footer-widget">
            <h4>Hubungi Kami</h4>
            <div class="contact-info">
              <p>Kampus Bumi Tridharma Anduonohu, Jalan H.E.A. Mokodompit, Kodya Kendari, Sulawesi Tenggara</p>
              <p>Telp: (021) 123456</p>
              <p>Email: kelompok3@gmail.com</p>
            </div>
            <div class="social-links mt-3">

            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--end footer -->

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