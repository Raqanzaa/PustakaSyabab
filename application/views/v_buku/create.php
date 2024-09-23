<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Buku Baru</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Buku/store') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Buku</label>
                                    <input type="text" name="nama_buku" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text" name="penulis" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" name="harga_buku" class="form-control" id="harga_buku" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Berat Buku</label>
                                    <div class="input-group">
                                        <input type="number" name="berat_buku" class="form-control" id="berat_buku" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Stok Buku</label>
                                    <div class="input-group">
                                        <input type="number" name="stok_buku" class="form-control" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">pcs</span>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label>Diskon</label>
                                    <div class="input-group">
                                        <input type="number" name="diskon" class="form-control" id="diskon" min="0" max="100">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label><br>
                                    <div class="form-check form-check-inline" style="padding-top: 8px;">
                                        <input class="form-check-input" type="checkbox" name="promo" value="1" id="promo">
                                        <label class="form-check-label" for="promo">Promo</label>
                                    </div><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="produk_baru" value="1" id="produk_baru">
                                        <label class="form-check-label" for="produk_baru">Produk Baru</label>
                                    </div><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="best_seller" value="1" id="best_seller">
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
                                        <?php foreach ($data_kategori as $kat): ?>
                                            <option value="<?= $kat->id_kategori ?>"><?= $kat->nama_kategori ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Kategori Buku</label>
                                    <select name="id_subkategori" class="form-control" required>
                                        <option value="">-- Pilih Subkategori --</option>
                                        <?php foreach ($data_subkategori as $subkat): ?>
                                            <option value="<?= $subkat->id_subkategori ?>"><?= $subkat->nama_subkategori ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tag Buku</label><br>
                            <input type="text" name="tag_buku[]" class="form-control" data-role="tagsinput" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Pendek</label>
                            <input type="text" name="deskripsi_pendek" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Thumbnail Buku</label>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail" accept=".jpg,.jpeg,.png" required>
                                <label class="custom-file-label" for="thumbnail">Pilih file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Galeri Buku</label>
                            <div class="custom-file">
                                <input type="file" name="galeri[]" class="custom-file-input" id="galeri" multiple>
                                <label class="custom-file-label" for="galeri">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi Panjang (Sinopsis)</label>
                    <textarea id="summernote" name="deskripsi_panjang" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Buku</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
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

    $(document).ready(function() {
        $('#thumbnail').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });

        $('#galeri').on('change', function() {
            var files = $(this).get(0).files;
            var fileNames = Array.from(files).map(file => file.name).join(', ');
            $(this).next('.custom-file-label').html(fileNames);
        });
    });

    $(document).ready(function() {
        $('#harga_buku').on('keyup', function() {
            var harga = $(this).val().replace(/[^,\d]/g, '');
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
    });
</script>