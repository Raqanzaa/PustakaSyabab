<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Buku</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Buku/update/' . $data_buku->id_buku); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Buku</label>
                                    <input type="text" class="form-control" name="nama_buku" value="<?= $data_buku->nama_buku; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text" class="form-control" name="penulis" value="<?= $data_buku->penulis; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Harga Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" class="form-control" id="harga_buku" name="harga_buku" value="<?= number_format($data_buku->harga_buku, 0, ',', '.'); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Berat Buku (gram)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="berat_buku" value="<?= $data_buku->berat_buku; ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Stok Buku</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="stok_buku" value="<?= $data_buku->stok_buku; ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">pcs</span>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label>Diskon</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="diskon" name="diskon" value="<?= $data_buku->diskon; ?>" min="0" max="100" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label><br>
                                    <div class="form-check form-check-inline" style="padding-top: 8px;">
                                        <input class="form-check-input" type="checkbox" name="promo" value="1" <?= $data_buku->promo ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="promo">Promo</label>
                                    </div><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="produk_baru" value="1" <?= $data_buku->produk_baru ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="produk_baru">Produk Baru</label>
                                    </div><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="best_seller" value="1" <?= $data_buku->best_seller ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="best_seller">Best Seller</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori Buku</label>
                                    <select name="id_kategori" class="form-control" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php foreach ($data_kategori as $kategori): ?>
                                            <option value="<?= $kategori->id_kategori ?>" <?= $kategori->id_kategori == $data_buku->id_kategori ? 'selected' : '' ?>>
                                                <?= $kategori->nama_kategori ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Kategori Buku</label>
                                    <select name="id_subkategori" class="form-control" required>
                                        <option value="">-- Pilih Subkategori --</option>
                                        <?php foreach ($data_subkategori as $subkategori): ?>
                                            <option value="<?= $subkategori->id_subkategori ?>" <?= $subkategori->id_subkategori == $data_buku->id_subkategori ? 'selected' : '' ?>>
                                                <?= $subkategori->nama_subkategori ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tag Buku</label><br>
                            <input type="text" name="tag_buku[]" class="form-control" data-role="tagsinput" value="<?= isset($data_buku->tag_buku) && is_array($data_buku->tag_buku) ? implode(',', $data_buku->tag_buku) : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Pendek</label>
                            <input type="text" name="deskripsi_pendek" class="form-control" value="<?= $data_buku->deskripsi_pendek; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Thumbnail Buku -->
                        <div class="form-group">
                            <label>Thumbnail Buku (Biarkan kosong jika tidak ingin mengubah)</label>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail" accept=".jpg,.jpeg,.png">
                                <input type="hidden" name="deleted_thumbnail" id="deleted_thumbnail">
                                <label class="custom-file-label" for="thumbnail">Pilih file</label>
                            </div>
                            <!-- Preview Thumbnail -->
                            <?php if (!empty($data_buku->thumbnail)) : ?>
                                <div class="mt-2">
                                    <p>Thumbnail Saat Ini:</p>
                                    <div class="position-relative d-inline-block">
                                        <img src="<?= base_url('assets/images/buku/' . $data_buku->thumbnail) ?>" alt="Thumbnail Buku" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: contain;">
                                        <!-- <button type="button" class="btn btn-danger btn-sm position-absolute top-0 right-0 remove-thumbnail" data-filename="<?= $data_buku->thumbnail ?>" style="top: 0; right: 0;">&times;</button> -->
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Galeri Buku -->
                        <div class="form-group">
                            <label>Galeri Buku (Biarkan kosong jika tidak ingin mengubah)</label>
                            <div class="custom-file">
                                <input type="file" name="galeri[]" class="custom-file-input" id="galeri" multiple>
                                <input type="hidden" name="deleted_images" id="deleted_images">
                                <label class="custom-file-label" for="galeri">Pilih file</label>
                            </div>
                            <!-- Preview Galeri -->
                            <?php if (!empty($data_buku->galeri)) : ?>
                                <div class="mt-2">
                                    <p>Galeri Saat Ini:</p>
                                    <div class="row">
                                        <?php
                                        $galeri_files = json_decode($data_buku->galeri);
                                        if ($galeri_files):
                                            foreach ($galeri_files as $galeri) : ?>
                                                <div class="col-md-3 position-relative">
                                                    <img src="<?= base_url('assets/images/buku/' . $galeri) ?>" alt="Galeri Buku" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: contain;"">
                                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 right-0 remove-gallery-image" data-filename="<?= $galeri ?>" style="top: 0; right: 0;">&times;</button>
                                                </div>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi Panjang (Sinopsis)</label>
                    <textarea id="summernote" name="deskripsi_panjang" class="form-control" required><?= $data_buku->deskripsi_panjang; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?= base_url('Buku/index'); ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(function() {
            $('#summernote').summernote()

            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })

        $('select[name="id_kategori"]').change(function() {
            var kategori_id = $(this).val();

            $.ajax({
                url: "<?= base_url('Buku/get_subkategori') ?>",
                type: "POST",
                data: {
                    id_kategori: kategori_id,
                    <?= $this->security->get_csrf_token_name(); ?>: "<?= $this->security->get_csrf_hash(); ?>"
                },
                success: function(response) {
                    var subkategoriOptions = '';
                    var subkategoriList = JSON.parse(response);

                    $('select[name="id_subkategori"]').empty();

                    $.each(subkategoriList, function(index, value) {
                        subkategoriOptions += '<option value="' + value.id_subkategori + '">' + value.nama_subkategori + '</option>';
                    });

                    $('select[name="id_subkategori"]').append(subkategoriOptions);
                }
            });
        });

        // Preview untuk Thumbnail
        $('#thumbnail').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });

        // Preview untuk Galeri
        $('#galeri').on('change', function() {
            var files = $(this).get(0).files;
            var fileNames = Array.from(files).map(file => file.name).join(', ');
            $(this).next('.custom-file-label').html(fileNames);
        });

        $('#harga_buku').on('keyup', function() {
            var harga = $(this).val().replace(/[^,\d]/g, '').toString();
            var sisa = harga.length % 3;
            var rupiah = harga.substr(0, sisa);
            var ribuan = harga.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            $(this).val(rupiah);
        });

        $('form').on('submit', function() {
            var hargaBuku = $('#harga_buku').val().replace(/\./g, '');
            $('#harga_buku').val(hargaBuku);
        });

        $('#diskon').on('keyup', function() {
            var diskon = $(this).val();
            if (diskon < 0) {
                $(this).val(0);
            } else if (diskon > 100) {
                $(this).val(100);
            }
        });

        $('#galeri').on('change', function() {
            var files = $(this).get(0).files;
            var fileNames = Array.from(files).map(file => file.name).join(', ');
            $(this).next('.custom-file-label').html(fileNames);
        });

        let deletedImages = [];

        $('.remove-thumbnail').on('click', function() {
            var filename = $(this).data('filename');
            $(this).closest('.position-relative').remove();
            $('#deleted_thumbnail').val(filename);
        });

        // Logika untuk menghapus gambar galeri
        $('.remove-gallery-image').on('click', function() {
            var filename = $(this).data('filename');
            $(this).closest('.position-relative').remove();
            let deletedImages = JSON.parse($('#deleted_images').val() || '[]');
            deletedImages.push(filename);
            $('#deleted_images').val(JSON.stringify(deletedImages));
        });
    });
</script>