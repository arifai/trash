<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="Limbahku Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Limbahku</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('dist/img/dummy-user.png') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-capitalize"><?= session()->get('full_name') ?? 'anonymous' ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php $uri = service('uri') ?>
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($uri->getSegment(1) == 'dashboard') ? 'active' : null ?>">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if (session()->get('role_level_id') == 1) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('user') ?>" class="nav-link <?= ($uri->getSegment(1) == 'user') ? 'active' : null ?>">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Data Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('trashes') ?>" class="nav-link <?= ($uri->getSegment(1) == 'trashes') ? 'active' : null ?>">
                            <i class="nav-icon fa fa-trash"></i>
                            <p>Data Limbah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('trash/out') ?>" class="nav-link <?= ($uri->getSegment(2) == 'out') ? 'active' : null ?>">
                            <i class="nav-icon fa fa-minus-circle"></i>
                            <p>Data Limbah Keluar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('history') ?>" class="nav-link <?= ($uri->getSegment(1) == 'history') ? 'active' : null ?>">
                            <i class="nav-icon fa fa-history"></i>
                            <p>Riwayat</p>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('trashes') ?>" class="nav-link <?= ($uri->getSegment(1) == 'trashes') ? 'active' : null ?>">
                            <i class="nav-icon fa fa-trash"></i>
                            <p>Data Limbah</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (session()->get('isLoggedIn')) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('logout') ?>" class="nav-link">
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                            <p>Keluar</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>