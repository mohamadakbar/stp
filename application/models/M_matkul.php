<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model {

    public function getMatkul()
    {
        $this->db->select('mata_kuliah.deleted, mata_kuliah.id_matkul, mata_kuliah.nama_matkul, mata_kuliah.sks, dosen.nama_dosen');
        $this->db->from('mata_kuliah');
        $this->db->join('dosen', 'mata_kuliah.id_dosen = dosen.id_dosen');
        $query = $this->db->get();
        return $query->result();
    }

    public function createMatkul($data)
    {
        $insert = $this->db->insert('mata_kuliah', $data);
    }

    public function edit($where)
    {
        $this->db->select('mata_kuliah.id_matkul, mata_kuliah.nama_matkul, mata_kuliah.sks, dosen.id_dosen, dosen.nama_dosen');
        $this->db->from('mata_kuliah');
        $this->db->join('dosen', 'mata_kuliah.id_dosen = dosen.id_dosen');
        $this->db->where('mata_kuliah.id_matkul', $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function update($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

    public function delete($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

}

/* End of file ModelName.php */
