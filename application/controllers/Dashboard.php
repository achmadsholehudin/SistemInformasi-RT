<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Pengumuman_model');
    }

    private function _user()
    {

        $this->db->select('*');
        return $this->db->from('tb_user')
            ->join('tb_akses', 'tb_user.akses=tb_akses.akses_id')
            ->get()
            ->row_array();
    }

    public function _jumlah_user()
    {
        return $this->db->count_all('tb_user');
    }
    public function _total_pengaduan()
    {
        return $this->db->count_all('tb_pengaduan');
    }

    public function _total_surat()
    {
        return $this->db->count_all('tb_surat');
    }

	public function _jumlah_surat()
	{
		$this->db->where('status', 0);
		return $this->db->count_all_results('tb_surat');
	}
	
	public function _jumlah_pengaduan()
	{
		$this->db->where('status', 0);
		return $this->db->count_all_results('tb_pengaduan');
	}

    public function index()
    {
        $this->load->library('calendar');
        $session = $this->session->userdata('id');
        if ($this->session->userdata('akses') == 2) {
            $data = array(
                'title' => 'Halaman Utama',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_user' => $this->_jumlah_user(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
                'jumlah_surat' => $this->_jumlah_surat(),
                'kalender' => $this->calendar->generate(),
                'pengumuman' => $this->Pengumuman_model->get_all()



            );
        } else {
            $data = array(
                'title' => 'Halaman Dashboard',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_user' => $this->_jumlah_user(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
                'jumlah_surat' => $this->_jumlah_surat(),
                'kalender' => $this->calendar->generate()
            );
        }
        $this->load->view('templates/dashboard/v_header', $data);
        $this->load->view('templates/dashboard/v_navbar', $data);
        $this->load->view('templates/dashboard/v_sidebar', $data);
        $this->load->view('templates/dashboard/v_crumb', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/dashboard/v_footer', $data);
    }
}
        
    /* End of file  Dashboard.php */
