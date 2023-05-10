<?= form_open('Rsv/search'); ?>
<div class="input-group">
    <input class="srchbox" type="text" name="keyword" placeholder="Masukkan Kata Kunci..." autocomplete="off" autofocus>
    <button type="submit" class="btn btn-primary fw500">Search</button>
</div>
<?= form_close(); ?>

<div class="btn-tambah">
    <a class="btn btn-primary" href="<?= site_url('Rsv/tambah'); ?>">Tambah Data Reservasi</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <td>ID Reservasi</td>
            <td>Nama Tamu</td>
            <td>Tipe Kamar</td>
            <td>Check In</td>
            <td>Check Out</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($user as $u) : ?>
            <tr style="<?php if ($u->status == 'Keluar') {
                            echo "display: none;";
                        } else {
                            echo "color: black;";
                        }; ?>">
                <td><?= $u->id_rsv; ?></td>
                <td><?= $u->nama_tamu; ?></td>
                <td><?= $u->tipe_kamar; ?></td>
                <td><?= $u->check_in; ?></td>
                <td><?= $u->check_out; ?></td>
                <td style="<?php if ($u->status == 'Menunggu') {
                                echo "color: orange;";
                            } else if ($u->status == 'Masuk') {
                                echo "color: green;";
                            } else {
                                echo "color: red;";
                            }; ?>">
                    <?= $u->status; ?>
                </td>
                <td>
                    <a class="btn btn-primary fw500" href="<?= site_url('Rsv/detail/' . $u->id_rsv); ?>">Detail</a>
                    <a class="btn btn-success fw500" onclick="return confirm('Yakin Dicheck In?!')" href="<?= site_url('Rsv/checkin/' . $u->id_rsv); ?>" style="<?php if ($u->status == 'Masuk') {
                                                                                                                                                                    echo "display: none;";
                                                                                                                                                                } else {
                                                                                                                                                                    echo "color: white;";
                                                                                                                                                                }; ?>">Check In</a>
                    <a class="btn btn-danger fw500" onclick="return confirm('Yakin Dicheck Out?!')" href="<?= site_url('Rsv/checkout/' . $u->id_rsv); ?>" style="<?php if ($u->status == 'Menunggu') {
                                                                                                                                                                        echo "display: none;";
                                                                                                                                                                    } else {
                                                                                                                                                                        echo "color: white;";
                                                                                                                                                                    }; ?>">Check Out</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>