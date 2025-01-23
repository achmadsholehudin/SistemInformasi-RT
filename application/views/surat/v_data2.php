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
                <div class="alert alert-info" style="margin: 20px;" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Jika status <span class="label label-success">Disetujui</span> maka surat pengantar sudah bisa di ambil.
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
                                <th>Alamat</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($main as $srt) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $srt->nama; ?></td>
                                        <td><?= $srt->keperluan; ?></td>
                                        <td><?= $srt->hari_tanggal; ?></td>
                                        <td><?= $srt->keterangan; ?></td>
                                        <td><?= $srt->alamat; ?></td>
                                        <?php if ($srt->status == 0) : ?>
                                            <td><span class="label label-danger">Belum Disetujui</span></td>
                                        <?php else : ?>
                                            <td><span class="label label-success">Disetujui</span></td>
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
