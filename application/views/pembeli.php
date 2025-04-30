<?= $this -> session -> flashdata('pesan');?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url("pembeli/tambah")?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>  Tambah Pembeli</a>
        <a href="<?= base_url("pembeli/print")?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i>  Print Data</a>
        <a href="<?= base_url("pembeli/pdf")?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i>  Export PDF</a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Gender</th>
                    <th>No Telefon</th>
                    <th>Alamat Pembeli</th>
                    <th>Action</th>
                </tr>
            </thead>
                <?php $no = 1;
                foreach($pembeli as $pbl) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++?></td>
                            <td><?=$pbl -> nama_pembeli?></td>
                            <td><?=$pbl -> gender?></td>
                            <td><?=$pbl -> notelefon?></td>
                            <td><?=$pbl -> alamat_pembeli?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#edit<?= $pbl->id_pembeli?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= base_url('pembeli/delete/' . $pbl->id_pembeli)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach;?>
            </table>
    </div>

<!-- Modal -->
<?php foreach($pembeli as $pbl) :?>

<div class="modal fade" id="edit<?= $pbl->id_pembeli?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pembeli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pembeli/edit/' . $pbl->id_pembeli)?>" method="POST">
                    <div class="form-group">
                        <label for="">Nama Pembeli</label>
                        <input type="text" name="namapembeli" class="form-control" value="<?= $pbl->nama_pembeli?>">
                        <?= form_error('namapembeli', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="form-group">
                        <label for="">Gender</label>
                        <input type="text" name="gender" class="form-control" value="<?= $pbl->gender?>">
                        <?= form_error('gender', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="form-group">
                        <label for="">No Telefon</label>
                        <input type="text" name="notelefon" class="form-control" value="<?= $pbl->notelefon?>">
                        <?= form_error('notelefon', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat Pembeli</label>
                        <input type="text" name="alamatpembeli" class="form-control" value="<?= $pbl->alamat_pembeli?>">
                        <?= form_error('alamatpembeli', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Reset </button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endforeach;?>