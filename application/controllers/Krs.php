<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
		// is_active();
		$this->load->model('M_dosen');
		$this->load->model('M_matkul');
		$this->load->model('M_kelas');
		$this->load->model('M_jadwalK');
		$this->load->model('M_tagihan');
		$this->load->model('M_krs');
		$uid = $this->session->userdata('id');
        $nim = $this->session->userdata('nim');
        $data['menu']       = $this->M_menu->sysmenu($uid);
		$data['menu_mhs'] 	= $this->M_menu->sysmenu_mhs($nim);
		$data['getuser']    = $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
    }
    
    public function index()
    {
        $smt            = $this->session->userdata('semester');
        $jur            = $this->session->userdata('jurusan');
        $nim	        = $this->session->userdata('nim');
        $data['krs']    = $this->M_krs->getJadwalBySmt($smt, $jur);
        $data['tagihan']= $this->M_tagihan->getTagihan($nim);
        $data['krsfix'] = $this->M_krs->getKrs($nim);
		$this->load->view('krs/v_list_krs', $data);
        $this->load->view('layout/fefooter');
    }

    public function store($id_jadwal)
	{
        $smt    = $this->session->userdata('semester');
        $jur    = $this->session->userdata('jurusan');
        $nim    = $this->session->userdata('nim');
		$var	= array(
			'id_jadwal'	=> $id_jadwal,
            'nim'	    => $nim,
            'flag'      => 1,
        );
        $tag	= array(
            'nim'	            => $nim,
            'jumlah_tagihan'    => 200000,
        );
        $this->db->insert('tagihan', $tag);
        if ($this->M_krs->createKrs($var) == FALSE) {
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    KRS berhasil disimpan
                </div>');
            redirect('krs');
		}else{
            echo "Ada yang salah";
		}
	}

}

/* End of file Controllername.php */
