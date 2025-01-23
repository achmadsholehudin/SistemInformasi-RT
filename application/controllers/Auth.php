<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Auth', 'auth');
	}

	public function index()
	{
		check_is_login();
		$data = array('title' => 'Halaman Login');
		$this->load->view('templates/auth/v_header', $data);
		$this->load->view('auth/v_login', $data);
		$this->load->view('templates/auth/v_footer', $data);
	}
	public function check_login()
	{
		check_is_login();
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			redirect('auth');
		} else {
			$this->auth->login();
		}
	}
	public function register()
	{
		check_is_login();
		$data = array('title' => 'Halaman Register');
		$this->load->view('templates/auth/v_header', $data);
		$this->load->view('auth/v_register', $data);
		$this->load->view('templates/auth/v_footer', $data);
	}

	public function register_user()
	{
		check_is_login();
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('hp', 'Nomor HP', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->register();
		} else {
			if ($this->auth->register()) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>Registrasi Berhasil. Silakan login.</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>Registrasi Gagal. Silakan coba lagi.</div>');
				redirect('auth/register');
			}
		}
	}


	public function logout()
	{
		$this->auth->logout();
	}
}
