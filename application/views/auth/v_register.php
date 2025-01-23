<div class="register-box">
    <div class="register-logo">
        <a href="<?= base_url('auth'); ?>"><b>Sistem Informasi & Manajemen RT</b></a>
    </div>
    <?= $this->session->flashdata('msg'); ?>
    <div class="register-box-body">
        <p class="register-box-msg">Registrasi Warga Baru</p>

        <?= form_open('auth/register_user'); ?>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nama lengkap" name="nama" value="<?= set_value('nama'); ?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirm">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <?= form_error('password_confirm', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
            <select class="form-control" name="jk">
                <option value="">Jenis Kelamin</option>
                <option value="L" <?= set_select('jk', 'L'); ?>>Laki-laki</option>
                <option value="P" <?= set_select('jk', 'P'); ?>>Perempuan</option>
            </select>
            <?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nomor HP" name="hp" value="<?= set_value('hp'); ?>">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            <?= form_error('hp', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
        </div>
        <?= form_close(); ?>
        <div class="text-center">
            <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
        </div>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
