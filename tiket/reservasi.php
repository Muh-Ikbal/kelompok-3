<!doctype html>
<html lang="en">
<?php
include "koneksi.php";
include "session.php";
$sql = mysqli_query($conn, "SELECT * FROM tb_tiket");
$data = mysqli_fetch_array($sql);
if ($data['id_tiket'] == "") {
  $data['tujuan'] = "";
  $data['total_tiket'] = "";
  $data['tgl_berangkat'] = "";
  $data['harga_total'] = "";
  $data['kode_tiket'] = "";
  $data['fullname'] = "";
}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/reservasi.css">

  <title>Onav | Reservasi</title>
</head>

<body>
  <div>

    <!-- BayPlane -->

    <div class="row" style="margin-left: 20px;">
      <div class="col">
        <div class="mt-5 border">
          <div class="bg-primary">
            <h5 scope="row" class="text-light p-2">Onav</h5>
          </div>
          <div class="row">
            <div class="col m-3">
              <label for="from" class="form-label">From</label>
              <input type="text" id="from" disabled value="Kendari">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col m-3">
              <label for="tujuan" class="form-label">Tujuan</label>
              <input type="tujuan" id="from" disabled value="<?= $data['tujuan'] ?>">
            </div>

            <div class="col m-3">
              <label for="Ttiket" class="form-label">Total Tiket</label>
              <input type="text" id="Ttiket" disabled value="<?= $data['total_tiket'] ?>">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col m-3">
              <label for="tgl" class="form-label">Tanggal Berangkat</label>
              <input type="text" id="tgl" disabled value="<?= $data['tgl_berangkat'] ?>">
            </div>

            <div class="col m-3">
              <label for="harga" class="form-label">Harga Total</label>
              <input type="text" id="harga" disabled value="<?= $data['harga_total'] ?>">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col m-3">
              <img src="../images/Modern Initial MB Logo.png" alt="[stiker cikong]" style="width: 250px;">
            </div>

            <div class="col m-3">
              <label for="code" class="form-label">Kode Tiket</label>
              <input type="text" id="code" disabled value="<?= $data['kode_tiket'] ?>">
            </div>
          </div>

        </div>
      </div>

      <!--Costumer-->

      <div class="col" style="margin-right: 20px;">
        <div class="col">
          <div class="mt-5 border">
            <div class="bg-primary">
              <h5 scope="row" class="text-light p-2">Costumer</h5>
            </div>
            <div class="row">
              <div class="col m-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama" disabled value="<?= $data['full_name'] ?>">
              </div>
            </div>

            <div class="row">
              <div class="col m-3">
                
                <label for="Ttiket" class="form-label">Total Tiket</label>
                <input type="text" id="Ttiket" disabled value="<?= $data['total_tiket'] ?>">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col m-3">
                <label for="tgl" class="form-label">Tanggal Berangkat</label>
                <input type="text" id="tgl" disabled value="<?= $data['tgl_berangkat'] ?>">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col m-3">
                <label for="code" class="form-label">Kode Tiket</label>
                <input type="text" id="code" disabled value="<?= $data['kode_tiket'] ?>">
              </div>

              <div class="col m-3">
                <img src="../images/Modern Initial MB Logo.png" alt="[stiker cikong]" style="width: 250px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>