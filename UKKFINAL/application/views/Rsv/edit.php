<form action="<?= site_url('Rsv/simpan'); ?>" method="post" enctype="multipart/form-data">
    <?php foreach ($user as $u) : ?>
        <div class="form-group">
            <label>Nama Pemesan</label>
            <input type="text" class="form-control" name="id_rsv" value="<?= $u->id_rsv; ?>" readonly hidden>
            <input type="text" class="form-control" name="nama_pemesan" value="<?= $u->nama_pemesan; ?>">
        </div>
        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" class="form-control" name="no_hp" value="<?= $u->no_hp; ?>">
        </div>
        <div class="form-group">
            <label>Nama Tamu</label>
            <input type="text" class="form-control" name="nama_tamu" value="<?= $u->nama_tamu; ?>">
        </div>
        <div class="form-group">
            <label>Tipe Kamar</label>
            <select name="tipe_kamar" class="form-control" value="<?= $u->tipe_kamar; ?>">
                <option value="Superior">Superior</option>
                <option value="Deluxe">Deluxe</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="text" class="form-control" name="jumlah" value="<?= $u->jumlah; ?>">
        </div>
        <div class="form-group">
            <label>Check In</label>
            <input type="date" class="form-control" name="check_in" value="<?= $u->check_in; ?>">
        </div>
        <div class="form-group">
            <label>Check Out</label>
            <input type="date" class="form-control" name="check_out" value="<?= $u->check_out; ?>">
        </div>
    <?php endforeach; ?>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Ubah</button>
    </div>
</form>