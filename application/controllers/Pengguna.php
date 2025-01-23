<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('M_Pengguna', 'pengguna');
    }

    private function _user()
    {
        // join 3 table 
        $this->db->select('*');
        return $this->db->from('tb_user')
            ->join('tb_akses', 'tb_user.akses=tb_akses.akses_id')
            ->get()
            ->row_array();
    }

    public function _jumlah_surat()
    {
        return $this->db->count_all('tb_surat');
    }
    public function _jumlah_pengaduan()
    {
        return $this->db->count_all('tb_pengaduan');
    }

    private function _akses()
    {
        return $this->db->get('tb_akses')->result();
    }

    public function index()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Data Warga',
                'subtitle' => 'Master',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'getall_pengguna' => $this->pengguna->getAllPengguna(),
                'jumlah_surat' => $this->_jumlah_surat(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('pengguna/v_data', $data);
            $this->load->view('templates/dashboard/v_footer');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Tambah Pengguna',
                'subtitle' => 'Master',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'akses' => $this->_akses(),
                'jumlah_surat' => $this->_jumlah_surat()
            );
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
            $this->form_validation->set_rules('akses', 'Akses', 'required|trim');
            $this->form_validation->set_rules('hp', 'Hp', 'required|trim|numeric');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dashboard/v_header', $data);
                $this->load->view('templates/dashboard/v_navbar', $data);
                $this->load->view('templates/dashboard/v_sidebar', $data);
                $this->load->view('templates/dashboard/v_crumb', $data);
                $this->load->view('pengguna/v_add', $data);
                $this->load->view('templates/dashboard/v_footer');
            } else {
                $this->pengguna->tambahPengguna();
            }
        }
    }

    public function edit()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Edit data warga',
                'subtitle' => 'Master',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'akses' => $this->_akses(),
                'get' => $this->pengguna->getPenggunaById(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
                'jumlah_surat' => $this->_jumlah_surat()
            );
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('hp', 'Nomor hp', 'required|trim|numeric');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
            $this->form_validation->set_rules('akses', 'Akses', 'required|trim');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dashboard/v_header', $data);
                $this->load->view('templates/dashboard/v_navbar', $data);
                $this->load->view('templates/dashboard/v_sidebar', $data);
                $this->load->view('templates/dashboard/v_crumb', $data);
                $this->load->view('pengguna/v_edit', $data);
                $this->load->view('templates/dashboard/v_footer');
            } else {
                $this->pengguna->editPengguna();
            }
        }
    }

    public function myprofile()
    {
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Edit biodata',
            'subtitle' => 'Master',
            'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
            'akses' => $this->_akses(),
            'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
            'jumlah_surat' => $this->_jumlah_surat()
        );
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('hp', 'Nomor Hp', 'required|trim|numeric');
        $this->form_validation->set_rules('nik', 'Nomor NIK', 'required|trim|numeric');
        $this->form_validation->set_rules('kk', 'Nomor KK', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('pengguna/v_myprofile', $data);
            $this->load->view('templates/dashboard/v_footer');
        } else {
            $this->pengguna->editProfile();
        }
    }

    public function edit_password()
    {
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Edit data',
            'subtitle' => 'Master',
            'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
            'akses' => $this->_akses(),
            'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
            'jumlah_surat' => $this->_jumlah_surat()
        );
        $this->form_validation->set_rules('cp', 'Password sekarang', 'required|trim');
        $this->form_validation->set_rules('np', 'Password baru', 'required|trim|min_length[4]|matches[np2]');
        $this->form_validation->set_rules('np2', 'Konfirmasi password', 'required|trim|matches[np]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('pengguna/v_myprofile', $data);
            $this->load->view('templates/dashboard/v_footer');
        } else {
            $cp = $this->input->post('cp');
            $np = $this->input->post('np');
            if (!password_verify($cp, $data['user']['password'])) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>Password yang anda masukan salah</div>');
                redirect('pengguna/edit_password');
            } else {
                if ($np == $cp) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>Password baru tidak boleh sama dengan yang lama</div>');
                    redirect('pengguna/edit_password');
                } else {
                    $new = password_hash($np, PASSWORD_DEFAULT);
                    $this->db->set('password', $new);
                    $this->db->where('id_user', $this->session->userdata('id'));
                    $this->db->update('tb_user');
                    $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>Password berhasil diubah</div>');
                    redirect('pengguna/edit_password');
                }
            }
        }
    }

    public function hapus()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->pengguna->hapusPengguna();
        }
    }
}
        
    /* End of file  Pengguna.php */
