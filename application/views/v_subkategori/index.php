<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= site_url('Dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Sub-Kategori</li>
            </ol>
        </div>
    </div>
</div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Tabel Daftar Subkategori -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Sub-Kategori</h3>
                        <div class="card-tools">
                            <form action="<?php echo base_url('Subkategori'); ?>" method="get">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search" value="<?php echo $this->input->get('table_search', TRUE); ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th style="width: 17%;">Nama Kategori</th>
                                        <th style="width: 21%;">Nama Sub-Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data_subkategori) && is_array($data_subkategori)): ?>
                                        <?php foreach ($data_subkategori as $index => $subkategori): ?>
                                            <?php if (is_object($subkategori)): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($index + 1); ?></td>
                                                    <td><?= htmlspecialchars($subkategori->nama_kategori); ?></td> <!-- Pastikan ini objek -->
                                                    <td><?= htmlspecialchars($subkategori->nama_subkategori); ?></td> <!-- Pastikan ini objek -->
                                                    <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= htmlspecialchars($subkategori->keterangan); ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-sm text-light" data-toggle="modal" data-target="#editModal" onclick="loadEditForm(<?= htmlspecialchars($subkategori->id_subkategori); ?>)">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="confirmDelete('<?= site_url('Subkategori/destroy/' . $subkategori->id_subkategori); ?>', 'Apakah Anda yakin ingin menghapus kategori ini?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">Data Sub-Kategori tidak ditemukan.</td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Kategori -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Sub-Kategori Baru</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" method="post" action="<?= site_url('Subkategori/add'); ?>">
                            <div class="form-group">
                                <label for="id_kategori">Nama Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <?php foreach ($data_kategori as $kategori): ?>
                                        <option value="<?= htmlspecialchars($kategori->id_kategori); ?>">
                                            <?= htmlspecialchars($kategori->nama_kategori); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_subkategori">Nama Subkategori</label>
                                <input type="text" name="nama_subkategori" class="form-control" placeholder="Nama Sub-kategori" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan kategori" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal for Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Subkategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content for edit will be dynamically loaded via AJAX -->
            </div>
        </div>
    </div>
</div>

<script>
    // Load form edit kategori sampah
    function loadEditForm(id_subkategori) {
        console.log('Loading form for Subkategori ID:', id_subkategori);
        $.ajax({
            url: '<?= site_url('Subkategori/edit/') ?>' + id_subkategori,
            type: 'GET',
            success: function(data) {
                console.log('AJAX success:', data);
                $('#editModal .modal-body').html(data);
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                console.log(xhr.responseText);
            }
        });
    }

    // Reset form on modal close
    $(document).ready(function() {
        $('#addForm')[0].reset();
    });
</script>