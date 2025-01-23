<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');
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
        // Load user data from session or database
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Buat Pengumuman',
            'subtitle' => 'Pengumuman',
            'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
            'jumlah_surat' => $this->_jumlah_surat(),
            'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
            'pengumuman' => $this->Pengumuman_model->get_all()

        );

        // Load views with the user data
        $this->load->view('templates/dashboard/v_header', $data);
        $this->load->view('templates/dashboard/v_navbar', $data);
        $this->load->view('templates/dashboard/v_sidebar', $data);
        $this->load->view('templates/dashboard/v_crumb', $data);
        $this->load->view('pengumuman/p_data', $data);
        $this->load->view('templates/dashboard/v_footer');
    }

    public function kirim()
    {
        $this->form_validation->set_rules('nama', 'nama Publikasi', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi Pengumuman', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Publikasi', 'required');

        $session = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('tb_user', ['id_user' => $session])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'tanggal' => $this->input->post('tanggal')
            ];

            if (!empty($_FILES['gambar']['name'])) {
                $upload = $this->do_upload();
                if ($upload['status']) {
                    $data['gambar'] = $upload['file_name'];
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $upload['error'] . '</div>');
                    redirect('pengumuman');
                }
            }

            $this->Pengumuman_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Pengumuman berhasil dikirim!</div>');
            redirect('pengumuman');
        }
    }

    private function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            return ['status' => FALSE, 'error' => $this->upload->display_errors()];
        } else {
            return ['status' => TRUE, 'file_name' => $this->upload->data('file_name')];
        }
    }
    public function edit($id)
    {
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'edit Pengumuman',
            'subtitle' => 'Pengumuman',
            'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
            'jumlah_surat' => $this->_jumlah_surat(),
            'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
            'pengumuman' => $this->Pengumuman_model->get_by_id($id),


        );


        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi Pengumuman', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Publikasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('pengumuman/p_edit', $data);
            $this->load->view('templates/dashboard/v_footer');
        } else {
            $update_data = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'tanggal' => $this->input->post('tanggal')
            ];

            if (!empty($_FILES['gambar']['name'])) {
                $upload = $this->do_upload();
                if ($upload['status']) {
                    $update_data['gambar'] = $upload['file_name'];
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $upload['error'] . '</div>');
                    redirect('pengumuman/edit/' . $id);
                }
            }

            $this->Pengumuman_model->update($id, $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Pengumuman berhasil diupdate!</div>');
            redirect('pengumuman');
        }
    }

    public function delete($id)
    {
        $this->Pengumuman_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Pengumuman berhasil dihapus!</div>');
        redirect('pengumuman');
    }
}
