<div class="btn-tambah">
    <a class="btn btn-primary" href="<?= site_url('FU/tambah'); ?>">Tambah Fasilitas Umum</a>
</div>

<table class="table table-striped">
    <thead>
        <tr style="font-weight: 500;">
            <td width="10%">ID Fasilitas</td>
            <td width="25%">Nama Fasilitas</td>
            <td width="25%">Keterangan</td>
            <td width="20%">Gambar</td>
            <td width="20%">Aksi</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($user as $u) : ?>
            <tr>
                <td><?= $u->id_fu; ?></td>
                <td><?= $u->nama_fu; ?></td>
                <td><?= $u->keterangan; ?></td>
                <td>
                    <img width="100%" src="assets/images/fu/<?= $u->gambar; ?>">
                </td>
                <td>
                    <a class="btn btn-warning text-white fw500" href="<?= site_url('FU/edit/' . $u->id_fu); ?>">Edit</a>
                    <a class="btn btn-danger fw500" onclick="return confirm('Yakin Menghapus?!')" href="<?= site_url('FU/delete/' . $u->id_fu); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>