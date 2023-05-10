<div class="text-center">
    <img class="img1" src="assets/images/user/<?= $this->session->userdata('foto'); ?>">

    <div class="level">
        <?= $this->session->userdata('level'); ?>
    </div>
    <div class="nama">
        <?= $this->session->userdata('nama'); ?>
    </div>

    <ul>
        <li><i class="fas fa-user mr-2 navicon" style="width: 1.7rem;"></i><a href="<?= site_url('Admin'); ?>">User</a></li>
        <li><i class="fas fa-bed mr-2 navicon" style="width: 1.7rem;"></i><a href="<?= site_url('Kamar'); ?>">Kamar</a></li>
        <li><i class="fas fa-universal-access mr-2 navicon" style="width: 1.7rem;"></i><a href="<?= site_url('Fu'); ?>">Fasilitas Umum</a></li>
        <li><i class="fas fa-file mr-2 navicon" style="width: 1.7rem;"></i><a href="<?= site_url('Rsv'); ?>">Reservasi</a></li>
        <li><i class="navicon" style="width: 1.7rem;"></i><a href="<?= site_url('Auth/logout'); ?>">LOG OUT</a></li>
    </ul>
</div>