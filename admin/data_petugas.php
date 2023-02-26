<div class="container">

    <div class="row mb-3">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">DATA Petugas</div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Username </th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../db/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM petugas");

                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['nama_petugas'] ?></td>
                                    <td><?php echo $data['username'] ?></td>
                                    <td><?php echo $data['level'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
