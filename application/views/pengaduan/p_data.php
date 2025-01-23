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
                                <th>Hari/Tanggal</th>
                                <th>Keterangan</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (!empty($aduan)) : ?>
                                    <?php foreach ($aduan as $srt) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $srt->nama; ?></td>
                                            <td><?= $srt->hari_tanggal; ?></td>
                                            <td><?= $srt->keterangan; ?></td>
                                            <td>
                                                <img src="<?= base_url('uploads/' . (isset($srt->gambar) ? $srt->gambar : 'default.jpg')) ?>" style="width: 120px; height: 75px; margin: 5px;">
                                                <?= form_error('gambar', '<small class="form-text text-danger">', '</small>'); ?>
                                            </td>
                                            <?php if ($srt->status == 0) : ?>
                                                <td><span class="label label-warning">proses</span></td>
                                            <?php else : ?>
                                                <td><span class="label label-success">confirmated</span></td>
                                            <?php endif; ?>
                                            <td>
                                                <a href="<?= base_url('pengaduan/hapus?id=' . $srt->id_pengaduan); ?>" class="label label-danger" onclick="return confirm('Yakin Ingin Menghapus Pengaduan Ini');"><i class="fa fa-trash"></i> Hapus</a>                                                <?php if ($srt->status == 0) : ?>
                                                    <a href="<?= base_url('pengaduan/setuju?id=' . $srt->id_pengaduan); ?>" class="label label-success" onclick="return confirm('Yakin Ingin Menyetujui Pengaduan Ini');"><i class="fa fa-check"></i> Setuju</a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('pengaduan/batal?id=' . $srt->id_pengaduan); ?>" class="label label-warning"><i class="fa fa-undo"></i> Batal</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="7">No data available</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
