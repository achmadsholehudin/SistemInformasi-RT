<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= form_open_multipart('pengaduan/kirim'); ?>
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ht">Tanggal</label>
                        <input type="text" name="ht" id="ht" class="form-control" value="<?= date('d F Y', time()); ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
                        <?= form_error('keterangan', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gambar">Upload Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Kirim</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
