<?php
include '../db/koneksi.php';
if (!empty($_GET['id_pengaduan'])) {
    $id_pengaduan = $_GET['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT a.*,b.* FROM pengaduan a INNER JOIN tanggapan b ON a.id_pengaduan=b.id_pengaduan WHERE b.id_pengaduan=$id_pengaduan");
    $data = mysqli_fetch_array($query);

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">

                <div class="card mb-3">
                    <div class="card-header">Lihat Tanggapan</div>
                    <div class="card-body">
                        <form action="" method="post">

                            <div class="mb-3">
                                <label class="form-label" for="judul_laporan">Judul</label>
                                <input type="text" class="form-control" value="<?php echo $data['judul_laporan'] ?>" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="isi_laporan">Isi Laporan</label>
                                <textarea class="form-control" readonly><?php echo $data['isi_laporan'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <img style="width: 300px;" src="../assets/foto/<?php echo $data['foto'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggapan">Tanggapan dari petugas</label>
                                <textarea class="form-control" name="tanggapan" readonly><?php echo $data['tanggapan'] ?></textarea>
                            </div>

                    </div>
                    <div class="card-footer">
                        <a href="index.php" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo 'Halaman tidak ditemukan';
} ?>
