<?php
session_start();
if (empty($_SESSION['login'] == 'admin' || $_SESSION['login'] == 'petugas')) {
    echo "<script>
                alert('Silahkan login dulu');
                window.location='../index.php?page=login';
            </script>";
}
include '../template/header.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'pengaduan':
            include 'data_pengaduan.php';
            break;
        case 'tanggapan':
            include 'data_tanggapan.php';
            break;
        case 'petugas':
            include 'data_petugas/data_petugas.php';
            break;
        case 'masyarakat':
            include 'data_masyarakat/data_masyarakat.php';
            break;
        default:
            echo 'Maaf halaman tidak ditemukan';
            break;
    }
} else {
    include 'home.php';
}

include '../template/footer.php';
