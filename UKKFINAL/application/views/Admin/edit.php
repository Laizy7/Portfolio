<form action="<?= site_url('Admin/update'); ?>" method="post" enctype="multipart/form-data">
    <?php foreach ($user as $u) : ?>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="id_user" value="<?= $u->id_user; ?>" readonly hidden>
            <input type="text" class="form-control" name="nama" value="<?= $u->nama; ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" value="<?= $u->password; ?>">
        </div>
        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" class="form-control" name="no_hp" value="<?= $u->no_hp; ?>">
        </div>
        <div class="form-group">
            <label>Level</label>
            <select name="level" class="form-control" value="<?= $u->level; ?>">
                <option value="Admin">Admin</option>
                <option value="Resepsionis">Resepsionis</option>
                <option value="Tamu">Tamu</option>
            </select>
        </div>
        <div class="form-group">
            <label>Foto</label> <br>
            <img width="100" src="assets/images/user/<?= $u->foto; ?>">
            <input style="width: 30%; height: 2.8rem;" type="file" class="form-control mt-4" name="foto">
            <input type="hidden" class="form-control" name="txtfoto" value="<?= $u->foto; ?>">
        </div>
    <?php endforeach; ?>
    <div class="form-group">
        <button type="cancel" class="btn btn-danger fw500">Batal</button>
        <button type="submit" class="btn btn-success fw500" onclick="return confirm('Yakin Mengubah?!')">Ubah</button>
    </div>
</form>