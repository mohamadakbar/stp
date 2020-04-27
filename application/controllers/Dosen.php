<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		is_active();
		$this->load->model('M_dosen');
    }
    
    public function index()
    {
        menu();
        $data['dosen']	= $this->M_dosen->getDosen();
		$this->load->view('dosen/v_list_dosen', $data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
        menu();
        $data['kode']	= $this->M_dosen->kode();
		$this->load->view('dosen/v_create_dosen', $data);
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $kode       = $this->input->post('kode');
        $nama_dosen	= $this->input->post('nama_dosen');
        $email      = $this->input->post('email');
        $password   = md5($this->input->post('password'));
        $pendidikan = $this->input->post('pendidikan');
        $role       = ['1', '31', '38', '46']; // statis role untuk mahasiswa

		$var	    = array(
            'nama_dosen'    => $nama_dosen,
            'email'         => $email,
            'password'      => $password,
            'pendidikan'	=> $pendidikan,
        );
        $data   = array_merge($var);
        $code   = array('id_akses'  => $kode);
        // print_r($code);
        // die();
        $this->M_dosen->insertDosen($data,$code);
        for ($i=0;$i < count($role); $i++) {
			$detail	= array(
                'id_akses'	=> $kode,
                'id_menu' 	=> $role[$i]
            );
            $this->db->insert('detailakses', $detail);
        }

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <center>Dosen berhasil ditambah</center>
        </div>');
        redirect('dosen');
        
		// if ($this->M_dosen->createDosen($var) == FALSE) {
        //     redirect('dosen');
		// }else{
        //     echo "Ada yang salah";
		// }
    }

    public function editrole()
    {
        menu();
        $uid             = $this->session->userdata('id');
        $id_dosen        = $this->uri->segment(3);;
		$data['allmenu'] = $this->M_menu->allMenu();
        $data['role']	= $this->M_menu->sysmenu_dosen($id_dosen);
        $data['dosen']  = $this->M_dosen->getDosenByid($id_dosen);
		$this->load->view('dosen/v_editrole_dosen', $data);
        $this->load->view('layout/fefooter');
    }

    public function edit()
    {
        menu();
        $iddosen	    = $this->uri->segment(3);
        $data['dosen']  = $this->M_dosen->getKelasW($iddosen);
		$this->load->view('dosen/v_edit_dosen', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $iddosen	= $this->input->post('id_dosen');
        $nama_dosen	= $this->input->post('nama_dosen');
        $email      = $this->input->post('email');
		$pendidikan = $this->input->post('pendidikan');
		$var		= array(
            'id_dosen'      => $iddosen,
            'nama_dosen'    => $nama_dosen,
            'email'         => $email,
            'pendidikan'	=> $pendidikan,
        );
        $where      = array('id_dosen' => $iddosen);
		$res 	    = $this->M_dosen->update('dosen', $var, $where);

		if ($res >= 1) {
			redirect('dosen');
		}else{echo "salah";}
    }

    public function updaterole()
	{
		$id_akses	= $this->input->post('id_akses');
		$role		= $this->input->post('check_list');
		$delete 	= $this->M_user->hapusakses($id_akses);
        $cnt 		= count($role);
        // echo $cnt;
        // die();
		for ($i=0;$i < $cnt; $i++) {
			$detail	= array(
					'id_akses'	=> $id_akses,
					'id_menu' 	=> $role[$i]
					);
			$this->M_user->tambahakses($detail);
			// $this->db->update('user', ['aktif' => 1]);
		}
		redirect('dosen');
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
