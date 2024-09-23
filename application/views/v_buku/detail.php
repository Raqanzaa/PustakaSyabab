<div class="container-fluid halaman-detail">
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('Dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('Buku/index'); ?>">Buku</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Thumbnail dan Galeri -->
        <div class="col-md-4">
            <div class="thumbnail text-center">
                <img id="main-thumbnail" src="<?= base_url('assets/images/buku/' . $data_buku->thumbnail); ?>" class="img-fluid rounded mb-3" alt="Thumbnail" style="max-width: 100%; max-height: auto; object-fit: cover;">
            </div>

            <!-- Galeri gambar kecil -->
            <div class="row mt-2 mb-4">
                <?php if ($data_buku->galeri): ?>
                    <?php $galeri = json_decode($data_buku->galeri); ?>
                    <?php foreach ($galeri as $gambar): ?>
                        <div class="col-3">
                            <img src="<?= base_url('assets/images/buku/' . $gambar); ?>" class="img-thumbnail img-galeri rounded" alt="Galeri" style="cursor: pointer; max-height: 70px; object-fit: cover;">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div><br>

        <!-- Detail Buku -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                    <!-- Nama Buku (Title) -->
                    <h2 class="card-title text-uppercase font-weight-bold" style="font-size: 2rem; text-align: center;">
                        <?= htmlspecialchars($data_buku->nama_buku); ?>
                    </h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Penulis</strong></td>
                                <td><?= htmlspecialchars($data_buku->penulis); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Kategori</strong></td>
                                <td><?= htmlspecialchars($data_buku->nama_kategori); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Sub Kategori</strong></td>
                                <td><?= htmlspecialchars($data_buku->nama_subkategori); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Berat Buku</strong></td>
                                <td><?= htmlspecialchars($data_buku->berat_buku); ?> gram</td>
                            </tr>
                            <!-- <tr>
                                <td><strong>Stok</strong></td>
                                <td><?= htmlspecialchars($data_buku->stok_buku); ?> pcs</td>
                            </tr> -->
                            <tr>
                                <td><strong>Harga</strong></td>
                                <td>Rp <?= number_format($data_buku->harga_buku, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Diskon</strong></td>
                                <td><?= htmlspecialchars($data_buku->diskon); ?>%</td>
                            </tr>
                            <tr>
                                <td><strong>Tag</strong></td>
                                <td>
                                    <?php $tags = explode(',', $data_buku->tag_buku); ?>
                                    <?php foreach ($tags as $tag): ?>
                                        <span class="badge badge-primary" style="padding: 6px;"><?= htmlspecialchars(trim($tag)); ?></span>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi Pendek</strong></td>
                                <td><?= htmlspecialchars($data_buku->deskripsi_pendek); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <p class="card-text text-center font-weight-bold"><strong>SINOPSIS</strong></p>
                    <div class="card-text"><?= $data_buku->deskripsi_panjang; ?></div>
                </div>
                <div class="card-body text-right">
                    <!-- Tombol Edit -->
                    <a href="<?= base_url('Buku/index'); ?>" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <a href="<?= site_url('Buku/edit/' . $data_buku->id_buku); ?>" class="btn btn-warning btn-sm text-light">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.img-galeri').forEach(function(img) {
        img.addEventListener('click', function() {
            document.getElementById('main-thumbnail').src = this.src;
        });
    });
</script>