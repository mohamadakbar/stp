<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalKuliah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		is_active();
		$this->load->model('M_dosen');
		$this->load->model('M_matkul');
		$this->load->model('M_kelas');
		$this->load->model('M_jadwalK');
		$uid = $this->session->userdata('id');
		$data['menu']   = $this->M_menu->sysmenu($uid);
		$data['getuser']= $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
    }
    
    public function index()
    {
        $data['jadwal'] = $this->M_jadwalK->getJadwalK();
        // $data['jadwalmhs'] = $this->M_jadwalK->getJadwalKuliahBySmt(4);
		$this->load->view('jadwal/v_list_jadwal', $data);
        $this->load->view('layout/fefooter');
    }
    

    public function search(){
        $tahun          = $this->input->post('tahun');
        // die($tahun);
        // $data['jadwal'] = $this->M_jadwalK->getJadwalK();
        $data['jadwal']  = $this->M_jadwalK->getJadwalKuliahBySmt($tahun);
        $this->load->view('jadwal/v_home_jadwal',$data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
        $data['dosen']	    = $this->M_dosen->getDosen();
        $data['matkul']	    = $this->M_matkul->getMatkul();
        $data['ruang']	    = $this->M_kelas->getKelas();
        // print_r($data);
		$this->load->view('jadwal/v_create_jadwal', $data);
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $tahun	    = $this->input->post('tahun');
		$semester   = $this->input->post('semester');
		$matkul     = $this->input->post('matkul');
		$hari       = $this->input->post('hari');
		$jam        = $this->input->post('jam');
		$dosen      = $this->input->post('dosen');
        $ruangan    = $this->input->post('ruangan');
        
        $var	    = array(
            'tahun'     => $tahun,
            'semester'	=> $semester,
            'id_matkul'	=> $matkul,
            'hari'	    => $hari,
            'jam'	    => $jam,
            'id_dosen'	=> $dosen,
            'id_kelas'	=> $ruangan,
        );
        echo '<pre>';
        print_r(count($hari));
        die();

        $newvar = [];
        for ($i=0; $i < count($hari) ; $i++) { 
            foreach($var as $key => &$value) {
                if(!is_array($value)) {
                    $newvar[$i][$key] = $value;
                } else {
                    $newvar[$i][$key] = array_shift($value);
                }
            }
        }
        if (condition) {
            # code...
        }
		if ($this->M_jadwalK->createJadwal($newvar) == FALSE) {
            redirect('jadwalkuliah/create');
		}else{
            echo "Ada yang salah";
		}
    }

}

/* End of file JadwalKuliah.php */
