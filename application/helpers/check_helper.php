<?php

function check_is_login()
{
    $ci = get_instance();
    $data = $ci->session->userdata('id');
    if ($data == true) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = get_instance();
    $data = $ci->session->userdata('id');
    if (!$data) {
        $ci->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Login Terlebih Dahulu</div>');
        redirect('auth');
    }
}
