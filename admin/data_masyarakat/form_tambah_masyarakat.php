<a href="" class="btn btn-info btn-sm" data-mdb-toggle="modal" data-mdb-target="#modalTambahMasyarakat">Tambah Masyarakat</a>
<div class="modal fade" id="modalTambahMasyarakat" tabindex="-1" aria-labelledby="modalVerifLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalVerifLabel">Tambah Masyarakat</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="container">
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="number" class="form-control" name="nik" placeholder="Inputkan NIK" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Inputkan Nama" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telpon</label>
                        <input type="number" class="form-control" name="telpon" placeholder="Inputkan telpon" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Inputkan username" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Inputkan password" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="kirim" class="btn btn-info">Tambah</button>
                </div>
            </form>
            <!-- proses verifikasi -->
            <?php
            include '../db/koneksi.php';
            if (isset($_POST['kirim'])) {
                //ambil semua name pada form register dan tampung kedalam variabel
                $nik = $_POST['nik'];
                $nama = $_POST['nama'];
                $telpon = $_POST['telpon'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $level = 'masyarakat';
                // buat variabel $query untuk menyimpan semua data ke table masyarakat
                $query = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik','$nama','$username','$password','$telpon','$level')");
                //cek kondisi, jika variabel $query sukses tersimpan ke db maka arahkan ke halaman
                if ($query) {
                    echo "<script>
                            alert('Data berhasil di Tambah');
                            window.location='index.php?page=masyarakat';
                        </script>";
                }
            }
            ?>
        </div>
    </div>
</div>
