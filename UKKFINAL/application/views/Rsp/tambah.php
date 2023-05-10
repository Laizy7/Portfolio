<form action="<?= site_url('Rsp/simpan'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Pemesan</label>
        <input type="text" class="form-control" name="nama_pemesan">
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" class="form-control" name="no_hp">
    </div>
    <div class="form-group">
        <label>Nama Tamu</label>
        <input type="text" class="form-control" name="nama_tamu">
    </div>
    <div class="form-group">
        <label>Tipe Kamar</label>
        <select name="tipe_kamar" class="form-control">
            <option value="Superior">Superior</option>
            <option value="Deluxe">Deluxe</option>
        </select>
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" class="form-control" name="jumlah">
    </div>
    <div class="form-group">
        <label>Check In</label>
        <input type="date" class="form-control" name="check_in">
    </div>
    <div class="form-group">
        <label>Check Out</label>
        <input type="date" class="form-control" name="check_out">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success fw500">Tambah</button>
    </div>
</form>