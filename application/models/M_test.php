<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_test extends CI_Model {

	public function ambilM()
	{
		return $this->db->get('user')->result();
	}

}

/* End of file M_test.php */
/* Location: ./application/models/M_test.php */