<form method="post" action="<?= site_url('Subkategori/edit/' . $data_subkategori->id_subkategori); ?>">
    <div class="form-group">
        <label for="id_kategori">Nama Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="" disabled>Pilih Kategori</option>
            <?php foreach ($data_kategori as $kategori): ?>
                <option value="<?= htmlspecialchars($kategori->id_kategori); ?>" <?= $kategori->id_kategori == $data_subkategori->id_kategori ? 'selected' : '' ?>>
                    <?= htmlspecialchars($kategori->nama_kategori); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="nama_subkategori">Nama Sub-Kategori</label>
        <input type="text" name="nama_subkategori" class="form-control" value="<?= htmlspecialchars($data_subkategori->nama_subkategori); ?>" required>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3" required><?= htmlspecialchars($data_subkategori->keterangan); ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
