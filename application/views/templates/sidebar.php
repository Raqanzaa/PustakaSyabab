<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-2">
  <!-- Brand Logo -->
  <div class="brand-link py-3">
    <img src="<?php echo base_url('assets/dist/img/PustakaSyabab.png'); ?>" alt="AdminLTE Logo" class="brand-image">
    <span class="brand-text text-center">Pustaka Syabab</span>
  </div>

  <!-- Sidebar -->
  <div class="sidebar pt-3">

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url('Dashboard'); ?>"
            class="nav-link <?php echo ($this->uri->segment(1) == 'Dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-header">Kelola Produk</li>

        <li class="nav-item <?php echo ($this->uri->segment(1) == 'Kategori') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              Kategori
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('Kategori') ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'Kategori') ? 'active' : ''; ?>">
                <i class="fas fa-layer-group nav-icon ml-3"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Subkategori') ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'Subkategori') ? 'active' : ''; ?> ">
                <i class="fas fa-layer-group nav-icon ml-3"></i>
                <p>Sub Kategori</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item <?php echo ($this->uri->segment(1) == 'Buku') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('Buku/tambah') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'tambah') ? 'active' : ''; ?>">
                <i class="fas fa-plus nav-icon ml-3"></i>
                <p>Tambah Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Buku/kelola') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'kelola') ? 'active' : ''; ?>">
                <i class="fas fa-edit nav-icon ml-3"></i>
                <p>Kelola Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Buku/stok') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'stok') ? 'active' : ''; ?>">
                <i class="fas fa-warehouse nav-icon ml-3"></i>
                <p>Stok Buku</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item <?php echo ($this->uri->segment(1) == 'Slider') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Slider
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('Slider/tambah') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'tambah') ? 'active' : ''; ?>">
                <i class="fas fa-plus nav-icon ml-3"></i>
                <p>Tambah Slider</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Slider/kelola') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'kelola') ? 'active' : ''; ?>">
                <i class="fas fa-edit nav-icon ml-3"></i>
                <p>Kelola Slider</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">Kelola Pesanan</li>

        <li class="nav-item <?php echo ($this->uri->segment(1) == 'Pesanan') ? 'buka-menu' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Pesanan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('Pesanan/masuk') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'masuk') ? 'active' : ''; ?>">
                <i class="fas fa-inbox nav-icon ml-3"></i>
                <p>Pesanan Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Pesanan/konfirmasi') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'konfirmasi') ? 'active' : ''; ?>">
                <i class="fas fa-check nav-icon ml-3"></i>
                <p>Pesanan Di Konfirmasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Pesanan/kemas') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'kemas') ? 'active' : ''; ?>">
                <i class="fas fa-box nav-icon ml-3"></i>
                <p>Pesanan Di Kemas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Pesanan/kirim') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'dikirim') ? 'active' : ''; ?>">
                <i class="fas fa-shipping-fast nav-icon ml-3"></i>
                <p>Pesanan Dikirim</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Pesanan/selesai') ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'selesai') ? 'active' : ''; ?>">
                <i class="fas fa-clipboard-check nav-icon ml-3"></i>
                <p>Pesanan Selesai</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Ulasan'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'Ulasan') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-star"></i>
            <p>Ulasan</p>
          </a>
        </li>

        <li class="nav-header">Pengaturan</li>

        <li class="nav-item">
          <a href="<?php echo base_url('User'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'User') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>Pelanggan</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('Laporan'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'Laporan') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Laporan</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">