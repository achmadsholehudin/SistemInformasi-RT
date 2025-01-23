<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if ($user['jk'] == 'L') : ?>
                    <img src="<?= base_url('assets/'); ?>dist/img/male.svg" class="img-circle" alt="User Image">
                <?php else : ?>
                    <img src="<?= base_url('assets/'); ?>dist/img/female.svg" class="img-circle" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="pull-left info">
                <p><?= $user['nama']; ?></p>
                <?php if ($user['akses'] == 1) : ?>
                    <a href="#"><i class="fa fa-circle text-success"></i> <?= 'Admin'; ?></a>
                <?php else : ?>
                    <a href="#"><i class="fa fa-circle text-success"></i> <?= 'Warga'; ?></a>
                <?php endif; ?>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <?php if ($user['akses'] == 2) : ?>
                <li>
                    <a href="<?= base_url('dashboard'); ?>">
                        <i class="fa fa-inbox"></i> <span>Beranda</span>
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= base_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($user['akses'] == 2) : ?>
                <li>
                    <a href="<?= base_url('pengaduan/kirim'); ?>">
                        <i class="fa fa-bullhorn"></i> <span>Buat Pengaduan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('surat/kirim'); ?>">
                        <i class="fa fa-paper-plane"></i> <span>Buat Permohonan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('surat'); ?>">
                        <i class="fa fa-envelope"></i> <span>Status Permohonan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('pengaduan'); ?>">
                        <i class="fa fa-envelope"></i> <span>Status Pengaduan</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($user['akses'] == 1) : ?>
                <li>
                    <a href="<?= base_url('pengumuman'); ?>">
                        <i class="fa fa-bullhorn"></i> <span>Pengumuman</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('surat'); ?>">
                        <i class="fa fa-envelope"></i> <span>Permohonan Masuk</span>
                        <span class="pull-right-container">
                            <?php if (!$jumlah_surat) : ?>
                            <?php else : ?>
                                <span class="label label-danger">
                                    <?= $jumlah_surat; ?>
                                </span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('pengaduan'); ?>">
                        <i class="fa fa-envelope"></i> <span>Pengaduan Masuk</span>
                        <span class="pull-right-container">
                            <?php if (!$jumlah_pengaduan) : ?>
                            <?php else : ?>
                                <span class="label label-danger">
                                    <?= $jumlah_pengaduan; ?>
                                </span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($user['akses'] == 1) : ?>
                <li class="header">DATA</li>
                <li>
                    <a href="<?= base_url('pengguna'); ?>"><i class="fa fa-user-plus"></i> <span>Data Warga</span></a>
                </li>
            <?php endif; ?>
<?php if ($user['akses'] == 1) : ?>
	<li class="header">Laporan</li>
    <li>
        <a href="<?= base_url('laporan/permohonan'); ?>"><i class="fa fa-wheelchair"></i> <span>Laporan Permohonan</span></a>
    </li>
    <li>
        <a href="<?= base_url('laporan/pengaduan'); ?>"><i class="fa fa-wheelchair"></i> <span>Laporan Pengaduan</span></a>
    </li>
<?php endif; ?>

            <li class="header">PENGATURAN</li>
            <li>
                <a href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
