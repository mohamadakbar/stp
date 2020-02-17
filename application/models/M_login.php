<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function loginAct($email)
	{
		$this->db->select('user.*, akses.*');
		$this->db->from('user');
		$this->db->join('akses', 'user.id_user = akses.id_user');
		$this->db->where('user.email', $email);
		// $this->db->where('user.password', $pass);
		$query	= $this->db->get();
		return $query->result();

	// return $this->db->get_where('user', ['email' => $email])->row_array();
	}	
}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */