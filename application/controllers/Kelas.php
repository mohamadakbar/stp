<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		is_active();
		$this->load->model('M_kelas');
		$uid = $this->session->userdata('id');
		$data['menu']   = $this->M_menu->sysmenu($uid);
		$data['getuser']= $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
    }
    
    public function index()
    {
        $data['kelas']	= $this->M_kelas->getKelas();
		$this->load->view('kelas/v_list_kelas', $data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
		$this->load->view('kelas/v_create_kelas');
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $no_ruangan	= $this->input->post('no_ruangan');
		$gedung     = $this->input->post('gedung');
		$var	    = array(
            'no_ruangan'    => $no_ruangan,
            'gedung'	    => $gedung,
        );
		if ($this->M_kelas->createKelas($var) == FALSE) {
            redirect('kelas');
		}else{
            echo "Ada yang salah";
		}
    }

    public function edit()
    {
        $idkelas	    = $this->uri->segment(3);
        $data['kelas']  = $this->M_kelas->getKelasW($idkelas);
		$this->load->view('kelas/v_edit_kelas', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $idkelas	= $this->input->post('id_kls');
		$no_ruangan	= $this->input->post('no_ruangan');
		$gedung     = $this->input->post('gedung');
		$var		= array(
            'id_kelas'      => $idkelas,
            'no_ruangan'    => $no_ruangan,
            'gedung'	    => $gedung,
        );
        $where      = array('id_kelas' => $idkelas);
		$res 	    = $this->M_kelas->update('kelas', $var, $where);

		if ($res >= 1) {
			redirect('kelas');
		}else{echo "salah";}
    }

    public function delete($id)
	{
		$var	= array(
			'deleted'	=> 1,
		);
		$where	= array('id_kelas' => $id);
		$res 	= $this->db->update('kelas', $var, $where);
		
		if ($res >=1) {
			redirect('kelas');
		}
	}

}

/* End of file Controllername.php */
