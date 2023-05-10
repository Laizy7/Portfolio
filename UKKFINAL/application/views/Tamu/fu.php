<div class="row">
    <?php foreach ($user as $u) : ?>
        <div class="col-6 mt-5 rkamar">
            <img class="imgkamar" src="assets/images/fu/<?= $u->gambar; ?>">
        </div>
        <div class="col-6 mt-5 rkamar">
            <div class="tipekamar">
                <?= $u->nama_fu; ?>
            </div>

            <div class="faskamar">
                <?= $u->keterangan; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- <div>
<?php foreach ($user as $u) : ?>
        <img style="width: 20rem; height: 10rem; margin: 1rem 1rem;" src="assets/images/fu/<?= $u->gambar; ?>">
        
        <?= $u->nama_fu; ?>
        <?= $u->keterangan; ?>
    <?php endforeach; ?>
</div> -->