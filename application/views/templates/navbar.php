<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo base_url('/assets/dist/img/logo.svg'); ?>" alt="Pressure Sampah Logo" height="60" width="60">
</div> -->

<nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto pb-2 justify-content-end">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                <div class="user-panel d-flex align-items-center">
                    <div class="image">
                        <img src="<?php echo base_url('assets/dist/img/PustakaProfile.png'); ?>" class="img-circle" alt="User Image" style="width: 35px; height: 35px; object-fit: cover;">
                    </div>
                    <div class="info">
                        <span class="d-block"><?php echo isset($data_admin['nama_admin']) ? $data_admin['nama_admin'] : ''; ?></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url('Auth/logout'); ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->