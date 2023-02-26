<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header">LOGIN</div>
            <div class="card-body">
                <form action="db/aksi_login.php" method="post">

                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Inputkan username" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Inputkan password" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Anda ingin login sebagai?</label>
                        <select class="form-control" name="level">
                            <option value="masyarakat">Masyarakat</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="kirim">Login</button>
                Belum punya akun? <a href="index.php?page=register"> Daftar disini</a>
            </div>
            </form>
        </div>
    </div>
</div>
