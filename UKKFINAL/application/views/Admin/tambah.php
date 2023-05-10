<form action="<?= site_url('Admin/simpan'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" class="form-control" name="no_hp">
    </div>
    <div class="form-group">
        <label>Level</label>
        <select name="level" class="form-control">
            <option value="Admin">Admin</option>
            <option value="Resepsionis">Resepsionis</option>
            <option value="Tamu">Tamu</option>
        </select>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success fw500">Tambah</button>
    </div>
</form>