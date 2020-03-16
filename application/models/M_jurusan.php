<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurusan extends CI_Model {

    public function getJurusan()
    {
        return $this->db->get('jurusan')->result();
    }

    public function getJurusanFak()
    {
        $this->db->select('jurusan.id_jurusan, jurusan.nama_jurusan, jurusan.deleted, fakultas.id_fakultas, fakultas.nama_fakultas, fakultas.akreditasi');
        $this->db->from('jurusan');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.id_fakultas');
        return $this->db->get()->result();
    }
    
    public function getJurusanById($where)
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->join('fakultas', 'fakultas.id_fakultas = jurusan.id_fakultas');
        $this->db->where('jurusan.id_jurusan', $where);
        return $this->db->get()->result();
    }

    public function getJurusanByFak($where) // untuk combobox mahasiswa
    {
        $this->db->where('id_fakultas', $where);
        return $this->db->get('jurusan')->result();
    }

    public function createJur($data)
    {
        $insert = $this->db->insert('jurusan', $data);
    }

    public function update($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

}

/* End of file M_jurusan.php */
