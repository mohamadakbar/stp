<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

    function getMhs(){
        return $this->db->get('mahasiswa')->result();
    }

    function mhsBynim($nim)
    {
        $this->db->select('amahasiswa.*, jurusan.nama_jurusan');
        $this->db->from('akses');
        $this->db->join('mahasiswa', 'mahasiswa.nim = akses.id_user');
        $this->db->join('jurusan', 'mahasiswa.jurusan = jurusan.id_jurusan');
        // $this->db->join('fakultas', 'mahasiswa.fakultas = fakultas.id_fakultas');
        $this->db->where('mahasiswa.nim', $nim);
        $query = $this->db->get()->result();
        return $query;
    }
    
    function getMhsByNim($nim){
        $this->db->select('akses.* , mahasiswa.*, jurusan.nama_jurusan, fakultas.nama_fakultas');
        $this->db->from('akses');
        $this->db->join('mahasiswa', 'mahasiswa.nim = akses.id_user');
        $this->db->join('jurusan', 'mahasiswa.jurusan = jurusan.id_jurusan');
        $this->db->join('fakultas', 'mahasiswa.fakultas = fakultas.id_fakultas');
        $this->db->where('mahasiswa.nim', $nim);
        $query = $this->db->get()->result();
        return $query;
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

    public function insertMhs($user, $akses)
    {
        $this->db->insert('mahasiswa', $user);
        $data_id	= $this->db->insert_id();

        $akses['id_user']	= $data_id;
        $this->db->insert('akses', $akses);
    
        return $insert_id = $this->db->insert_id();	
    }

    public function role($where)
    {
        
    }

}

/* End of file M_mahasiswa.php */
