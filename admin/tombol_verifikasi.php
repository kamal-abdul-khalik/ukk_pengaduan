<a href="" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#modalVerif<?php echo $data['id_pengaduan'] ?>">Verifikasi</a>
<!-- Modal Verifikasi -->
<div class="modal fade" id="modalVerif<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="modalVerifLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalVerifLabel">Verifikasi data <?php echo $data['judul_laporan'] ?></h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan'] ?>">
                <div class="container">
                    <div class="row mb-3 mt-3">
                        <label class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <select class="form-control" name="status">
                                <option value="proses">Proses</option>
                                <option value="0">Tolak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="kirim" class="btn btn-success">Verifikasi</button>
                </div>
            </form>
            <!-- proses verifikasi -->
            <?php
            if (isset($_POST['kirim'])) {
                $id_pengaduan = $_POST['id_pengaduan'];
                $status = $_POST['status'];
                $query = mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan' ");
                echo "<script>
                        alert('Data berhasil di Verifikasi');
                        window.location='index.php?page=pengaduan';
                    </script>";
            }
            ?>
        </div>
    </div>
</div>
