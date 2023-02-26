<?php

include '../db/koneksi.php';
session_start();

if (isset($_POST['hapus_pengaduan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan");
    $data = mysqli_fetch_array($query);

    if (is_file('../assets/foto/' . $data['foto'])) {
        unlink('../assets/foto/' . $data['foto']);
        mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
        echo "<script>
                alert('Data berhasil di Hapus');
                window.location='index.php';
            </script>";
    }
}
