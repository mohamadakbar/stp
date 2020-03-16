<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fakultas extends CI_Model {

    public function getFakultas()
    {
        return $this->db->get('fakultas')->result();
    }

    public function createFak($data)
    {
        $insert = $this->db->insert('fakultas', $data);
    }

    public function getById($where)
    {
        $this->db->select('*');
        $this->db->where('id_fakultas', $where);
        return $this->db->get('fakultas')->result();
    }

    public function update($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

}

/* End of file M_fakultas.php */
