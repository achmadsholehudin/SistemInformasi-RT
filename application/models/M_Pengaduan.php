<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengaduan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

	public function getAllSurat()
    {
        $this->db->select('*');
        return $this->db->from('tb_pengaduan')
            ->get()
            ->result();
    }

    public function getAllPengaduan()
    {
        return $this->db->get('tb_pengaduan')->result();
    }

    public function filterPengaduan($start_date, $end_date)
{
    // Pastikan $start_date dan $end_date memiliki nilai sebelum digunakan
    if (!$start_date || !$end_date) {
        return array(); // Atau sesuaikan dengan penanganan kesalahan yang sesuai
    }

    // Ubah format input tanggal menjadi format yang sesuai dengan database
    $start_date_db = date('d F Y', strtotime($start_date));
    $end_date_db = date('d F Y', strtotime($end_date));

    // Lakukan query menggunakan format tanggal yang sudah diubah
	// $this->db->select('id_pengaduan, nama, keperluan, hari_tanggal, keterangan, alamat');
	$this->db->where("STR_TO_DATE(hari_tanggal, '%d %M %Y') BETWEEN STR_TO_DATE('$start_date_db', '%d %M %Y') AND STR_TO_DATE('$end_date_db', '%d %M %Y')");
    $query = $this->db->get('tb_pengaduan');
    return $query->result();
}


    public function countPengaduan($start_date, $end_date)
    {
        $this->db->select('COUNT(id_pengaduan) as total_pengaduan');
        $this->db->from('tb_pengaduan');
        $this->db->where('hari_tanggal >=', $start_date);
        $this->db->where('hari_tanggal <=', $end_date);
        $query = $this->db->get();
        return $query->row()->total_pengaduan;
    }


    public function kirimSurat()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'hari_tanggal' => $this->input->post('ht', true),
            'keterangan' => $this->input->post('keterangan', true),
            'status' => 0,
        );

        // Handle file upload
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['file_name'] = 'pengaduan_' . $this->session->userdata('id');

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $data['gambar'] = $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>' . $this->upload->display_errors() . '</div>');
                redirect('pengaduan/kirim');
            }
        }

        $this->db->insert('tb_pengaduan', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengaduan Berhasil Dikirim</div>');
        redirect('pengaduan');
    }

    public function hapusSurat()
    {
        $this->db->where('id_pengaduan', $this->input->get('id'));
        $this->db->delete('tb_pengaduan');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengaduan Berhasil Dihapus</div>');
        redirect('pengaduan');
    }

    public function setujuSurat()
    {
        $data = array(
            'status' => 1
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_pengaduan', $this->input->get('id'));
        $this->db->update('tb_pengaduan');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengaduan Disetujui</div>');
        redirect('pengaduan');
    }

    public function batalSurat()
    {
        $data = array(
            'status' => 0
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_pengaduan', $this->input->get('id'));
        $this->db->update('tb_pengaduan');
        $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengaduan Dibatalkan</div>');
        redirect('pengaduan');
    }
}
