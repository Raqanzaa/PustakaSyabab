<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-2">
  <!-- Brand Logo -->
  <div class="brand-link py-3">
    <img src="<?php echo base_url('assets/dist/img/PustakaSyabab.png'); ?>" alt="AdminLTE Logo" class="brand-image ml-4">
    <span class="brand-text ml-1">Pustaka Syabab</span>
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
          <a href="<?php echo base_url('Dashboard'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-header">Kelola Produk</li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i> <!-- Ikon kategori -->
              <p>
                Kategori
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-layer-group nav-icon ml-3"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-layer-group nav-icon ml-3"></i>
                  <p>Sub Kategori</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i> <!-- Ikon buku -->
              <p>
                Buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-plus nav-icon ml-3"></i> <!-- Ikon tambah buku -->
                  <p>Tambah Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-edit nav-icon ml-3"></i> <!-- Ikon kelola buku -->
                  <p>Kelola Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-warehouse nav-icon ml-3"></i> <!-- Ikon stok buku -->
                  <p>Stok Buku</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-images"></i> <!-- Ikon slider -->
              <p>
                Slider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-plus nav-icon ml-3"></i> <!-- Ikon tambah slider -->
                  <p>Tambah Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-edit nav-icon ml-3"></i> <!-- Ikon kelola slider -->
                  <p>Kelola Slider</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-header">Kelola Pesanan</li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i> <!-- Ikon pesanan -->
              <p>
                Pesanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-inbox nav-icon ml-3"></i> <!-- Ikon pesanan masuk -->
                  <p>Pesanan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-check nav-icon ml-3"></i> <!-- Ikon pesanan dikonfirmasi -->
                  <p>Pesanan Di Konfirmasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-box nav-icon ml-3"></i> <!-- Ikon pesanan dikemas -->
                  <p>Pesanan Di Kemas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-shipping-fast nav-icon ml-3"></i> <!-- Ikon pesanan dikirim -->
                  <p>Pesanan Dikirim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fas fa-clipboard-check nav-icon ml-3"></i> <!-- Ikon pesanan selesai -->
                  <p>Pesanan Selesai</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Pengaturan</li>

          <li class="nav-item">
          <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i> <!-- Ikon laporan -->
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
