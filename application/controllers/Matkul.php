<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		is_active();
		$this->load->model('M_matkul');
		$this->load->model('M_dosen');
		$uid = $this->session->userdata('id');
		$data['menu'] = $this->M_menu->sysmenu($uid);
		$data['getuser']= $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
    }
    
    public function index()
    {
        $data['matkul']	= $this->M_matkul->getMatkul();
		$this->load->view('matkul/v_list_matkul', $data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
        $data['dosen'] = $this->M_dosen->getDosen();
		$this->load->view('matkul/v_create_matkul', $data);
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $nama_mk		= $this->input->post('nama_mk');
		$nama_dosen     = $this->input->post('nama_dosen');
        $sks    		= $this->input->post('sks');
		$var			= array(
            'nama_matkul'   => $nama_mk,
            'id_dosen'	    => $nama_dosen,
            'sks' 	        => $sks,
        );
		if ($this->M_matkul->createMatkul($var) == FALSE) {
            redirect('matkul');
		}else{
            echo "Ada yang salah";
		}
    }

    public function edit()
    {
        $idmatkul	    = $this->uri->segment(3);
        $data['matkul']  = $this->M_matkul->edit($idmatkul);
        $data['dosen']  = $this->M_dosen->getDosen();
		$this->load->view('matkul/v_edit_matkul', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $id_mk		= $this->input->post('id_mk');
		$nama_mk	= $this->input->post('nama_mk');
		$id_dosen = $this->input->post('id_dosen');
        $sks    	= $this->input->post('sks');
		$var		= array(
            'id_matkul'     => $id_mk,
            'nama_matkul'   => $nama_mk,
            'id_dosen'	    => $id_dosen,
            'sks' 	        => $sks,
        );
        $where      = array('id_matkul' => $id_mk);
		$res 	    = $this->M_matkul->update('mata_kuliah', $var, $where);

		if ($res >= 1) {
			redirect('matkul');
		}else{echo "salah";}
    }

    public function delete($id_mk)
	{
		$var	= array(
			'deleted'	=> 1,
		);
		$where	= array('id_matkul' => $id_mk);
		$res 	= $this->db->update('mata_kuliah', $var, $where);
		
		if ($res >=1) {
			redirect('matkul');
		}
	}

}
    
    /* End of file Controllername.php */