<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwalK extends CI_Model {

    public function getJadwalKuliahMhs($nim, $smt)
    {
        $this->db->select('*');
        $this->db->from('jadwal_kuliah');
        $this->db->join('mata_kuliah', 'jadwal_kuliah.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('dosen', 'dosen.id_dosen = mata_kuliah.id_dosen');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas');
        $this->db->join('mahasiswa', 'mahasiswa.semester = jadwal_kuliah.semester');
        $this->db->where('mahasiswa.semester', $smt); // kondisi untuk dosen lihat jadwal
        $this->db->where('mahasiswa.nim', $nim); // kondisi untuk dosen lihat jadwal

        $query = $this->db->get();
        return $query->result();
    }

    public function getJadwalKuliahDosen($id)
    {
        $this->db->select('jadwal_kuliah.id_jadwalkuliah,
        jadwal_kuliah.deleted, 
        jadwal_kuliah.tahun, 
        mata_kuliah.semester, 
        jadwal_kuliah.hari, 
        jadwal_kuliah.jam, 
        mata_kuliah.nama_matkul, 
        jurusan.nama_jurusan,
        dosen.nama_dosen, 
        kelas.no_ruangan, 
        kelas.gedung');
        $this->db->from('jadwal_kuliah');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('mata_kuliah', 'jadwal_kuliah.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas');
        $this->db->join('jurusan', 'mata_kuliah.id_jurusan = jurusan.id_jurusan');
        $this->db->where('dosen.id_dosen', $id); // kondisi untuk dosen lihat jadwal
        // $this->db->where('user.id_user', '133'); // kondisi untuk mahasiswa lihat jadwal

        $query = $this->db->get();
        return $query->result();
    }

    public function getJadwalK()
    {
        $this->db->select('jadwal_kuliah.id_jadwalkuliah,
        jadwal_kuliah.deleted, 
        jadwal_kuliah.tahun, 
        mata_kuliah.semester, 
        jadwal_kuliah.hari, 
        jadwal_kuliah.jam, 
        mata_kuliah.nama_matkul, 
        jurusan.nama_jurusan,
        dosen.nama_dosen, 
        kelas.no_ruangan, 
        kelas.gedung');
        $this->db->from('jadwal_kuliah');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('mata_kuliah', 'jadwal_kuliah.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas');
        $this->db->join('jurusan', 'mata_kuliah.id_jurusan = jurusan.id_jurusan');
        // $this->db->where('jadwal_kuliah.tahun', $where); // kondisi untuk dosen lihat jadwal
        // $this->db->where('user.id_user', '133'); // kondisi untuk mahasiswa lihat jadwal

        $query = $this->db->get();
        return $query->result();
    }

    public function getJadwalKulBy($where)
    {
        $this->db->select('*');
        $this->db->from('jadwal_kuliah');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('mata_kuliah', 'jadwal_kuliah.id_matkul = mata_kuliah.id_matkul');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas');
        $this->db->where('jadwal_kuliah.id_jadwalkuliah', $where); // kondisi untuk dosen lihat jadwal
        // $this->db->where('user.id_user', '133'); // kondisi untuk mahasiswa lihat jadwal

        $query = $this->db->get();
        return $query->result();
    }

    public function createJadwal($data)
    {
        $insert = $this->db->insert_batch('jadwal_kuliah', $data);
    }

    public function update($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

    public function getSmt($id)
    {
        $this->db->select('semester');
        $this->db->where('id_matkul', $id);
        $query  = $this->db->get('mata_kuliah')->result();
        return $query;
    }

}

/* End of file M_jadwalK.php */
