<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('M_Pengaduan', 'surat');
        $this->load->library('form_validation');
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
        if ($this->session->userdata('akses') == 2) {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Status Pengaduan',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $data['aduan'] = $this->db->get_where('tb_pengaduan', ['nama' => $data['user']['nama']])->result();
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('pengaduan/p_data2', $data);
            $this->load->view('templates/dashboard/v_footer');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Pengaduan masuk',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'surat' => $this->surat->getAllSurat(),
                'aduan' => $this->surat->getAllSurat(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('pengaduan/p_data', $data);
            $this->load->view('templates/dashboard/v_footer');
        }
    }

    public function kirim()
    {
        if ($this->session->userdata('akses') == 1) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Buat Pengaduan',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim|min_length[5]');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dashboard/v_header', $data);
                $this->load->view('templates/dashboard/v_navbar', $data);
                $this->load->view('templates/dashboard/v_sidebar', $data);
                $this->load->view('templates/dashboard/v_crumb', $data);
                $this->load->view('pengaduan/p_kirim', $data);
                $this->load->view('templates/dashboard/v_footer');
            } else {
                $this->surat->kirimSurat();
            }
        }
    }

    private function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 20048; // 2MB
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            return ['status' => FALSE, 'error' => $this->upload->display_errors()];
        } else {
            return ['status' => TRUE, 'file_name' => $this->upload->data('file_name')];
        }
    }

    public function lihat()
    {
        if ($this->session->userdata('akses') == 1) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Lihat Surat',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_lihat', $data);
            $this->load->view('templates/dashboard/v_footer');
        }
    }

    public function hapus()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->hapusSurat();
        }
    }

    public function setuju()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->setujuSurat();
        }
    }

    public function batal()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->batalSurat();
        }
    }
}
        
    /* End of file  Surat.php */
