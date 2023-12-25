<!doctype html>
<html lang="en">
<?php
include("session.php");
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand " href="#" style="color: aliceblue;">Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
          <li><a class="dropdown-item text-light" href="logout.php">Log Out</a></li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- navbar end -->
  <!-- content start -->
  <div class="img align-middle text-center">
    <img src="gambar/Modern Initial MB Logo.png" alt="gambar" style="width: 150px;">
  </div>
  <figure class="text-center bordered mt-1">
    <blockquote class="blockquote">
      <p>Ocean Navigation</p>
    </blockquote>
    <figcaption class="blockquote">
      Selamat Datang <cite title="Source Title">Admin</cite>
    </figcaption>
  </figure>
  <!-- content end -->
  <div class="container" style="text-align: center;">
    <table style="margin: 0 auto;">
      <tr class="mb-2" style="margin-bottom: 5px;">
        <td>
          <a href="jadwal.php" type="button" class="btn btn-primary form-control me-5" style="padding: 50px;margin-right: 20px;">Tentang Kapal
            <br>
            <span style="font-size: 8px;">Open In New Tab</span></a>
        </td>
        <td>
          <a href="reservasi.php" type="button" class="btn btn-warning form-control" style="padding: 50px;color: aliceblue;">Reservation <br>
            <span style="font-size: 8px;">Open In New Tab</span></a>
        </td>

      </tr>
      <tr>
        <td colspan="2">
          <a href="user.php" type="button" class="btn btn-secondary shadow form-control" style="padding: 30px;">User <br>
            <span style="font-size: 8px;">Open In New Tab</span></a>
        </td>
      </tr>
    </table>
  </div>
  <footer class="footer py-4 bg-primary mt-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-lg-start" style="color: aliceblue;">Copyright &copy; Your Website 2023</div>
        <div class="col-lg-4 my-3 my-lg-0">

        </div>
        <div class="col-lg-4 text-lg-end">
          <a class="link-dark text-decoration-none me-3" href="#!" style="color: aliceblue;">Privacy Policy</a>
          <a class="link-dark text-decoration-none" href="#!" style="color: aliceblue;">Terms of Use</a>
        </div>
      </div>
    </div>
  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>