<?php
include '../db/koneksi.php';
$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat");
$total_data_masyarakat = mysqli_num_rows($masyarakat);

$aduan_selesai = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='selesai'");
$total_pengaduan_selesai = mysqli_num_rows($aduan_selesai);

$aduan_proses = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses'");
$total_pengaduan_proses = mysqli_num_rows($aduan_proses);

$aduan_menunggu = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='0'");
$total_pengaduan_menunggu = mysqli_num_rows($aduan_menunggu);

$aduan = mysqli_query($koneksi, "SELECT * FROM pengaduan");
$total_aduan = mysqli_num_rows($aduan);

$tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan");
$total_tanggapan = mysqli_num_rows($tanggapan);

$petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
$total_petugas = mysqli_num_rows($petugas);
?>

<div class="container">
    <h3 class="mt-3">DASHBOARD</h3>
    <div class="row mb-3">
        <div class="col-md-3 mt-3">
            <div class="card ">
                <div class="card-header bg-primary text-white">Total Data Masyarakat</div>
                <div class="card-body"><?php echo $total_data_masyarakat ?> Orang</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card ">
                <div class="card-header bg-success text-white">Status Aduan</div>
                <div class="card-body">
                    <p>Status Menunggu = <?php echo $total_pengaduan_menunggu ?></p>
                    <p>Status Proses = <?php echo $total_pengaduan_proses ?></p>
                    <p>Status Selesai = <?php echo $total_pengaduan_selesai ?></p>
                </div>
                <div class="card-footer">Total Aduan <?php echo $total_aduan ?></div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card ">
                <div class="card-header bg-danger text-white">Total Tanggapan</div>
                <div class="card-body"><?php echo $total_tanggapan ?> Tanggapan</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card ">
                <div class="card-header bg-warning text-white">Total Data Petugas</div>
                <div class="card-body"><?php echo $total_petugas ?> Orang</div>
            </div>
        </div>
    </div>
</div>
