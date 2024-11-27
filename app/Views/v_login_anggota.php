<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="<?= base_url('Auth') ?>" class="h2"><?= $judul ?></a> 
        </div>
        <div class="card-body">
            <form action="../../index3.html" method="post">
                <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">           
                        <a class="btn btn-success btn-block" href="<?= base_url('Auth')?>">Back</a>         
                    </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="<?= base_url('Auth/Register')?>" class="btn btn-block btn-primary">
                    <i class="fa fa-user-plus"></i> Daftar Anggota
                </a>
                
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>