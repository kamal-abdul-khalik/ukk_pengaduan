<?php
session_start();
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
            include 'data_petugas.php';
            break;
        case 'masyarakat':
            include 'data_masyarakat.php';
            break;
        default:
            echo 'Maaf halaman tidak ditemukan';
            break;
    }
} else {
    include 'home.php';
}

include '../template/footer.php';
