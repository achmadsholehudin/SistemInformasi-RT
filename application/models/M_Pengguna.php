<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengguna extends CI_Model
{

    public function getAllPengguna()
    {
        $this->db->select('*');
        return $this->db->from('tb_user')
            ->join('tb_akses', 'tb_user.akses=tb_akses.akses_id')
            ->get()
            ->result();
    }

    public function tambahPengguna()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'hp' => $this->input->post('hp', true),
            'jk' => $this->input->post('jk', true),
            'akses' => $this->input->post('akses', true),
            'dibuat' => time(),
        );
        $this->db->insert('tb_user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna Ditambahkan</div>');
        redirect('pengguna');
    }

    public function editPengguna()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'hp' => $this->input->post('hp', true),
            'jk' => $this->input->post('jk', true),
            'akses' => $this->input->post('akses', true),
            'nik' => $this->input->post('nik', true),
            'kk' => $this->input->post('kk', true),
            'alamat' => $this->input->post('alamat', true),
        );
        $this->db->where('id_user', $this->input->get('id'));
        $this->db->update('tb_user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna Diubah</div>');
        redirect('pengguna');
    }

    public function hapusPengguna()
    {
        $this->db->where('id_user', $this->input->get('id'));
        $this->db->delete('tb_user');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna Dihapus</div>');
        redirect('pengguna');
    }

    public function getPenggunaById()
    {
        return $this->db->get_where('tb_user', ['id_user' => $this->input->get('id')])->row_array();
    }

    public function editProfile()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'jk' => $this->input->post('jk', true),
            'hp' => $this->input->post('hp', true),
            'nik' => $this->input->post('nik', true),
            'kk' => $this->input->post('kk', true),
            'alamat' => $this->input->post('alamat', true),
        );

        // Handle file upload
        if (!empty($_FILES['ktp']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['file_name'] = 'ktp_' . $this->session->userdata('id');

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ktp')) {
                $uploadData = $this->upload->data();
                $data['ktp'] = $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>' . $this->upload->display_errors() . '</div>');
                redirect('pengguna/myprofile');
            }
        }

        $this->db->where('id_user', $this->session->userdata('id'));
        $this->db->update('tb_user', $data);

        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>Data berhasil diupdate</div>');
        redirect('pengguna/myprofile');
    }
}
                        
/* End of file M_Pengguna.php */
