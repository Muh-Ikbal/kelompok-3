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
    </figure>
    <!-- content end -->
    <!-- table start -->
    <div class="container mt-5">
        <a href="olah.php"><button type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill me-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                </svg>Tambah Data</button></a>
        <table class="table table-bordered table-hover align-middle mt-2">
            <thead class="table-primary">
                <tr>
                    <th Tscope="col">No</th>
                    <th scope="col">Nama Kapal</th>
                    <th scope="col">Muatan</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM tb_jadwal";
                $sql = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no ?></th>
                        <td><?php echo $data['nama_kapal']; ?></td>
                        <td><?php echo $data['muatan']; ?></td>
                        <td><?php echo $data['tujuan']; ?></td>
                        <td><?php echo $data['harga']; ?></td>
                        <td><img src="gambar/<?php echo $data['kapal']; ?>" alt="gambar" style="width: 100px;"></td>
                        <td><a href="olah.php?edit=<?php echo $data['id_kapal'] ?>" class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill me-3" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg></a><a href="proses.php?hapus=<?php echo $data['id_kapal'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                </svg></a></td>
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