<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- navbar start -->
    <?php
    include("navbar.php");
    include("koneksi.php");
    ?>
    <!-- navbar start -->
    <figure class="text-center mt-4">
        <blockquote class="blockquote">
            <p>Admin User</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Daftar <cite title="Source Title">User</cite>
        </figcaption>
    </figure>
    <!-- navbar end -->
    <!-- table user -->
    <div class="container">
        <table class="table table-bordered table-hover table-striped align-middle text-center">
            <thead class="table-success">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = mysqli_query($conn,"SELECT * FROM tb_user");
                $no = 1;
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <th scope="row"><?=$no++?></th>
                    <td><?=$row['username']?></td>
                    <td><?=$row['fullname']?></td>
                    <td><?=$row['password']?></td>
                    <td>
                        <a href="user_p.php?hapus=<?=$row['id_user']?>" type="button" class="btn btn-primary">Hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <!-- footer start -->
    <?php
    include("footer.php");
    ?>
    <!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>