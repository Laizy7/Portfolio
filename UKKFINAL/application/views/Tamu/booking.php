<?= $this->session->flashdata('msg'); ?>

<form action="<?= site_url('Tamu/simpan'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Pemesan</label>
        <input type="text" class="form-control" name="nama_pemesan">
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" class="form-control" name="no_hp" value="<?= $this->session->userdata('no_hp'); ?>">
    </div>
    <div class="form-group">
        <label>Nama Tamu</label>
        <input type="text" class="form-control" name="nama_tamu" value="<?= $this->session->userdata('nama'); ?>" readonly>
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
    <div class="form-group text-center mt-5 mb-5">
        <button onclick="return confirm('Yakin Dipesan?!')" type="submit" class="btn btn-success btnpesan">PESAN</button>
    </div>
</form>