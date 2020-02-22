<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwalK extends CI_Model {

    public function getJadwalK()
    {
        $this->db->select('mata_kuliah.nama_matkul, dosen.nama_dosen');
        $this->db->from('jadwal_kuliah');
        $this->db->join('mata_kuliah', 'jadwal_kuliah.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('dosen', 'dosen.id_dosen = mata_kuliah.id_dosen');
        $this->db->join('krs', 'krs.id_krs = jadwal_kuliah.id_krs');
        $this->db->join('user', 'krs.id_krs = user.id_user');
        // $this->db->where('mata_kuliah.id_dosen', '2'); // kondisi untuk dosen lihat jadwal
        $this->db->where('user.id_user', '133'); // kondisi untuk mahasiswa lihat jadwal

        $query = $this->db->get();
        return $query->result();
    }

    public function createJadwal($data)
    {
        $insert = $this->db->insert_batch('jadwal_kuliah', $data);
    }

}

/* End of file M_jadwalK.php */
