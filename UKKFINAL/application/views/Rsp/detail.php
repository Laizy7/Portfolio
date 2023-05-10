<?php foreach ($user as $u) : ?>

    <div>
        Detail ID Reservasi : <?= $u->id_rsv; ?>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID Reservasi</td>
                <td>Nama Pemesan</td>
                <td>Nomor HP</td>
                <td>Nama Tamu</td>
                <td>Tipe Kamar</td>
                <td>Jumlah</td>
                <td>Check In</td>
                <td>Check Out</td>
                <td>Tanggal Dibuat</td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= $u->id_rsv; ?></td>
                <td><?= $u->nama_pemesan; ?></td>
                <td><?= $u->no_hp; ?></td>
                <td><?= $u->nama_tamu; ?></td>
                <td><?= $u->tipe_kamar; ?></td>
                <td><?= $u->jumlah; ?></td>
                <td><?= $u->check_in; ?></td>
                <td><?= $u->check_out; ?></td>
                <td><?= $u->tgl_dibuat; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>