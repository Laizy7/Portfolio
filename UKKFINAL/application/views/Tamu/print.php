<base href="<?= base_url(); ?>">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/tamu.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col judul">
                Bukti Cetak Booking <?= $judul; ?>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr class="fw500">
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col btn-tambah">
                <a href="<?= site_url('Tamu/pesanan'); ?>" class="btn btn-primary">Balik</a>
            </div>
        </div> -->
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>