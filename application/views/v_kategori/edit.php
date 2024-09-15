<form method="post" action="<?= site_url('Kategori/edit/' . $kategori['id_kategori']); ?>">
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori['nama_kategori']; ?>" required>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3" required><?= $kategori['keterangan']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
