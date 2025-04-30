<form action="<?= base_url('sayuran/tambah_aksi')?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama Sayuran</label>
        <input type="text" name="namasayuran" class="form-control">
        <?= form_error('namasayuran', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <div class="form-group">
        <label for="">Jenis Sayuran</label>
        <input type="text" name="jenis" class="form-control">
        <?= form_error('jenis', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <div class="form-group">
        <label for="">Stok Sayuran</label>
        <input type="text" name="stok" class="form-control">
        <?= form_error('stok', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <div class="form-group">
        <label for="">Harga</label>
        <input type="text" name="harga" class="form-control">
        <?= form_error('harga', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <div class="form-group">
        <label for="">Foto</label>
        <input type="file" name="foto" class="form-control">
        <?= form_error('foto', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus </button>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan </button>
</form>