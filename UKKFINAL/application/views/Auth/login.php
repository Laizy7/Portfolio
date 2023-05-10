<?= $this->session->flashdata('msg'); ?>

<form action="<?= site_url('Auth/login'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group btncntr">
        <button type="submit" class="btn btn-success">LOGIN</button>
    </div>
</form>