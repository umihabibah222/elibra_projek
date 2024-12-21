<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="<?= base_url('Auth') ?>" class="h2"><?= $judul ?></a> 
        </div>
        <div class="card-body">
            <?php
            // notifikasi validasi
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <h4>Periksa Entry From</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>

                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?php 
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }            
            ?>

            <?php echo form_open('Auth/Daftar') ?>  
            
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="nama_anggota" value="<?= old('nana_anggota') ?>" placeholder="Nama Anggota">
                </div> 

                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="nim" value="<?= old('nim') ?>" placeholder="NIM">
                </div>

                <div class="form-group mb-3">
                    <select name="id_prodi"  class="form-control">
                        <option value="">--Pilih Prodi--</option>
                            <?php foreach ($prodi as $key => $value) { ?>
                                <option value="<?= $value['id_prodi'] ?>"><?= $value['nama_prodi'] ?></option>
                            <?php } ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <select name="jenis_kelamin"  class="form-control">
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="no_hp" value="<?= old('n0_hp') ?>" placeholder="Nomor Handphone">
                </div>

                <div class="form-group mb-3 position-relative">
            <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>" placeholder="Password">
            <button type="button" class="btn btn-light position-absolute" id="togglePassword" style="right: 10px; top: 50%; transform: translateY(-50%);">
                <i class="fas fa-eye"></i>
            </button>
        </div>

        <!-- Ulangi Password Field -->
        <div class="form-group mb-3 position-relative">
            <input type="password" class="form-control" id="ulangi_password" name="ulangi_password" value="<?= htmlspecialchars($_POST['ulangi_password'] ?? '') ?>" placeholder="Ulangi Password">
            <button type="button" class="btn btn-light position-absolute" id="toggleUlangiPassword" style="right: 10px; top: 50%; transform: translateY(-50%);">
                <i class="fas fa-eye"></i>
            </button>
        </div>

    </form>

    <!-- Tambahkan JavaScript untuk fungsi toggle password -->
    <script>
        // Toggle password visibility for "Password" field
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Toggle password visibility for "Ulangi Password" field
        document.getElementById('toggleUlangiPassword').addEventListener('click', function () {
            const ulangiPasswordInput = document.getElementById('ulangi_password');
            const icon = this.querySelector('i');

            if (ulangiPasswordInput.type === 'password') {
                ulangiPasswordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                ulangiPasswordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>


                <div class="row">
                    <div class="col-sm-6">           
                        <a class="btn btn-success btn-block" href="<?= base_url('Auth')?>">Back</a>         
                    </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                </div>
            <?php echo form_close() ?>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="<?= base_url('Auth/LoginAnggota')?>" class="btn btn-block btn-warning">
                    <i class="fa fa-user-plus"></i> Kembali Login
                </a>
                
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>