<a href="" class="btn btn-danger btn-sm" data-mdb-toggle="modal" data-mdb-target="#modalHapusTanggapan<?php echo $data['id_pengaduan'] ?>">Hapus</a>
<!-- Modal Tanggapan -->
<div class="modal fade" id="modalHapusTanggapan<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="modalHapusTanggapanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalHapusTanggapanLabel">Hapus data <?php echo $data['judul_laporan'] ?></h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan'] ?>">
                <div class="container text-center">
                    <p>Apakah anda yakin menghapus data dengan judul</p>
                    <h4><?php echo $data['judul_laporan'] ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="hapus_pengaduan" class="btn btn-danger">Ya Hapus</button>
                </div>
            </form>
            <!-- proses verifikasi -->
            <?php
            if (isset($_POST['hapus_pengaduan'])) {
                $id_pengaduan = $_POST['id_pengaduan'];
                $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
                $data = mysqli_fetch_array($query);

                if (is_file('../assets/foto/' . $data['foto'])) {
                    unlink('../assets/foto/' . $data['foto']);
                    mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
                    echo "<script>
                            alert('Data berhasil di Hapus');
                            window.location='index.php?page=pengaduan';
                        </script>";
                }
            }
            ?>
        </div>
    </div>
</div>
