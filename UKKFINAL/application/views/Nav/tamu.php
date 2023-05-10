<ul class="ultamu">
    <li><a href="<?= site_url('Tamu'); ?>">Home</a></li>
    <li><a href="<?= site_url('Tamu/fu'); ?>">Fasilitas Umum</a></li>
    <li><a href="<?= site_url('Tamu/kamar'); ?>">Kamar</a></li>
    <li><a href="<?= site_url('Tamu/booking'); ?>">Booking</a></li>
    <li><a href="<?= site_url('Tamu/pesanan'); ?>">Lihat Pesanan</a></li>
    <li><a href="<?= site_url('Auth/logout'); ?>">Log Out</a></li>
    <li>
        <img src="assets/images/user/<?= $this->session->userdata('foto'); ?>">
    </li>
    <li><?= $this->session->userdata('nama'); ?></li>
</ul>