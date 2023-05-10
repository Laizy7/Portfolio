<form action="<?= site_url('FU/update'); ?>" method="post" enctype="multipart/form-data">
    <?php foreach ($user as $u) : ?>
        <div class="form-group">
            <label>Nama Fasilitas Umum</label>
            <input type="text" class="form-control" name="id_fu" value="<?= $u->id_fu; ?>" readonly hidden>
            <input type="text" class="form-control" name="nama_fu" value="<?= $u->nama_fu; ?>">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan" value="<?= $u->keterangan; ?>">
        </div>
        <div class="form-group">
            <label>Gambar</label> <br>
            <img width="100" src="assets/images/fu/<?= $u->gambar; ?>">
            <input style="width: 30%; height: 2.8rem;" type="file" class="form-control mt-4" name="gambar">
            <input type="hidden" class="form-control mt-4" name="txtgambar" value="<?= $u->gambar; ?>">
        </div>
        <div class="form-group">
            <button type="cancel" class="btn btn-danger fw500">Batal</button>
            <button type="submit" class="btn btn-success fw500" onclick="return confirm('Yakin Mengubah?!')">Ubah</button>
        </div>
    <?php endforeach; ?>
</form>