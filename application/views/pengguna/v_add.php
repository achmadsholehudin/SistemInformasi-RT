<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <?= form_open('pengguna/tambah'); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama">Nama Pengguna *</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                        <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas *</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="">-- Pilih Kelas --</option>
                            <?php foreach ($kelas as $kls) : ?>
                                <option value="<?= $kls->id_kelas; ?>"><?= $kls->kelas; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kelas', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin *</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <?= form_error('jk', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                        <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="text" name="hp" id="hp" class="form-control" autocomplete="off">
                        <?= form_error('hp', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="akses">Akses</label>
                        <select name="akses" id="akses" class="form-control">
                            <option value="">-- Pilih Akses --</option>
                            <?php foreach ($akses as $x) : ?>
                                <option value="<?= $x->akses_id; ?>"><?= $x->akses; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('akses', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Tambah</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</section>