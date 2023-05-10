<div class="row">
    <?php foreach ($user as $u) : ?>
        <div class="col-6 mt-5 rkamar">
            <img class="imgkamar" src="assets/images/kamar/<?= $u->gambar; ?>">
        </div>
        <div class="col-6 mt-5 rkamar">
            <div class="tipekamar">
                <?= $u->tipe_kamar; ?>
            </div>

            <div class="faskamar">
                <?= $u->fasilitas; ?>
            </div>

            <div class="jmlhskrg">
                Sekarang Tersedia : <?= $u->jumlah; ?> Kamar
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="row mt-5 mb-5">
    <div class="col text-center">
        <a href="<?= site_url('Tamu/booking'); ?>" class="btn btn-primary btnbooking">Booking</a>
    </div>
</div>