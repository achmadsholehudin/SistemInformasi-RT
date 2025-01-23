<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <?= form_open_multipart('pengguna/edit?id=' . $get['id_user']); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama">Nama Pengguna</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $get['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $get['username']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="text" name="hp" id="hp" class="form-control" value="<?= $get['hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" value="<?= $get['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="kk">KK</label>
                        <input type="text" name="kk" id="kk" class="form-control" value="<?= $get['kk']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat saat ini</label>
                        <textarea name="alamat" id="alamat" class="form-control" style="width: 100%;" rows="3"><?= $get['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <?php if ($get['jk'] == 'L') : ?>
                                <option value="L" selected>Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            <?php else : ?>
                                <option value="P" selected>Perempuan</option>
                                <option value="L">Laki - Laki</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="akses">Akses</label>
                        <select name="akses" id="akses" class="form-control">
                            <?php foreach ($akses as $aks) : ?>
                                <?php if ($get['akses'] == $aks->akses_id) : ?>
                                    <option value="<?= $aks->akses_id; ?>" selected><?= $aks->akses; ?></option>
                                <?php else : ?>
                                    <option value="<?= $aks->akses_id; ?>"><?= $aks->akses; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ktp">Upload KTP</label>
                        <input type="file" class="form-control" id="ktp" name="ktp">
                        <?php if ($get['ktp']) : ?>
                            <a href="<?= base_url('uploads/' . $get['ktp']) ?>" data-fancybox="gallery">
                                <img src="<?= base_url('uploads/' . $get['ktp']) ?>" style="width: 120px; height: 75px;margin:5px;">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="kk_foto">Upload KK</label>
                        <input type="file" class="form-control" id="kk_foto" name="kk_foto">
                        <?php if ($get['kk_foto']) : ?>
                            <a href="<?= base_url('uploads/' . $get['kk_foto']) ?>" data-fancybox="gallery">
                                <img src="<?= base_url('uploads/' . $get['kk_foto']) ?>" style="width: 120px; height: 75px;margin:5px;">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</section>
