<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('auth'); ?>"><b>Sistem Informasi & Manajemen RT</b></a>
    </div>
    <?= $this->session->flashdata('msg'); ?>
    <div class="login-box-body">
        <p class="login-box-msg">Login area</p>

        <?= form_open('auth/check_login'); ?>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Masukan Username..." name="username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Masukan Password..." name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div>
            <!-- /.col -->
        </div>
        <?= form_close(); ?>
        <div class="text-center">
            <a class="small" href="<?php echo base_url('auth/register'); ?>">Create an Account!</a>

        </div>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
