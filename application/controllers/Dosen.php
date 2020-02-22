<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		is_active();
		$this->load->model('M_dosen');
		$uid = $this->session->userdata('id');
		$data['menu']   = $this->M_menu->sysmenu($uid);
		$data['getuser']= $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
    }
    
    public function index()
    {
        $data['dosen']	= $this->M_dosen->getDosen();
		$this->load->view('dosen/v_list_dosen', $data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
		$this->load->view('dosen/v_create_dosen');
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $nama_dosen	= $this->input->post('nama_dosen');
		$pendidikan = $this->input->post('pendidikan');
		$var	    = array(
            'nama_dosen'    => $nama_dosen,
            'pendidikan'	=> $pendidikan,
        );
		if ($this->M_dosen->createDosen($var) == FALSE) {
            redirect('dosen');
		}else{
            echo "Ada yang salah";
		}
    }

    public function edit()
    {
        $iddosen	    = $this->uri->segment(3);
        $data['dosen']  = $this->M_dosen->getKelasW($iddosen);
		$this->load->view('dosen/v_edit_dosen', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $iddosen	= $this->input->post('id_dosen');
		$nama_dosen	= $this->input->post('nama_dosen');
		$pendidikan = $this->input->post('pendidikan');
		$var		= array(
            'id_dosen'      => $iddosen,
            'nama_dosen'    => $nama_dosen,
            'pendidikan'	=> $pendidikan,
        );
        $where      = array('id_dosen' => $iddosen);
		$res 	    = $this->M_dosen->update('dosen', $var, $where);

		if ($res >= 1) {
			redirect('dosen');
		}else{echo "salah";}
    }

    public function delete($id)
	{
		$var	= array(
			'deleted'	=> 1,
		);
		$where	= array('id_dosen' => $id);
		$res 	= $this->db->update('dosen', $var, $where);
		
		if ($res >=1) {
			redirect('dosen');
		}
	}

}

/* End of file Dosen.php */
