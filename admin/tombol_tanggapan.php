<a href="" class="btn btn-info btn-sm" data-mdb-toggle="modal" data-mdb-target="#modalTanggapan<?php echo $data['id_pengaduan'] ?>">Tanggapi</a>
<!-- Modal Tanggapan -->
<div class="modal fade" id="modalTanggapan<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="modalTanggapanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalTanggapanLabel">Tanggapi data <?php echo $data['judul_laporan'] ?></h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan'] ?>">
                <div class="container">
                    <div class="row mb-3 mt-3">
                        <label class="col-md-4">Tanggal</label>
                        <div class="col-md-8">
                            <input type="date" name="tanggal_pengaduan" class="form-control" value="<?php echo $data['tanggal_pengaduan'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label class="col-md-4">Judul Laporan</label>
                        <div class="col-md-8">
                            <input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['judul_laporan'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label class="col-md-4">Isi Pengaduan</label>
                        <div class="col-md-8">
                            <textarea name="isi_laporan" class="form-control" readonly><?php echo $data['isi_laporan'] ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label class="col-md-4">Foto</label>
                        <div class="col-md-8">
                            <img width="150px" src="../assets/foto/<?php echo $data['foto'] ?>" readonly>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3 mt-3">
                        <label class="col-md-4">Tanggapan</label>
                        <div class="col-md-8">
                            <textarea name="tanggapan" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="kirim_tanggapan" class="btn btn-info">Tanggapi</button>
                </div>
            </form>
            <!-- proses verifikasi -->
            <?php
            $tanggal_tanggapan = date('Y-m-d');
            if (isset($_POST['kirim_tanggapan'])) {
                $id_pengaduan = $_POST['id_pengaduan'];
                $id_petugas = $_SESSION['id_petugas'];
                $tanggapan = $_POST['tanggapan'];

                $query = mysqli_query($koneksi, "INSERT INTO tanggapan (id_pengaduan, tanggal_tanggapan, tanggapan, id_petugas)
                    VALUES ('$id_pengaduan', '$tanggal_tanggapan', '$tanggapan', '$id_petugas')");

                //update status tanggapan
                if ($tanggapan != null) {
                    $update = mysqli_query($koneksi, "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan' ");
                }
                echo "<script>
                    alert('Data berhasil di Tanggapi');
                    window.location='index.php?page=pengaduan';
                </script>";
            }
            ?>
        </div>
    </div>
</div>
