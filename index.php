<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/mdb.min.css" rel="stylesheet">
    <title>Aplikasi Pengaduan Masyarakat - Nama Siswa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Aplikasi Pengaduan Masyarakat</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php?page=register">Daftar</a>
                    <a class="nav-link" href="index.php?page=login">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'login':
                include 'login.php';
                break;
            case 'register':
                include 'register.php';
                break;
            default:
                echo 'Maaf halaman tidak ditemukan';
                break;
        }
    } else {
        include 'home.php';
    }
    ?>


    <footer class="bg-light text-center text-lg-start fixed-bottom">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <h5>UKK - RPL | Nama Siswa</h5>
            <p>© 2023 Uji Kompetensi Keahlian:</p>
            <h6>SMKS SATRIA KENDARI</h6>
        </div>
    </footer>
    <script src="assets/mdb.min.js"></script>
</body>

</html>
