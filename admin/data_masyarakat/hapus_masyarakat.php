<a href="" class="btn btn-danger btn-sm" data-mdb-toggle="modal" data-mdb-target="#modalHapusMasyarakat<?php echo $data['nik'] ?>">Hapus</a>
<!-- Modal Tanggapan -->
<div class="modal fade" id="modalHapusMasyarakat<?php echo $data['nik'] ?>" tabindex="-1" aria-labelledby="modalHapusMasyarakatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalHapusMasyarakatLabel">Hapus data <?php echo $data['nama'] ?></h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <input type="hidden" name="nik" value="<?php echo $data['nik'] ?>">
                <div class="container text-center">
                    <p>Apakah anda yakin menghapus akun dengan nama</p>
                    <h4><?php echo $data['nama'] ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="hapus_masyarakat" class="btn btn-danger">Ya Hapus</button>
                </div>
            </form>
            <!-- proses verifikasi -->
            <?php
            if (isset($_POST['hapus_masyarakat'])) {
                $nik = $_POST['nik'];
                $query = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik='$nik'");

                echo "<script>
                            alert('Data berhasil di Hapus');
                            window.location='index.php?page=masyarakat';
                        </script>";
            }
            ?>
        </div>
    </div>
</div>
