<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('dashboard'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>RT</b></span>
        <!-- logo for regular state and mobile devices -->
        <small class="logo-lg">SIM - RT 003/008</small>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if ($user['jk'] == 'L') : ?>
                            <img src="<?= base_url('assets/'); ?>dist/img/male.svg" class="user-image" alt="User Image">
                        <?php else : ?>
                            <img src="<?= base_url('assets/'); ?>dist/img/female.svg" class="user-image" alt="User Image">
                        <?php endif; ?>
                        <span class="hidden-xs"><?= $user['nama']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php if ($user['jk'] == 'L') : ?>
                                <img src="<?= base_url('assets/'); ?>dist/img/male.svg" class="img-circle" alt="User Image">
                            <?php else : ?>
                                <img src="<?= base_url('assets/'); ?>dist/img/female.svg" class="img-circle" alt="User Image">
                            <?php endif; ?>

                            <p>
                                <?php if ($user['akses'] == 1) : ?>
                                    <?= $user['nama']; ?> - <?= 'Admin'; ?>
                                <?php else : ?>
                                    <?= $user['nama']; ?> - <?= 'Warga'; ?>
                                <?php endif; ?>
                                <small>Bergabung <?= date('d F Y', $user['dibuat']); ?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url('pengguna/myprofile'); ?>" class="btn btn-default btn-flat">biodata</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- =============================================== -->
