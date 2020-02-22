<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwalK extends CI_Model {

    public function getJadwalKuliahBySmt($where)
    {
        $this->db->select('*');
        $this->db->from('jadwal_kuliah');
        $this->db->join('mata_kuliah', 'jadwal_kuliah.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('dosen', 'dosen.id_dosen = mata_kuliah.id_dosen');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas');
        $this->db->where('jadwal_kuliah.semester', $where); // kondisi untuk dosen lihat jadwal
        // $this->db->where('user.id_user', '133'); // kondisi untuk mahasiswa lihat jadwal

        $query = $this->db->get();
        return $query->result();
    }

    public function getJadwalK()
    {
        $this->db->select('*');
        $this->db->from('jadwal_kuliah');
        $this->db->join('mata_kuliah', 'jadwal_kuliah.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('dosen', 'dosen.id_dosen = mata_kuliah.id_dosen');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas');
        // $this->db->where('jadwal_kuliah.tahun', $where); // kondisi untuk dosen lihat jadwal
        // $this->db->where('user.id_user', '133'); // kondisi untuk mahasiswa lihat jadwal

        $query = $this->db->get();
        return $query->result();
    }

    public function createJadwal($data)
    {
        $insert = $this->db->insert_batch('jadwal_kuliah', $data);
    }

}

/* End of file M_jadwalK.php */
