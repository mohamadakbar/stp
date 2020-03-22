<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {

    public function getDosen()
    {
        return $this->db->get('dosen')->result();
    }

    public function getDosenByid($id){
        $this->db->select('akses.* , dosen.*');
        $this->db->from('akses');
        $this->db->join('dosen', 'dosen.id_dosen = akses.id_user');
        $this->db->where('dosen.id_dosen', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getKelasW($where)
    {
        $this->db->select('*');
        $this->db->where('id_dosen', $where);
        return $this->db->get('dosen')->result();
    }

    public function createDosen($data)
    {
        $insert = $this->db->insert('dosen', $data);
    }

    public function update($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

    public function kode()
    {
        $this->db->select('RIGHT(akses.id_akses,2) as id_akses', FALSE);
        $this->db->order_by('id_akses', 'desc');
        $this->db->limit(1);
        $query	= $this->db->get('akses');

        if ($query->num_rows() <> 0) {
            $data 	= $query->row();
            $kode 	= intval($data->id_akses) + 1;
        }else{
            $kode	= 1;
        }

        $batas	= str_pad($kode, 2, "0", STR_PAD_LEFT);
        $kotam	= "AK".$batas;
        return $kotam;
    }

    public function insertDosen($user, $akses)
    {
        $this->db->insert('dosen', $user);
        $data_id	= $this->db->insert_id();

        $akses['id_user']	= $data_id;
        $this->db->insert('akses', $akses);
    
        return $insert_id = $this->db->insert_id();	
    }

}

/* End of file ModelName.php */
