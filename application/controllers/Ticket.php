<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    is_logged_in();
		$this->load->model('M_ticket');
		$this->load->model('M_menu');
		$uid = $this->session->userdata('id');
		$data['menu'] = $this->M_menu->sysmenu($uid);
		$this->load->view('layout/feheader', $data);
	}

	public function index()
	{
		$data['ticket']	= $this->M_ticket->tampil();
		$data['sts']	= $this->M_ticket->getsts();
		$this->load->view('v_ticket', $data);
		$this->load->view('layout/fefooter');
	}

	public function create()
	{
		$data['kode']	= $this->M_ticket->kode();
		$data['kat']	= $this->M_ticket->getkat();
		$data['div']	= $this->M_ticket->getdiv($this->session->userdata('id'));
		$this->load->view('v_createtic',$data);
		$this->load->view('layout/fefooter');
	}

	public function insert()
	{
		$notic			= $this->input->post('no_tiket');
		$nama			= $this->input->post('iduser');
		$masalah		= $this->input->post('masalah');
		$kat			= $this->input->post('kat');
		$sts 			= 1;
		$var			= array(
						'no_tiket'	=> $notic,
						'id_user'		=> $nama,
						'masalah' 	=> $masalah,
						'no_kat' 		=> $kat,
						'no_sts'		=> $sts
				);
		if ($this->M_ticket->inputTic($var) == FALSE) {
			redirect('ticket');
		}else{

		}
	}

	public function edit()
	{
		$notic = $this->uri->segment(3);
		$data['get']  = $this->M_ticket->ubah("'$notic'");
		$data['kat']  = $this->M_ticket->getkat();
		$this->load->view('v_edittic', $data);
		$this->load->view('layout/fefooter');
	}

	public function update()
	{
		$notic    = $this->input->post('no_tiket');
		$nama	    = $this->input->post('iduser');
		$masalah  = $this->input->post('masalah');
		$kat      = $this->input->post('kat');
		$flag	    = 1;

		$var	= array(
				'no_tiket'	=> $notic,
				'id_user' 	=> $nama,
				'masalah' 	=> $masalah,
				'no_kat' 	  => $kat,
				'flag'		  => $flag
		);

		$where	= array('no_tiket' => $notic);
		$res 	= $this->M_ticket->perbarui('tiket', $var, $where);

		if ($res >= 1) {
			redirect('ticket');
		}
	}

	public function progress()
	{
		$notic	= $this->uri->segment(3);
		$by 	= $this->session->userdata('id');
		$nosts	= 2;
		$flag	= 1;
		$update	= date('Y-m-d H:i:s');
		$var	= array(
				'no_tiket'	=> $notic,
				'no_sts'	=> $nosts,
				'flag'		=> $flag,
				'updated_at'=> $update,
				'updated_by'=> $by
		);
		$where	= array('no_tiket' => $notic);
		$res 	= $this->db->update('tiket', $var, $where);
		if ($res >= 1) {
			redirect('ticket');
		}
	}

	public function closed()
	{
		$notic	= $this->uri->segment(3);
		$by 	= $this->session->userdata('id');
		$nosts	= 3;
		$flag	= 1;
		$close = date('Y-m-d H:i:s');
		$var	= array(
				'no_tiket'	=> $notic,
				'no_sts'	=> $nosts,
				'flag'		=> $flag,
				'closed_at'	=> $close,
				'closed_by'	=> $by
		);
		$where	= array('no_tiket' => $notic);
		$res 	= $this->db->update('tiket', $var, $where);
		if ($res >= 1) {
			redirect('ticket');
		}
	}

	public function delete($notic)
	{
		$where	= array('no_tiket' => $notic);
		$res	= $this->M_ticket->hapus('tiket', $where);

		if ($res >=1) {
			redirect('ticket');
		}
	}

	public function detail()
	{
		$notic 			  = $this->uri->segment(3);
		$data['usr']  = $this->M_ticket->getusr("'$notic'");
		$data['get']  = $this->M_ticket->ubah("'$notic'");
		$data['com']	= $this->M_ticket->pilihComment($notic);
    $data['foto'] = $this->M_ticket->ambilsemuauser();
		$this->load->view('v_detail', $data);
		$this->load->view('layout/fefooter', $data, FALSE);
	}

	public function InsertComment()
	{
		$uri 			= $this->input->post('uri');
		$id_user		= $this->session->userdata('id');
		$comment 		= $this->input->post('komen');
		$var 			= array(
							'no_tiket'	=> $uri,
							'id_user'	=> $id_user,
							'com' 		=> $comment);

		if ($this->M_ticket->inputComment($var) == FALSE) {
			redirect('ticket/detail/'.$uri);
		}else{

		}
	}
}