<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
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
    $data['kat']  = $this->db->get('kategori')->result();
    $this->load->view('v_kategori', $data);
    $this->load->view('layout/fefooter');
  }

  public function add()
  {
    $this->load->view('v_createkat');
    $this->load->view('layout/fefooter');
  }

  public function create()
  {
    $nama = $this->input->post('nama_kat');
    $this->db->insert('kategori', ['nama_kat' => $nama]);
    redirect('kategori');
  }

  public function edit()
  {
    $id   = $this->uri->segment(3);
    $data['kat'] = $this->db->get_where('kategori', ['no_kat' => $id])->result();
    $this->load->view('v_editkat', $data);
    $this->load->view('layout/fefooter');
  }

  public function update()
  {
    $id     = $this->input->post('no_kat');
    $nama   = $this->input->post('nama_kat');
    $this->db->where('no_kat', $id);
    $this->db->update('kategori', ['nama_kat' => $nama, 'no_kat' => $id]);
    redirect('kategori');
  }

  public function delete($id)
  {
    $this->db->where('no_kat', $id);
    $this->db->delete('kategori');
    redirect('kategori');
  }

}

/* End of file Controllername.php */
