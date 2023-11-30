<!doctype html>
<html lang="en">
<?php

include "koneksi.php";

$nama_kapal = "";
$muatan = "";
$tujuan = "";
$harga = "";
$gambar = "";

if (isset($_GET["edit"])) {
    $id_kapal = $_GET["edit"];
    $query = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE id_kapal='$id_kapal'");
    $data = mysqli_fetch_array($query);
    $nama_kapal = $data["nama_kapal"];
    $muatan = $data["muatan"];
    $tujuan = $data["tujuan"];
    $harga = $data["harga"];
    $gambar = $data["kapal"];
}
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
    <?php
    include("navbar.php");
    ?>
    <!-- content start -->
    <div class="img align-middle text-center">
        <img src="gambar/Modern Initial MB Logo.png" alt="gambar" style="height: 150px;">
    </div>
    <figure class="text-center bordered ">
        <blockquote class="blockquote">
            <p>Ocean Navigation</p>
        </blockquote>
        <figcaption class="blockquote">
            Selamat Datang <cite title="Source Title">Admin</cite>
        </figcaption>
    </figure>
    <!-- content end -->
    <!-- form start -->
    <div class="container">
        <form action="proses.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_kapal" id="id_kapal" value="<?php echo $id_kapal ?>">
            <div class="mb-3 row">
                <label for="nama_kapal" class="col-sm-2 col-form-label">Nama Kapal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" value="<?php echo $nama_kapal ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="muatan" class="col-sm-2 col-form-label">Muatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="muatan" name="muatan" value="<?php echo $muatan ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                <div class="col-sm-10">
                    <select name="tujuan" id="tujuan" class="form-control">
                        <option value="buton" <?php if ($tujuan == "buton") echo "selected" ?>>buton</option>
                        <option value="raha" <?php if ($tujuan == "raha") echo "selected" ?>>raha</option>
                        <option value="wakatobi" <?php if ($tujuan == "wakatobi") echo "selected" ?>>wakatobi</option>
                        <option value="konawe kepulauan" <?php if ($tujuan == "konawe kepulauan") echo "selected" ?>>konawe kepulauan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $gambar ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <?php
                if (isset($_GET['edit'])) {
                    echo "<button type='submit' class='btn btn-primary' name='btnProses' value='edit'>Simpan Data</button>";
                } else {
                    echo "<button type='submit' class='btn btn-primary' name='btnProses' value='tambah'>Tambah Data</button>";
                }
                ?>
            </div>
        </form>
        <?php
        include("footer.php");
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>