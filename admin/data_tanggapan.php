<div class="container">

    <div class="row mb-3">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">DATA TANGGAPAN</div>
                <div class="card-body">
                    <div class="mt-3 mb-3">
                        <a href="export_tanggapan.php" class="btn btn-success btn-sm" target="_blank">Export Tanggapan</a>
                    </div>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal </th>
                                <th>NIK</th>
                                <th>Judul </th>
                                <th>Tanggapan </th>
                                <th>Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../db/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan=b.id_pengaduan ORDER BY tanggal_tanggapan DESC");

                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['tanggal_tanggapan'] ?></td>
                                    <td><?php echo $data['nik'] ?></td>
                                    <td><?php echo $data['judul_laporan'] ?></td>
                                    <td><?php echo $data['tanggapan'] ?></td>
                                    <td>
                                        <?php
                                        if ($data['status'] == 0) {
                                            echo '<span class="badge badge-warning">Menunggu</span>';
                                        } elseif ($data['status'] == 'proses') {
                                            echo '<span class="badge badge-info">Proses</span>';
                                        } else {
                                            echo '<span class="badge badge-success">Selesai</span>';
                                        }
                                        ?>
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
