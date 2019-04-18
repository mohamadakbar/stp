<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_print extends CI_Model {

	public function view_by_date($date)
	{
		$this->db->where('DATE(create_at)', $date); // Tambahkan where tanggal nya

		return $this->db->get('tiket')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
	}

	public function view_by_month($month, $year)
	{
		$this->db->where('MONTH(create_at)', $month); // Tambahkan where bulan
		$this->db->where('YEAR(create_at)', $year); // Tambahkan where tahun

		return $this->db->get('tiket')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
	}

	public function view_by_year($year)
	{
		$this->db->where('YEAR(create_at)', $year); // Tambahkan where tahun

		return $this->db->get('tiket')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
	}

	public function view_all()
	{
		$this->db->select('tiket.no_tiket, user.nama, tiket.masalah, status.nama_sts, tiket.create_at');
		$this->db->from('tiket');
		$this->db->join('user', 'user.id_user = tiket.id_user');
		$this->db->join('status', 'status.no_sts = tiket.no_sts');
		$query	= $this->db->get(); // Tampilkan semua data transaksi
		return $query->result();
	}

	public function option_tahun()
	{
		$this->db->select('tiket.no_tiket, user.nama, tiket.masalah, status.nama_sts, tiket.create_at');
		$this->db->from('tiket');
		$this->db->join('user', 'user.id_user = tiket.id_user');
		$this->db->join('status', 'status.no_sts = tiket.no_sts');
		$query	= $this->db->get(); // Tampilkan semua data transaksi
		return $query->result();
	}

}

/* End of file Print.php */
/* Location: ./application/controllers/Print.php */