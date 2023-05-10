<form action="<?= site_url('FU/simpan'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Fasilitas Umum</label>
        <input type="text" class="form-control" name="nama_fu">
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" class="form-control" name="keterangan">
    </div>
    <div class="form-group">
        <label>Gambar</label>
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success fw500">Tambah</button>
    </div>
</form>