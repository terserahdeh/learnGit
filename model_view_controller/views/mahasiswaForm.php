<h3><?= isset($editData) ? 'Update Mahasiswa' : 'Tambah Mahasiswa' ?></h3>
<form method="post" class="insert-form" style="display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; max-width: 500px;">
    <div style="display: flex; align-items: center; gap: 8px;">
        <label for="nama" style="width: 70px;">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?= $editData['nama'] ?? '' ?>" required style="flex: 1;">
    </div>

    <div style="display: flex; align-items: center; gap: 8px;">
        <label for="nim" style="width: 70px;">NIM:</label>
        <input type="text" name="nim" id="nim" value="<?= $editData['nim'] ?? '' ?>" <?= isset($editData) ? 'readonly' : '' ?> required style="flex: 1;">
    </div>

    <div style="display: flex; align-items: center; gap: 8px;">
        <label for="alamat" style="width: 70px;">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="<?= $editData['alamat'] ?? '' ?>" required style="flex: 1;">
    </div>

    <div>
        <button type="submit" name="<?= isset($editData) ? 'update' : 'create' ?>">
            <?= isset($editData) ? 'Update' : 'Submit' ?>
        </button>
    </div>
</form>
<hr>
