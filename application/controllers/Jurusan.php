<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
		// is_active();
        menu();
		$this->load->model('M_jurusan');
		$this->load->model('M_fakultas');
    }

    public function index()
    {
        $data['content']  = ucfirst($this->uri->segment(1));
        $data['jur']    = $this->M_jurusan->getJurusanFak();
		$this->load->view('jurusan/v_list_jurusan', $data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
        $data['fak']    = $this->M_fakultas->getFakultas();
		$this->load->view('jurusan/v_create_jurusan', $data);
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $nama	= $this->input->post('jurusan');
        $fak	= $this->input->post('fak');
		$var	    = array(
            'id_fakultas'   => $fak,
            'nama_jurusan'  => $nama,
        );
		if ($this->M_jurusan->createJur($var) == FALSE) {
            redirect('jurusan');
		}else{
            echo "Ada yang salah";
		}
    }

    public function edit()
    {
        $idjur	        = $this->uri->segment(3);
        $data['jur']    = $this->M_jurusan->getJurusanById($idjur);
        // echo "<pre>";
        // print_r($data);
        // die();
		$this->load->view('jurusan/v_edit_jurusan', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $id_jurusan = $this->input->post('id_jurusan');
        $nama	    = $this->input->post('nama');
        // $akr	    = $this->input->post('akr');
		$var		= array(
            'id_jurusan'   => $id_jurusan,
            'nama_jurusan' => $nama,
        );
        $where      = array('id_jurusan' => $id_jurusan);
		$res 	    = $this->M_jurusan->update('jurusan', $var, $where);

		if ($res >= 1) {
			redirect('jurusan');
		}else{echo "salah";}
    }

    public function delete($id)
	{
		$var	= array(
			'deleted'	=> 1,
		);
		$where	= array('id_jurusan' => $id);
		$res 	= $this->db->update('jurusan', $var, $where);
		
		if ($res >=1) {
			redirect('jurusan');
		}
	}

}

/* End of file Jurusan.php */
