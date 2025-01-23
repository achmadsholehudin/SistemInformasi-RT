<?php
class M_main extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_pengumuman()
    {
        $query = $this->db->get('pengumuman');
        return $query->result_array();
    }
}
