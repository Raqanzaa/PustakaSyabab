<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>
        </div>
    </div>
</div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Tabel Daftar Kategori -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kategori Sampah</h3>
                        <div class="card-tools">
                            <form action="<?php echo base_url('Kategori'); ?>" method="get">
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
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data_kategori) && is_array($data_kategori)): ?>
                                        <?php foreach ($data_kategori as $index => $kategori): ?>
                                            <?php if (is_object($kategori)): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($index + 1); ?></td>
                                                    <td><?= htmlspecialchars($kategori->nama_kategori); ?></td> <!-- Pastikan ini objek -->
                                                    <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= htmlspecialchars($kategori->keterangan); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm text-light" data-toggle="modal" data-target="#editModal" onclick="loadEditForm(<?= htmlspecialchars($kategori->id_kategori); ?>)">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="confirmDelete('<?= site_url('Kategori/destroy/' . $kategori->id_kategori); ?>', 'Apakah Anda yakin ingin menghapus kategori ini?')">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">Data kategori tidak ditemukan.</td>
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
                        <h3 class="card-title">Tambah Kategori Sampah</h3>
                    </div>
                    <div class="card-body">
                        <form id="addForm" method="post" action="<?= site_url('Kategori/add'); ?>">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
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
                <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
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
    function loadEditForm(id_kategori) {
        console.log('Loading form for Kategori Sampah ID:', id_kategori);
        $.ajax({
            url: '<?= site_url('Kategori/edit/') ?>' + id_kategori,
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