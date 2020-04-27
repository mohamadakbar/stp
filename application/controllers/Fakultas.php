<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
		// is_active();
        menu();
		$this->load->model('M_fakultas');
    }
    
    public function index()
    {
        $data['fak']	= $this->M_fakultas->getFakultas();
		$this->load->view('fakultas/v_list_fakultas', $data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
		$this->load->view('fakultas/v_create_fakultas');
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $nama	= $this->input->post('fakultas');
        $akr	= $this->input->post('akr');
		$var	    = array(
            'nama_fakultas' => $nama,
            'akreditasi'    => $akr,
        );
		if ($this->M_fakultas->createFak($var) == FALSE) {
            redirect('fakultas');
		}else{
            echo "Ada yang salah";
		}
    }

    public function edit()
    {
        $idfak	        = $this->uri->segment(3);
        $data['fak']    = $this->M_fakultas->getById($idfak);
		$this->load->view('fakultas/v_edit_fakultas', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $id_fakultas    = $this->input->post('id_fakultas');
        $nama	        = $this->input->post('nama');
        $akr	        = $this->input->post('akr');
		$var		= array(
            'id_fakultas'   => $id_fakultas,
            'nama_fakultas' => $nama,
            'akreditasi' => $akr,
        );
        $where      = array('id_fakultas' => $id_fakultas);
		$res 	    = $this->M_fakultas->update('fakultas', $var, $where);

		if ($res >= 1) {
			redirect('fakultas');
		}else{echo "salah";}
    }

    public function delete($id)
	{
		$var	= array(
			'deleted'	=> 1,
		);
		$where	= array('id_fakultas' => $id);
		$res 	= $this->db->update('fakultas', $var, $where);
		
		if ($res >=1) {
			redirect('fakultas');
		}
	}

}

/* End of file Fakultas.php */
