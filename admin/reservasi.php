<!doctype html>
<html lang="en">
<?php
include "koneksi.php"
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
        <figcaption class="blockquote">
            Data Tiket
        </figcaption>
    </figure>
    <!-- content end -->
    <!-- table start -->
    <div class="container mt-5">
        <table class="table table-bordered table-hover align-middle mt-2">
            <thead class="table-primary">
                <tr>
                    <th Tscope="col">No</th>
                    <th scope="col">Kode Tiket</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Keberangkatan</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Harga Total</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM tb_tiket";
                $sql = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no ?></th>
                        <td><?php echo $data['kode_tiket']; ?></td>
                        <td><?php echo $data['full_name']; ?></td>
                        <td><?php echo $data['tgl_berangkat']; ?></td>
                        <td><?php echo $data['tujuan']; ?></td>
                        <td><?php echo $data['harga_total']; ?></td>
                    </tr>
            </tbody>
        <?php
                    $no++;
                }
        ?>
        </table>
    </div>
    <!-- table end -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>