<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {

    public function getKelas()
    {
        return $this->db->get('kelas')->result();
    }

    public function getKelasW($where)
    {
        $this->db->select('*');
        $this->db->where('id_kelas', $where);
        return $this->db->get('kelas')->result();
    }

    public function createKelas($data)
    {
        $insert = $this->db->insert('kelas', $data);
    }

    public function update($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

}

/* End of file ModelName.php */
