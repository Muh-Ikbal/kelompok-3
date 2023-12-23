<!DOCTYPE html>
<html lang="en">
<?php
include "koneksi.php";
include "session.php";

if (!isset($_SESSION['tickets'])) {
    $_SESSION['tickets'] = array();
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ONAV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/dashboard.css" />
</head>

<body>
    <section class="background2">
        <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
            <div class="container-fluid container">
                <a class="navbar-brand text-white" href="#">ONAV</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
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
                            <li class="dropdown-item">User
                                <?php echo $data['username'] ?>
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

    <section class="container bg-light shadow mt-4">
        <div class="container">
            <div class="row">
                <div class="p-5 align-items-center justify-content-center">
                    <div class="card-panel default text-center">
                        <h1>
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="52" fill="currentColor"
                                class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z" />
                            </svg> Keranjang Anda
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php foreach (array_chunk($_SESSION['tickets'], 2) as $keranjang) { ?>
        <section class="container grid mt-4">
            <div class="g-col-6 row">
                <?php foreach ($keranjang as $ticket) { ?>
                    <div class="col-md-6 ">
                        <div class="card-panel rounded-2 bg-success shadow p-4">
                            <b class="white-text">Code Booking</b>
                            <p>
                                <?= $ticket; ?>
                            </p>
                            <p>
                                <a href="reservasi.php" target="_blank"><button class="btn btn-primary waves-effect blue"><i
                                            class="ion-android-print" value="cek">cek</i></button></a>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>

    <?php } ?>

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