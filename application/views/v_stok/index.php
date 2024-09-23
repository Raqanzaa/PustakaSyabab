<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <!-- You can add a title here if needed -->
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Stok Buku</li>
            </ol>
        </div>
    </div>
</div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Tabel Stok Buku -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manajemen Stok Buku</h3>
                        <div class="card-tools">
                            <form action="<?= base_url('Stok'); ?>" method="get">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search" value="<?= $this->input->get('table_search', TRUE); ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tabel Daftar Stok Buku -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th>Nama Buku</th>
                                        <th>Harga Buku</th>
                                        <th>Diskon (%)</th>
                                        <th>Total Harga Setelah Diskon</th>
                                        <th>Jumlah Stok</th>
                                        <th>Status Ketersediaan</th>
                                        <th>Indikator</th> <!-- Kolom Indikator -->
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data_stok) && is_array($data_stok)): ?>
                                        <?php foreach ($data_stok as $index => $stok): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($index + 1); ?></td>
                                                <td><?= htmlspecialchars($stok->nama_buku); ?></td>
                                                <td>Rp <?= number_format($stok->harga_buku, 0, ',', '.'); ?></td>
                                                <td><?= htmlspecialchars($stok->diskon); ?>%</td>
                                                <td>Rp <?= number_format($stok->tot_harga, 0, ',', '.'); ?></td>
                                                <form method="post" action="<?= site_url('Stok/update_stok'); ?>">
                                                    <td>
                                                        <input type="number" name="stok" class="form-control" value="<?= htmlspecialchars($stok->stok); ?>" required>
                                                    </td>
                                                    <td>
                                                        <select name="is_active" class="form-control">
                                                            <option value="1" <?= ($stok->is_active == 1) ? 'selected' : ''; ?>>Tersedia</option>
                                                            <option value="0" <?= ($stok->is_active == 0) ? 'selected' : ''; ?>>Tidak Tersedia</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">
                                                        <!-- Circular indicator based on stock status -->
                                                        <span class="circle-indicator <?= ($stok->is_active == 1) ? 'available' : 'not-available'; ?> "></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="id_stok" value="<?= $stok->id_stok; ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-check"></i> <!-- Ikon FontAwesome tanpa teks -->
                                                        </button>
                                                    </td>

                                                </form>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9">Data stok buku tidak ditemukan.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>