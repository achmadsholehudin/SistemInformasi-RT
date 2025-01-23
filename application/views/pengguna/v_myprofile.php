<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <div class="alert alert-warning" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Harap isi dan lengkapi biodata dengan benar!
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= form_open_multipart('pengguna/myprofile'); ?>
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <?php if ($user['jk'] == 'L') : ?>
                                <option value="L" selected>Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            <?php else : ?>
                                <option value="P" selected>Perempuan</option>
                                <option value="L">Laki - Laki</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="hp">Nomor HP</label>
                        <input type="text" name="hp" id="hp" class="form-control" value="<?= $user['hp']; ?>">
                    </div>
                    <hr style="border-top: 2px solid grey;width: 100%;">
                    <div class="form-group col-md-6">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" pattern="\d{16}" placeholder="16 digit" value="<?= $user['nik']; ?>" required>
                        <?= form_error('nik', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kk">KK</label>
                        <input type="text" class="form-control" id="kk" name="kk" pattern="\d{16}" placeholder="16 digit" value="<?= $user['kk']; ?>" required>
                        <?= form_error('kk', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ktp">Upload KTP</label>
                        <input type="file" class="form-control" id="ktp" name="ktp">
                        <a href="<?= base_url('uploads/' . $user['ktp']) ?>" data-fancybox="gallery">
                            <img src="<?= base_url('uploads/' . $user['ktp']) ?>" style="width: 120px; height: 75px;margin:5px;">
                        </a>
                        <?= form_error('ktp', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kk_foto">Upload KK</label>
                        <input type="file" class="form-control" id="kk_foto" name="kk_foto">
                        <?php if ($user['kk_foto']) : ?>
                            <a href="<?= base_url('uploads/' . $user['kk_foto']) ?>" data-fancybox="gallery">
                                <img src="<?= base_url('uploads/' . $user['kk_foto']) ?>" style="width: 120px; height: 75px;margin:5px;">
                            </a>
                        <?php else : ?>
                            <p>Gambar KK tidak tersedia</p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="alamat">Alamat Domisili</label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="29" rows="3"><?= $user['alamat']; ?></textarea>
                        <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <!-- Kolom edit password -->
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        Edit Password
                    </div>
                </div>
                <div class="box-body">
                    <?= form_open('pengguna/edit_password'); ?>
                    <div class="form-group">
                        <label for="cp">Password Saat Ini</label>
                        <input type="password" name="cp" id="cp" class="form-control">
                        <?= form_error('cp', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="np">Password Baru</label>
                        <input type="password" name="np" id="np" class="form-control">
                        <?= form_error('np', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="np2">Konfirmasi Password Baru</label>
                        <input type="password" name="np2" id="np2" class="form-control">
                        <?= form_error('np2', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
