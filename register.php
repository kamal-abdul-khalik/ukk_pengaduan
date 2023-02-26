<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header">FORM REGISTRASI</div>
            <div class="card-body">
                <form action="" method="post">

                    <div class="mb-3">
                        <label class="form-label" for="nik">NIK</label>
                        <input type="number" class="form-control" name="nik" placeholder="Inputkan NIK" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Inputkan Nama" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="telpon">Nomor Telpon</label>
                        <input type="number" class="form-control" name="telpon" placeholder="Inputkan telpon" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Inputkan username" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Inputkan password" required />
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="kirim">Daftar</button>
                Sudah punya akun? <a href="index.php?page=login"> Login disini</a>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'db/koneksi.php';
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
        header('location:index.php?page=login');
    }
}
