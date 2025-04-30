<?= $this -> session -> flashdata('pesan');?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url("sayuran/tambah")?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>  Tambah Sayuran</a>
        <a href="<?= base_url("sayuran/print")?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i>  Print Data</a>
        <a href="<?= base_url("sayuran/pdf")?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i>  Export PDF</a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Sayuran</th>
                    <th>Jenis Sayuran</th>
                    <th>Stok Sayuran</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
                <?php $no = 1;
                foreach($sayuran as $syr) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++?></td>
                            <td><?=$syr->nama_sayur?></td>
                            <td><?=$syr->jenis_sayur?></td>
                            <td><?=$syr->stok?></td>
                            <td><?=$syr->harga?></td>
                            <td>
                                <?php if ($syr->foto): ?>
                                    <img src="<?= base_url('uploads/' . $syr->foto) ?>" width="80">
                                <?php else: ?>
                                    <small class="text-muted">Tidak ada foto</small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#edit<?= $syr->id_sayur?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= base_url('sayuran/delete/' . $syr->id_sayur)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach;?>
            </table>
    </div>

<!-- Modal -->
<?php foreach($sayuran as $syr) :?>

<div class="modal fade" id="edit<?= $syr->id_sayur?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sayuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('sayuran/edit/' . $syr->id_sayur)?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Sayuran</label>
                        <input type="text" name="namasayuran" class="form-control" value="<?= $syr->nama_sayur?>">
                        <?= form_error('namasayuran', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Sayuran</label>
                        <input type="text" name="jenis" class="form-control" value="<?= $syr->jenis_sayur?>">
                        <?= form_error('jenis', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="form-group">
                        <label for="">Stok Sayuran</label>
                        <input type="text" name="stok" class="form-control" value="<?= $syr->stok?>">
                        <?= form_error('stok', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" class="form-control" value="<?= $syr->harga?>">
                        <?= form_error('harga', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control">
                            <!-- Simpan foto lama untuk fallback kalau tidak upload -->
                            <input type="hidden" name="foto_lama" value="<?= $syr->foto ?>">

                            <!-- Preview foto lama -->
                            <?php if ($syr->foto): ?>
                                <img src="<?= base_url('uploads/' . $syr->foto) ?>" width="80" class="mt-2">
                            <?php endif; ?>
                            <?= form_error('foto', '<div class="text-small text-danger">', '</div>');?>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Reset </button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endforeach;?>