<h3>Daftar Mahasiswa</h3>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($mahasiswa as $m): ?>
    <tr>
        <td><?= $m['nim'] ?></td>
        <td><?= $m['nama'] ?></td>
        <td><?= $m['alamat'] ?></td>
        <td>
            <form method="get" style="display:inline;">
                <input type="hidden" name="edit" value="<?= $m['nim'] ?>">
                <button type="submit">Edit</button>
            </form>
            <form method="get" style="display:inline;" onsubmit="return confirm('Apakah yakin ingin menghapus data?')">
                <input type="hidden" name="delete" value="<?= $m['nim'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
