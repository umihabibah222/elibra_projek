<div class="login-logo">
    <p style="margin-bottom: 5px; font-size: 18px; font-weight: bold;">Selamat Datang di</p>
    <img src="<?= base_url('AdminLTE') ?>/dist/img/E-Libra.png" alt="AdminLTE Logo" style="margin-top: 10px; max-width: 100px;">  <br>
    <a href="<?= base_url() ?>">Website | <b>E-</b>Libra</a>   
</div>

<div class="row">

    <div class="login-box">
    <div class="col-lg-12 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                    <h3>User</h3>

                    <p>login untuk Admin</p>
                </div>
                <div class="icon">
                    <i class="fas fa fa-user"></i>
                </div>
                <a href="<?= base_url('Auth/LoginUser')?>" class="small-box-footer">Login <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="login-box">
    <div class="col-lg-12 col-12">
        <div class="small-box bg-primary">
            <div class="inner">
                    <h3>Anggota</h3>

                    <p>login untuk Anggota</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?= base_url('Auth/LoginAnggota')?>" class="small-box-footer">Login <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>