<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_main');
    }

    public function index()
    {
        $data['pengumuman'] = $this->M_main->get_all_pengumuman();
        $this->load->view('main/index', $data);
    }
}
