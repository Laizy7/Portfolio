<form action="<?= site_url('Kamar/update'); ?>" method="post" enctype="multipart/form-data">
    <?php foreach ($user as $u) : ?>
        <div class="form-group">
            <label>Tipe Kamar</label>
            <input type="text" class="form-control" name="id_kamar" value="<?= $u->id_kamar; ?>" readonly hidden>
            <input type="text" class="form-control" name="tipe_kamar" value="<?= $u->tipe_kamar; ?>">
        </div>
        <div class="form-group">
            <label>Fasilitas</label>
            <input type="text" class="form-control" name="fasilitas" value="<?= $u->fasilitas; ?>">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="text" class="form-control" name="jumlah" value="<?= $u->jumlah; ?>">
        </div>
        <div class="form-group">
            <label>Gambar</label> <br>
            <img width="100" src="assets/images/kamar/<?= $u->gambar; ?>">
            <input style="width: 30%; height: 2.8rem;" type="file" class="form-control mt-4" name="gambar">
            <input type="hidden" class="form-control" name="txtgambar" value="<?= $u->gambar; ?>">
        <?php endforeach; ?>
        <div class="form-group mt-4">
            <button type="cancel" class="btn btn-danger fw500">Batal</button>
            <button type="submit" class="btn btn-success fw500" onclick="return confirm('Yakin Mengubah?!')">Ubah</button>
        </div>
</form>