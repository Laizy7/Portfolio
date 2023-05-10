<table class="table table-striped text-white">
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
            <td>Aksi</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($user as $u) : ?>
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
                <td>
                    <a class="btn btn-primary fw500" href="<?= site_url('Tamu/print/' . $u->id_rsv); ?>">Print</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>