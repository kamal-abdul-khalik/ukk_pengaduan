<div class="container">
    <div class="row ">
        <div class="col-md-12 mt-3">
            <h3>Selamat datang, <?php echo $_SESSION['nama'] ?> </h3>

            <div class="card">
                <div class="card-header">FORM PENGADUAN</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label" for="judul_laporan">Judul</label>
                            <input type="text" name="judul_laporan" class="form-control" placeholder="Inputkan Judul Laporan" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="isi_laporan">Isi Laporan</label>
                            <textarea class="form-control" name="isi_laporan" placeholder="Inputkan kronologi" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="kirim">Kirim Laporan</button>
                </div>
                </form>
                <?php
                include '../db/koneksi.php';
                $tanggal_pengaduan = date('Y-m-d');
                if (isset($_POST['kirim'])) {
                    $nik = $_SESSION['nik'];
                    $judul_laporan = $_POST['judul_laporan'];
                    $isi_laporan = $_POST['isi_laporan'];
                    $status = '0';
                    $foto = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];
                    $lokasi_foto = '../assets/foto/';
                    $nama_foto = rand(0, 999) . '-' . $foto;

                    move_uploaded_file($tmp, $lokasi_foto . $nama_foto);
                    $query = mysqli_query($koneksi, "INSERT INTO pengaduan (tanggal_pengaduan, nik, judul_laporan, isi_laporan, foto, status)
                    VALUES ('$tanggal_pengaduan', '$nik', '$judul_laporan', '$isi_laporan', '$nama_foto', '$status')");
                    echo "<script>
                        alert('Data berhasil di kirim');
                        window.location='index.php';
                    </script>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">RIWAYAT PENGADUAN</div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal </th>
                                <th>Judul </th>
                                <th>Isi Laporan</th>
                                <th>Status </th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $nik = $_SESSION['nik'];
                            $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$nik' ORDER BY id_pengaduan DESC");
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['tanggal_pengaduan'] ?></td>
                                    <td><?php echo $data['judul_laporan'] ?></td>
                                    <td><?php echo $data['isi_laporan'] ?></td>
                                    <td>
                                        <?php
                                        if ($data['status'] == 0) {
                                            echo '<span class="badge badge-warning">Menunggu</span>';
                                        } elseif ($data['status'] == 'proses') {
                                            echo '<span class="badge badge-info">Proses</span>';
                                        } else {
                                            echo '<span class="badge badge-success">Selesai</span>';
                                            echo '<br>';
                                            echo "<a href='index.php?page=tanggapan&id_pengaduan=$data[id_pengaduan]'>Lihat Tanggapan</a>";
                                        }
                                        ?>
                                    </td>
                                    <td><img width="150px" src="../assets/foto/<?php echo $data['foto']  ?>"></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-mdb-toggle="modal" data-mdb-target="#modalHapus<?php echo $data['id_pengaduan'] ?>">
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalHapus<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title" id="modalHapusLabel">Peringatan</h5>
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="hapus_data.php" method="post">
                                                        <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan'] ?>">
                                                        <div class="modal-body text-center">Apakah Anda Yakin menghapus data dengan judul <h4><?php echo $data['judul_laporan'] ?></h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus_pengaduan" class="btn btn-danger">Ya Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
