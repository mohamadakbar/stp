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
		$this->load->model('M_tagihan');
		$uid = $this->session->userdata('id');
		$data['menu'] 	= $this->M_menu->sysmenu($uid);
		$nim = $this->session->userdata('nim');
		$data['menu_mhs'] 	= $this->M_menu->sysmenu_mhs($nim);
		$data['getuser']= $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
	}
	
	public function index()
	{
		// die($this->session->userdata('id'));
		$nim 			= $this->session->userdata('nim');
		$data			= $this->M_ticket->tampil();
		$charts			= $this->M_ticket->chart();
		$x['data']		= json_encode($charts);
		// $x['hitung']	= $this->M_ticket->hitungTiket();
		$x['notif']		= $this->M_ticket->tampil();
		$x['hitmhs']	= $this->M_user->hitungMhs();
		$x['tagihan']	= $this->M_tagihan->getTagihan($nim);
		$x['hitdosen']	= $this->M_user->hitungDosen();
		$this->load->view('v_home', $x);
		$this->load->view('layout/fefooter');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */