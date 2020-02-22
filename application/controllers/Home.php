<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		// is_active();
		$this->load->model('M_menu');
		$this->load->model('M_user');
		$uid = $this->session->userdata('id');
		$data['menu'] 	= $this->M_menu->sysmenu($uid);
		$data['getuser']= $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
	}
	
	public function index()
	{
		$data		= $this->M_ticket->tampil();
		$charts	= $this->M_ticket->chart();
		$x['data']	= json_encode($charts);
		$x['hitung']= $this->M_ticket->hitungTiket();
		$x['hituser']= $this->M_user->hitungUser();
		$x['notif']= $this->M_ticket->tampil();
		$this->load->view('v_home', $x);
		$this->load->view('layout/fefooter');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */