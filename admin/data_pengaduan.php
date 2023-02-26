<div class="container">

    <div class="row mb-3">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">DATA PENGADUAN</div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal </th>
                                <th>Nama</th>
                                <th>Judul </th>
                                <th>Isi </th>
                                <th>Status </th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../db/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik ORDER BY id_pengaduan DESC");
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['tanggal_pengaduan'] ?></td>
                                    <td><?php echo $data['nama'] ?></td>
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
                                        }
                                        ?>
                                    </td>
                                    <td><img width="150px" src="../assets/foto/<?php echo $data['foto']  ?>"></td>
                                    <td>
                                        <?php $data['status'] == 'selesai' || $data['status'] == 'proses' ? '' : include 'tombol_verifikasi.php'; ?>
                                        <?php $data['status'] == 'selesai' ? '' : include 'tombol_tanggapan.php'; ?>
                                        <?php include 'tombol_hapus.php'; ?>
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
