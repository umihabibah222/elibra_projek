<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-sm">
                    <i class="fas fa-plus"></i> Add
                </button>
            </div>

        </div>

        <div class="card-body">
       
        <?php 
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            
        ?>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama Rak</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($rak as $key => $value){ ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value['nama_rak']; ?> Lorong <?= $value['lorong_rak']; ?></td>
                            <td>
                                <button type="button" class="btn  btn-warning btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value['id_rak'] ?>">
                                    <i class="fas fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-danger btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_rak'] ?>">
                                    <i class="fas fa-trash"></i> 
                                </button>
                                    <!-- <a href=""></a> -->  
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah <?= $judul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open(base_url('Rak/AddData')) ?>
                <div class="form-group">
                    <label>Nama Rak</label>
                    <input class="form-control" name="nama_rak" placeholder="Nama Rak" required>
                </div>
            </div>

            <div class="modal-body">
              <?php echo form_open(base_url('Rak/Add')) ?>
                <div class="form-group">
                    <label>Lorong Rak</label>
                    <input type="number" class="form-control" name="lorong_rak" placeholder="Lorong Rak" required>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>

<!-- Modal Edit -->
<?php foreach($rak as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_rak'] ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit <?= $judul ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open(base_url('Rak/EditData/' . $value['id_rak'])) ?>
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input class="form-control" value="<?= $value['nama_rak'] ?>" name="nama_rak" placeholder="Nama Rak" required>
                        </div>
                    </div>

                    <div class="modal-body">
                        <?php echo form_open(base_url('Rak/EditData')) ?>
                        <div class="form-group">
                            <label>Lorong Rak</label>
                            <input type="number" class="form-control" name="lorong_rak" placeholder="Lorong Rak" required>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning btn-flat">Simpan</button>
                    </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
            <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!-- Modal Delete -->
<?php foreach($rak as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value['id_rak'] ?>">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php echo form_open(base_url('Rak/DeleteData/' . $value['id_rak'])) ?>
                        <div class="form-group">
                            <p style="color: black;">Apakah Yakin Akan Hapus Data <b style="color: red;" ><?= $value['nama_rak'] ?>  di Lorong  <?= $value['lorong_rak'] ?></b>...?</p>
                        </div>
                </div>

                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-flat">Delete</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
            <!-- /.modal-dialog -->
    </div>
<?php } ?>