<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('pengumuman', $data);
    }

    public function get_all()
    {
        return $this->db->get('pengumuman')->result_array();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where('pengumuman', ['id' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pengumuman', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengumuman');
    }
}
