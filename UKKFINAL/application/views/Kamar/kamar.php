<div class="btn-tambah">
    <a class="btn btn-primary" href="<?= site_url('Kamar/tambah'); ?>">Tambah Kamar</a>
</div>

<table class="table table-striped">
    <thead>
        <tr style="font-weight: 500;">
            <td width="10%">ID Kamar</td>
            <td width="25%">Tipe Kamar</td>
            <td width="15%">Fasilitas</td>
            <td width="10%">Jumlah</td>
            <td width="20%">Foto</td>
            <td width="20%">Aksi</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($user as $u) : ?>
            <tr>
                <td><?= $u->id_kamar; ?></td>
                <td><?= $u->tipe_kamar; ?></td>
                <td><?= $u->fasilitas; ?></td>
                <td><?= $u->jumlah; ?></td>
                <td>
                    <img width="150" height="100" src="assets/images/kamar/<?= $u->gambar; ?>">
                </td>
                <td>
                    <a class="btn btn-warning text-white fw500" href="<?= site_url('Kamar/edit/' . $u->id_kamar); ?>">Edit</a>
                    <a class="btn btn-danger fw500" onclick="return confirm('Yakin Menghapus?!')" href="<?= site_url('Kamar/delete/' . $u->id_kamar); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>