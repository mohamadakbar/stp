<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		// is_active();
		menu();
		$this->load->model('M_tagihan');
	}
	
	public function index()
	{
		$nim 			= $this->session->userdata('nim');
		$data			= $this->M_ticket->tampil();
		$charts			= $this->M_ticket->chart();
		$x['data']		= json_encode($charts);
		$x['notif']		= $this->M_ticket->tampil();
		$x['hitmhs']	= $this->M_user->hitungMhs();
		$x['tagihan']	= $this->M_tagihan->getTagihan($nim);
		$x['hitdosen']	= $this->M_user->hitungDosen();
		// $x['iddos']	= $this->session->userdata('id_dosen');
		$this->load->view('v_home', $x);
		$this->load->view('layout/fefooter');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */