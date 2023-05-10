<?php

class M_user extends CI_Model
{
    public function login($nama, $password, $table)
    {
        $this->db->where('nama', $nama);
        $this->db->where('password', $password);
        return $this->db->get($table);
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('rsv');
        $this->db->like('nama_pemesan', $keyword);
        $this->db->or_like('no_hp', $keyword);
        $this->db->or_like('nama_tamu', $keyword);
        $this->db->or_like('tipe_kamar', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('check_in', $keyword);
        $this->db->or_like('check_out', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get()->result();
    }
}
