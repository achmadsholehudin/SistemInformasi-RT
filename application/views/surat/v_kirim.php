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
                    <?= form_open('surat/kirim'); ?>
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <select class="form-control" id="keperluan" name="keperluan">
							<option value="Pembuatan SKTM">Pembuatan SKTM</option>
                            <option value="Pindah Domisi">Pindah Domisi</option>
                            <option value="Pembuatan KK">Pembuatan KK</option>
                            <option value="Pembuatan KTP">Pembuatan KTP</option>
                            <option value="Pembuatan Akta Kelahiran">Pembuatan Akta Kelahiran</option>
                            <option value="Surat Numpang Nikah">Surat Numpang Nikah</option>
                            <option value="Pengantar Cerai">Pengantar Cerai</option>
                            <option value="Izin Usaha">Izin Usaha</option>
                            <option value="Pendaftaran Sekolah">Pendafaran Sekolah</option>
							<option value="Izin Usaha">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ht">Tanggal</label>
                        <input type="text" name="ht" id="ht" class="form-control" value="<?= date('d F Y', time()); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
                        <?= form_error('keterangan', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                        <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Kirim</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
