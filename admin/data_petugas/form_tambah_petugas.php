<a href="" class="btn btn-info btn-sm" data-mdb-toggle="modal" data-mdb-target="#modalTambahPetugas">Tambah Petugas</a>
<div class="modal fade" id="modalTambahPetugas" tabindex="-1" aria-labelledby="modalTambahPetugasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalTambahPetugasLabel">Tambah Petugas</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="container">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_petugas" placeholder="Inputkan Nama" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Inputkan username" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telpon</label>
                        <input type="number" class="form-control" name="telpon" placeholder="Inputkan telpon" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Inputkan password" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select class="form-control" name="level">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="tambah_petugas" class="btn btn-info">Tambah</button>
                </div>
            </form>
            <!-- proses verifikasi -->
            <?php
            include '../db/koneksi.php';
            if (isset($_POST['tambah_petugas'])) {
                //ambil semua name pada form register dan tampung kedalam variabel
                $nama_petugas = $_POST['nama_petugas'];
                $username = $_POST['username'];
                $telpon = $_POST['telpon'];
                $password = $_POST['password'];
                $level = $_POST['level'];
                // buat variabel $query untuk menyimpan semua data ke table masyarakat
                $query = mysqli_query($koneksi, "INSERT INTO petugas (nama_petugas,username,password,telpon,level) VALUES ('$nama_petugas','$username','$telpon','$password','$level')");
                //cek kondisi, jika variabel $query sukses tersimpan ke db maka arahkan ke halaman
                if ($query) {
                    echo "<script>
                            alert('Data berhasil di Tambah');
                            window.location='index.php?page=petugas';
                        </script>";
                }
            }
            ?>
        </div>
    </div>
</div>
