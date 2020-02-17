<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
    is_active();
    $this->load->model('M_menu');
		$uid = $this->session->userdata('id');
		$data['menu'] = $this->M_menu->sysmenu($uid);
		$data['getuser']= $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
	}

	public function index()
	{
		$data['div'] 	= $this->db->get('divisi')->result();
		$this->load->view('v_divisi', $data);
		$this->load->view('layout/fefooter');	
	}

	public function add()
	{
		$this->load->view('v_creatediv');
		$this->load->view('layout/fefooter');
	}

	public function create()
	{
		$nama = $this->input->post('nama_div');
		$this->db->insert('divisi', ['nama_div' => $nama]);
		redirect('divisi');
	}

	public function edit()
	{
		$id   = $this->uri->segment(3);
    $data['div'] = $this->db->get_where('divisi', ['no_div' => $id])->result();
    $this->load->view('v_editdiv', $data);
    $this->load->view('layout/fefooter');
	}

	public function update()
  {
    $id     = $this->input->post('no_div');
    $nama   = $this->input->post('nama_div');
    $this->db->where('no_div', $id);
    $this->db->update('divisi', ['nama_div' => $nama, 'no_div' => $id]);
    redirect('divisi');
  }

  public function delete($id)
  {
    $this->db->where('no_div', $id);
    $this->db->delete('divisi');
    redirect('divisi');
  }

}

/* End of file Divisi.php */
/* Location: ./application/controllers/Divisi.php */