<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">Daftar Buku</h1> -->
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Buku</li>
            </ol>
        </div>
    </div>
</div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Tabel Daftar Buku -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Buku</h3>
                        <div class="card-tools">
                            <form action="<?php echo base_url('Buku'); ?>" method="get">
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
                                        <th style="width: 5%;">No.</th>
                                        <th style="width: 10%;">Thumbnail</th>
                                        <th>Nama Buku</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th>Sub-Kategori</th>
                                        <th>Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data_buku) && is_array($data_buku)): ?>
                                        <?php foreach ($data_buku as $index => $buku): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($index + 1); ?></td>
                                                <td>
                                                    <img src="<?= base_url('assets/images/buku/' . htmlspecialchars($buku->thumbnail)); ?>" alt="<?= htmlspecialchars($buku->nama_buku); ?>" style="width: 60px; height: 50px; object-fit: contain;">
                                                </td>
                                                <td><?= htmlspecialchars($buku->nama_buku); ?></td>
                                                <td><?= htmlspecialchars($buku->penulis); ?></td>
                                                <td><?= htmlspecialchars($buku->nama_kategori); ?></td>
                                                <td><?= htmlspecialchars($buku->nama_subkategori); ?></td>
                                                <td>Rp. <?= number_format($buku->harga_buku, 0, ',', '.'); ?></td>
                                                <td class="text-center">
                                                    <a href="<?= site_url('Buku/detail/' . $buku->id_buku); ?>" class="btn btn-primary btn-sm" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-info btn-sm text-light" onclick="window.location.href='<?= site_url('Buku/edit/' . $buku->id_buku); ?>'">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="confirmDelete('<?= site_url('Buku/delete/' . $buku->id_buku); ?>', 'Apakah Anda yakin ingin menghapus buku ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8">Data Buku tidak ditemukan.</td>
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