<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('public/dist/img/computer.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">Alfa Computer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('public/dist/img/eren.png'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['username']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>pakar/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-keyboard"></i>
                        <p>
                            Data Gejala
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>gejala" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gejala</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>nilai_cf" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nilai CF</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('kerusakan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-desktop"></i>
                        <p>
                            Data Kerusakan
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pakar/ganti_password') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-key"></i>
                        <p>
                            Ganti Password
                        </p>
                    </a>
                    <hr class="sidebar-divider my-3 bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pakar/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <hr class="sidebar-divider my-0">
                </li>
                <i class="nav-icon far fa-circle text-stripped text-center"></i>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>