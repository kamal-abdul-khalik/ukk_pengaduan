<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Dispostion: attachment; filename=data pengaduan dan tanggapan.xlsx");
?>
<center>
    <h3>LAPORAN PENGADUAN & TANGGAPAN <br> UKK RPL T.A 2022/2023</h3>
</center>

<table class="table table-stripped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal </th>
            <th>NIK</th>
            <th>Judul Laporan</th>
            <th>Isi Laporan</th>
            <th>Tanggapan Laporan</th>
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
                <td><?php echo $data['isi_laporan'] ?></td>
                <td><?php echo $data['tanggapan'] ?></td>
                <td><?php echo $data['status'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
