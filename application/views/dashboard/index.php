<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <?php if ($this->session->userdata('akses') == 1) : ?>
        <div class="row">
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $jumlah_pengaduan; ?></h3>

                        <p>PENGADUAN BELUM DISETUJUI</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    <a href="<?= base_url('pengaduan'); ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $jumlah_user; ?></h3>

                        <p>JUMLAH WARGA TERDAFTAR</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="<?= base_url('pengguna'); ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $jumlah_surat; ?></h3>

                        <p>PERMOHONAN BELUM DISETUJUI</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="<?= base_url('surat'); ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

    <?php endif; ?>
    <?php if ($this->session->userdata('akses') == 2) : ?>
        <div class="container">
            <div class="row">
                <?php foreach ($pengumuman as $p) :
                    // Ubah format tanggal menjadi tanggal-bulan-tahun
                    $tanggal = date('d-m-Y', strtotime($p['tanggal']));
                ?>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $p['judul']; ?></h3>
                            </div>
                            <div class="panel-body">
                                <img class="img-responsive" src="<?= base_url('uploads/' . $p['gambar']); ?>" alt="<?= $p['judul']; ?>" style="width:100%; height:auto;">
                                <p><?= $p['isi']; ?></p>
                                <small>Publisher: <?= $p['nama']; ?> - <?= $tanggal; ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <style>
            .panel-heading {
                background-color: #337ab7;
                /* Warna latar belakang header */
                color: #ffffff;
                /* Warna teks header */
            }

            .panel-body {
                background-color: #f5f5f5;
                /* Warna latar belakang body */
                color: #333333;
                /* Warna teks body */
                padding: 15px;
                /* Padding pada body */
            }

            .panel-body img {
                margin-bottom: 10px;
                /* Margin bawah pada gambar */
            }

            .panel-title {
                font-size: 1.25em;
                /* Ukuran font judul */
            }
        </style>
    <?php endif; ?>



</section>
<!-- /.content -->
