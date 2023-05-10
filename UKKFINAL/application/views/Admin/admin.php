<div class="btn-tambah">
    <a class="btn btn-primary" href="<?= site_url('Admin/tambah'); ?>">Tambah User</a>
</div>

<table class="table table-striped">
    <thead>
        <tr style="font-weight: 500;">
            <td width="10%">ID User</td>
            <td width="25%">Nama</td>
            <td width="15%">Nomor HP</td>
            <td width="10%">Level</td>
            <td width="20%">Foto</td>
            <td width="20%">Aksi</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($user as $u) : ?>
            <tr>
                <td><?= $u->id_user; ?></td>
                <td><?= $u->nama; ?></td>
                <td><?= $u->no_hp; ?></td>
                <td><?= $u->level; ?></td>
                <td>
                    <img width="30%" src="assets/images/user/<?= $u->foto; ?>">
                </td>
                <td>
                    <a class="btn btn-warning text-white fw500" href="<?= site_url('Admin/edit/' . $u->id_user); ?>">Edit</a>
                    <a class="btn btn-danger fw500" onclick="return confirm('Yakin Menghapus?!')" href="<?= site_url('Admin/delete/' . $u->id_user); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>