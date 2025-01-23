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
                                <th>Isi Aduan</th>
                                <th>Lampiran Gambar</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
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
                                            <td><span class="label label-warning">Dalam Proses</span></td>
                                        <?php else : ?>
                                            <td><span class="label label-success">Telah Dikonfirmasi</span></td>
                                        <?php endif; ?>
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
