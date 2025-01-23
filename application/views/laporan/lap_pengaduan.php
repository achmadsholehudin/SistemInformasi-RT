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
                    <form method="get" action="<?= base_url('laporan/pengaduan'); ?>" class="form-inline">
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= isset($start_date) ? $start_date : ''; ?>">
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="end_date">Tanggal Akhir:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?= isset($end_date) ? $end_date : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    <br>
                    <div>
                        <i>*silahkan pilih tanggal untuk menampilkan data</i>
                    </div>
                    <br>

                    <?php if (isset($start_date) && isset($end_date)): ?>
                        <p>Per tanggal: <?= date('d F Y', strtotime($start_date)) ?> - <?= date('d F Y', strtotime($end_date)) ?></p>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                                <th width="5%">No</th>
                                <th>Nama lengkap</th>
                                <th>Hari/Tanggal</th>
                                <th>Keterangan</th>
                                <th>Gambar</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengaduan as $aduan) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $aduan->nama; ?></td>
                                        <td><?= date('d F Y', strtotime($aduan->hari_tanggal)); ?></td>
                                        <td><?= $aduan->keterangan; ?></td>
                                        <td>
                                            <img src="<?= base_url('uploads/' . (isset($aduan->gambar) ? $aduan->gambar : 'default.jpg')) ?>" style="width: 120px; height: 75px; margin: 5px;">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary" id="printBtn">Print</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('printBtn').addEventListener('click', function() {
        var start_date = document.getElementById('start_date').value;
        var end_date = document.getElementById('end_date').value;
        var url = '<?= base_url('laporan/print_pengaduan'); ?>?start_date=' + start_date + '&end_date=' + end_date;
        window.open(url, '_blank');
    });
</script>
