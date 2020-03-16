<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		is_active();
        $this->load->model('M_matkul');
        $this->load->model('M_fakultas');
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
        $data['fak']	= $this->M_fakultas->getFakultas();
		$this->load->view('matkul/v_create_matkul', $data);
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $jurusan    = $this->input->post('jurusan');
        $nama_mk    = $this->input->post('nama_mk');
		// $dosen      = $this->input->post('dosen');
        // echo "<pre>";
        // print_r($dosen);
        // die();
        $sks        = $this->input->post('sks');
        $semester   = $this->input->post('semester');

		$var			= array(
            'id_jurusan'    => $jurusan,
            'nama_matkul'   => $nama_mk,
            // 'id_dosen'	    => $dosen,
            'sks' 	        => $sks,
            'semester' 	    => $semester,
        );
        
        $newvar = [];
        for ($i=0; $i < count($nama_mk) ; $i++) { 
            foreach($var as $key => &$value) {
                if(!is_array($value)) {
                    $newvar[$i][$key] = $value;
                } else {
                    $newvar[$i][$key] = array_shift($value);
                }
            }
        }
        // echo "<pre>";
        // print_r($newvar);
        // die();
		if ($this->M_matkul->createMatkul($newvar) == FALSE) {
            redirect('matkul');
		}else{
            echo "Ada yang salah";
		}
    }

    public function edit()
    {
        $idmatkul       = $this->uri->segment(3);
        $data['matkul'] = $this->M_matkul->edit($idmatkul);
        $data['dosen']  = $this->M_dosen->getDosen();
		$this->load->view('matkul/v_edit_matkul', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $id_mk		= $this->input->post('id_mk');
		$nama_mk	= $this->input->post('nama_mk');
		$id_dosen   = $this->input->post('id_dosen');
        $sks    	= $this->input->post('sks');
        $semester   = $this->input->post('semester');
		$var		= array(
            'id_matkul'     => $id_mk,
            'nama_matkul'   => $nama_mk,
            'id_dosen'	    => $id_dosen,
            'sks' 	        => $sks,
            'semester'      => $semester,
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