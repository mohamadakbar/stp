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
		$query 	= $this->db->get();
		return $query->result();
	}	

}

/* End of file M_menu.php */
/* Location: ./application/models/M_menu.php */