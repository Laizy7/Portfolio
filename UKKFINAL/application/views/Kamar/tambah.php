<form action="<?= site_url('Kamar/simpan'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tipe Kamar</label>
        <input type="text" class="form-control" name="tipe_kamar">
    </div>
    <div class="form-group">
        <label>Fasilitas</label>
        <input type="text" class="form-control" name="fasilitas">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" class="form-control" name="jumlah">
    </div>
    <div class="form-group">
        <label>Gambar</label>
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success fw500">Tambah</button>
    </div>
</form>