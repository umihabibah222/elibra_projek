<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="<?= base_url('Auth') ?>" class="h2"><?= $judul ?></a> 
        </div>
        <div class="card-body">

            <?php echo form_open('Auth/Daftar') ?>  
            
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="nama_anggota" placeholder="Nama Anggota">
                </div> 

                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="nim" placeholder="NIM">
                </div>

                <div class="form-group mb-3">
                    <select name="prodi"  class="form-control">
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
                    <input type="text" class="form-control" name="no_hp" placeholder="Nomor Handphone">
                </div>

                <div class="form-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group mb-3">
                    <input type="password" class="form-control" name="ulangi_password" placeholder="Ulangi Password">
                </div>

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