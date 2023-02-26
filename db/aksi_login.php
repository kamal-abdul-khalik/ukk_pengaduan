<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if ($level == 'masyarakat') {
    $login = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username='$username' AND password='$password'");
} else {
    $login = mysqli_query($koneksi, "SELECT * FROM petugas  WHERE username='$username' AND password='$password'");
}

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['level'] == 'admin') {
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['login'] = "admin";
        echo "<script>
                alert('Berhasil Login');
                window.location='../admin/';
            </script>";
    } elseif ($data['level'] == 'petugas') {
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['login'] = "petugas";
        echo "<script>
                alert('Berhasil Login');
                window.location='../admin/';
            </script>";
    } elseif ($data['level'] == 'masyarakat') {
        $_SESSION['nik'] = $data['nik'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['login'] = "masyarakat";
        echo "<script>
                alert('Berhasil Login');
                window.location='../masyarakat/';
            </script>";
    }
} else {
    echo "<script>
    alert('Username dan Password tidak dikenali');
    window.location='../index.php?page=login';
    </script>";
}
