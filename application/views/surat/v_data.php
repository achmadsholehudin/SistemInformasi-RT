<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                                <th width="5%">No</th>
                                <th>Nama lengkap</th>
                                <th>Keperluan</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Alamat Domisili</th>
                                <th>Status</th>
                                <th>Profile</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($surat as $srt) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $srt->nama; ?></td>
                                        <td><?= $srt->keperluan; ?></td>
                                        <td><?= $srt->hari_tanggal; ?></td>
                                        <td><?= $srt->keterangan; ?></td>
                                        <td><?= $srt->alamat; ?></td>
                                        <?php if ($srt->status == 0) : ?>
                                            <td><span class="label label-danger">Belum disetujui</span></td>
                                        <?php else : ?>
                                            <td><span class="label label-success">Disetujui</span></td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="<?= base_url('surat/profile?id=' . $srt->id_surat); ?>" class="label label-primary"><i class="glyphicon glyphicon-user"></i> Profile</a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('surat/hapus?id=' . $srt->id_surat); ?>" class="label label-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            <?php if ($srt->status == 0) : ?>
                                                <a href="<?= base_url('surat/setuju?id=' . $srt->id_surat); ?>" class="label label-success" onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</a>
                                            <?php else : ?>
                                                <a href="<?= base_url('surat/batal?id=' . $srt->id_surat); ?>" class="label label-warning"><i class="fa fa-undo"></i> Batal</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
