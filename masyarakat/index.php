<?php
session_start();
if (empty($_SESSION['login'] == 'masyarakat')) {
    echo "<script>
                alert('Silahkan login dulu');
                window.location='../index.php?page=login';
            </script>";
}
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
