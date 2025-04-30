<form action="<?= base_url('pembeli/tambah_aksi')?>" method="POST">
    <div class="form-group">
        <label for="">Nama Pembeli</label>
        <input type="text" name="namapembeli" class="form-control">
        <?= form_error('namapembeli', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <div class="form-group">
        <label for="">Gender</label>
        <input type="text" name="gender" class="form-control">
        <?= form_error('gender', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <div class="form-group">
        <label for="">No Telefon</label>
        <input type="text" name="notelefon" class="form-control">
        <?= form_error('notelefon', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <div class="form-group">
        <label for="">Alamat Pembeli</label>
        <input type="text" name="alamatpembeli" class="form-control">
        <?= form_error('alamatpembeli', '<div class="text-small text-danger">', '</div>');?>
    </div>

    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus </button>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan </button>
</form>