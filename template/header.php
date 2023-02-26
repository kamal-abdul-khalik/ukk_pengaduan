<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/mdb.min.css" rel="stylesheet">
    <title>Aplikasi Pengaduan Masyarakat - Nama Siswa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand text-white" href="index.php">Aplikasi Pengaduan Masyarakat</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php
                    if ($_SESSION['login'] == 'admin') { ?>
                        <a class="nav-link text-white" href="index.php?page=pengaduan">Pengaduan</a>
                        <a class="nav-link text-white" href="index.php?page=tanggapan">Tanggapan</a>
                        <a class="nav-link text-white" href="index.php?page=masyarakat">Data Masyarakat</a>
                        <a class="nav-link text-white" href="index.php?page=petugas">Data Petugas</a>
                        <a class="nav-link text-white" href="../db/aksi_logout.php">Keluar</a>
                    <?php } elseif ($_SESSION['login'] == 'petugas') { ?>
                        <a class="nav-link text-white" href="index.php?page=pengaduan">Pengaduan</a>
                        <a class="nav-link text-white" href="../db/aksi_logout.php">Keluar</a>
                    <?php } elseif ($_SESSION['login'] == 'masyarakat') { ?>
                        <a class="nav-link text-white" href="../db/aksi_logout.php">Keluar</a>
                    <?php } else { ?>
                        <a class="nav-link text-white" href="index.php?page=register">Daftar</a>
                        <a class="nav-link text-white" href="index.php?page=login">Login</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
