<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

	public function sysmenu($value)
	{
		$this->db->select('menu.id_menu, menu.nama_menu, menu.slug, menu.parent, menu.child, menu.icon');
		$this->db->from('akses');
		$this->db->join('detailakses', 'akses.id_akses = detailakses.id_akses');
		$this->db->join('menu', 'detailakses.id_menu = menu.id_menu');
		$this->db->join('user', 'akses.id_user = user.id_user');
		$this->db->where('user.id_user', $value);
		$this->db->order_by('menu.nama_menu', 'asc');
		$query 	= $this->db->get();
		return $query->result();
	}	

	public function sysmenu_mhs($value)
	{
		$this->db->select('menu.id_menu, menu.nama_menu, menu.slug, menu.parent, menu.child, menu.icon');
		$this->db->from('akses');
		$this->db->join('detailakses', 'akses.id_akses = detailakses.id_akses');
		$this->db->join('menu', 'detailakses.id_menu = menu.id_menu');
		$this->db->join('mahasiswa', 'akses.id_user = mahasiswa.nim');
		$this->db->where('mahasiswa.nim', $value);
		$query 	= $this->db->get();
		return $query->result();
	}

	public function sysmenu_dosen($value)
	{
		$this->db->select('menu.id_menu, menu.nama_menu, menu.slug, menu.parent, menu.child, menu.icon');
		$this->db->from('akses');
		$this->db->join('detailakses', 'akses.id_akses = detailakses.id_akses');
		$this->db->join('menu', 'detailakses.id_menu = menu.id_menu');
		$this->db->join('dosen', 'akses.id_user = dosen.id_dosen');
		$this->db->where('dosen.id_dosen', $value);
		$query 	= $this->db->get();
		return $query->result();
	}

}

/* End of file M_menu.php */
/* Location: ./application/models/M_menu.php */