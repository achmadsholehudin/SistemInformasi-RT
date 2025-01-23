<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Surat extends CI_Model
{

    public function getAllSurat()
    {
        $this->db->select('*');
        return $this->db->from('tb_surat')
            ->get()
            ->result();
    }

    public function kirimSurat()
    {
        $data = array(
            'keperluan' => $this->input->post('keperluan', true),
            'nama' => $this->input->post('nama', true),
            'hari_tanggal' => $this->input->post('ht', true),
            'keterangan' => $this->input->post('keterangan', true),
            'alamat' => $this->input->post('alamat', true),
            'status' => 0,
        );
        $this->db->insert('tb_surat', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Berhasil Dikirim</div>');
        redirect('surat');
    }

    public function hapusSurat()
    {
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->delete('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Berhasil Hapus</div>');
        redirect('surat');
    }

    public function setujuSurat()
    {
        $data = array(
            'status' => 1
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Disetujui</div>');
        redirect('surat');
    }

    public function batalSurat()
    {
        $data = array(
            'status' => 0
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Dibatalkan</div>');
        redirect('surat');
    }

    public function filterSurat($start_date, $end_date)
{
    // Pastikan $start_date dan $end_date memiliki nilai sebelum digunakan
    if (!$start_date || !$end_date) {
        return array(); // Atau sesuaikan dengan penanganan kesalahan yang sesuai
    }

    // Ubah format input tanggal menjadi format yang sesuai dengan database
    $start_date_db = date('d F Y', strtotime($start_date));
    $end_date_db = date('d F Y', strtotime($end_date));

    // Lakukan query menggunakan format tanggal yang sudah diubah
    $this->db->where("STR_TO_DATE(hari_tanggal, '%d %M %Y') BETWEEN STR_TO_DATE('$start_date_db', '%d %M %Y') AND STR_TO_DATE('$end_date_db', '%d %M %Y')");
    $query = $this->db->get('tb_surat');
    return $query->result();
}
}

/* End of file M_Surat.php */
