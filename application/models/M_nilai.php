<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {

    public function matkulByDosen($id)
    {
        $this->db->select('mata_kuliah.id_matkul, mata_kuliah.nama_matkul, dosen.nama_dosen');
        $this->db->from('jadwal_kuliah');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = jadwal_kuliah.id_matkul');
        $this->db->where('dosen.id_dosen', $id);
        $query  = $this->db->get()->result();
        return $query;
    }
    public function cari($id_dosen,$tahun,$semester,$matkul,$nim)
    {
        $this->db->select('jadwal_kuliah.id_dosen, jadwal_kuliah.id_jadwalkuliah, krs.nim, mahasiswa.nama_mahasiswa, mahasiswa.semester, mahasiswa.nim, mata_kuliah.nama_matkul, mata_kuliah.id_matkul');
        $this->db->from('krs');
        $this->db->join('jadwal_kuliah', 'krs.id_jadwal = jadwal_kuliah.id_jadwalkuliah');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = jadwal_kuliah.id_matkul');
        $this->db->join('mahasiswa', 'krs.nim = mahasiswa.nim');
        // $this->db->join('nilai', 'krs.id_jadwal = nilai.id_jadwal');
        $this->db->where('jadwal_kuliah.id_dosen', $id_dosen);
        $this->db->where('mata_kuliah.id_matkul', $matkul);
        $this->db->where('jadwal_kuliah.tahun', $tahun);
        $this->db->where('mahasiswa.semester', $semester);
        $this->db->like('mahasiswa.nim', $nim);
        $query = $this->db->get()->result();
        return $query;
    }

    public function create($var)
    {
        $insert = $this->db->insert('nilai', $var);
    }

    public function getNilai($nim,$id_matkul,$id_jadwal)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->where('nim', $nim);
        $this->db->where('id_matkul', $id_matkul);
        $this->db->where('id_jadwal', $id_jadwal);
        $query  = $this->db->get()->result();
        return $query;
    }

    public function updateNilai($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

    public function chartNilai($nim,$smt)
    {
        $this->db->select('mata_kuliah.nama_matkul,nilai.nilai,mata_kuliah.sks');
        $this->db->select("CASE 
            WHEN nilai = 'A' THEN '4' 
            WHEN nilai = 'B' THEN '3'
            WHEN nilai = 'C' THEN '2'
            WHEN nilai = 'D' THEN '1' 
            ELSE '0' 
        END AS bobot 
        ");
        $this->db->select("CASE
            WHEN nilai = 'A' THEN '4' * sks 
            WHEN nilai = 'B' THEN '3' * sks
            WHEN nilai = 'C' THEN '2' * sks
            WHEN nilai = 'D' THEN '1' * sks
            ELSE '0' 
        END AS total
        ");
        $this->db->from('nilai');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = nilai.id_matkul');
        $this->db->join('mahasiswa', 'mahasiswa.nim = nilai.nim');
        $this->db->where('nilai.nim', $nim);
        $this->db->where('mahasiswa.semester', $smt);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getTotalBobot($nim,$smt)
    {
        $this->db->select('mata_kuliah.nama_matkul, nilai.nilai, mata_kuliah.sks');
        $this->db->select("SUM(CASE
            WHEN nilai = 'A' THEN '4' * sks 
            WHEN nilai = 'B' THEN '3' * sks 
            WHEN nilai = 'C' THEN '2' * sks 
            WHEN nilai = 'D' THEN '1' * sks 
            ELSE '0' 
        END) AS totalbobot,
        SUM(mata_kuliah.sks) AS totalsks
        ");
        $this->db->select("
        SUM(
			(
			CASE
					
					WHEN nilai = 'A' THEN
					'4' * sks 
					WHEN nilai = 'B' THEN
					'3' * sks 
					WHEN nilai = 'C' THEN
					'2' * sks 
					WHEN nilai = 'D' THEN
					'1' * sks ELSE '0' 
				END 
					) 
					/ 
					(
				SELECT
					SUM( sks ) AS sks 
				FROM
					`nilai`
					JOIN `mata_kuliah` ON `mata_kuliah`.`id_matkul` = `nilai`.`id_matkul`
					JOIN `mahasiswa` ON `mahasiswa`.`nim` = `nilai`.`nim` 
				WHERE
					`mahasiswa`.`nim` = '2012141532' 
					AND `mahasiswa`.`semester` = 1 
				) 
			) AS ipk 
        ");
        $this->db->from('nilai');
        $this->db->join('mata_kuliah', 'mata_kuliah.id_matkul = nilai.id_matkul');
        $this->db->join('mahasiswa', 'mahasiswa.nim = nilai.nim');
        $this->db->where('nilai.nim', $nim);
        $this->db->where('mahasiswa.semester', $smt);
        $query = $this->db->get()->result();
        return $query;
    }

}

/* End of file M_nilai.php */
