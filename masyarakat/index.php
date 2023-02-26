<?php
session_start();
include '../template/header.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'tanggapan':
            include 'tanggapan.php';
            break;
        default:
            echo 'Maaf halaman tidak ditemukan';
            break;
    }
} else {
    include 'home.php';
}

include '../template/footer.php';
