<div class="col-md-3">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="img-fluid" src="<?= base_url('foto/' . $anggota['foto']) ?>"  width="250px">
            </div>
            <div class="text-center">
              <h5><?= $anggota['nim']; ?></h5>
                <h3><?= $anggota['nama_anggota']; ?></h3>
                
            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
        </div>
    </div>
</div>


<div class="col-md-9">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-sm">
                    <i class="fas fa-edit"></i> Edit Profile
                </button>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <th width="140px">NIM</th>
                    <th width="50">:</th>
                    <td><?= $anggota['nim']; ?></td>
                </tr>
                <tr>
                    <th width="140px">Nama Anggota</th>
                    <th width="50">:</th>
                    <td><?= $anggota['nama_anggota']; ?></td>
                </tr>
                <tr>
                    <th width="140px">Prodi</th>
                    <th width="50">:</th>
                    <td><?= $anggota['nama_prodi']; ?></td>
                </tr>
                <tr>
                    <th width="140px">Jenis Kelamin</th>
                    <th width="50">:</th>
                    <td><?= $anggota['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>:</th>
                    <td><?= $anggota['email']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><?= $anggota['alamat']; ?></td>
                </tr>
                <tr>
                    <th>No.Hp</th>
                    <th>:</th>
                    <td><?= $anggota['no_hp']; ?></td>
                </tr>
            </table>

        </div>

    </div>
</div>