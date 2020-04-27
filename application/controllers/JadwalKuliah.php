<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalKuliah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // is_active();
        
		$this->load->model('M_dosen');
		$this->load->model('M_matkul');
		$this->load->model('M_kelas');
		$this->load->model('M_jadwalK');
		$this->load->model('M_krs');
    }
    
    public function index()
    {
        menu();
        $smt            = $this->session->userdata('semester');
        $jur            = $this->session->userdata('jurusan');
        $nim	        = $this->session->userdata('nim');
        $id_dosen       = $this->session->userdata('id_dosen');
        $data['jadwal'] = $this->M_jadwalK->getJadwalK();
        $data['krsfix'] = $this->M_krs->getKrs($nim);
        $data['jadwalDosen'] = $this->M_jadwalK->getJadwalKuliahDosen($id_dosen);
		$this->load->view('jadwal/v_list_jadwal', $data);
        $this->load->view('layout/fefooter');
    }
    

    public function search(){
        menu();
        $smt            = $this->input->post('semester');
        $nim            = $this->session->userdata('nim');
        $data['jadwal'] = $this->M_jadwalK->getJadwalKuliahMhs($nim, $smt);
        $this->load->view('jadwal/v_home_jadwal',$data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
        menu();
        $data['dosen']	    = $this->M_dosen->getDosen();
        $data['matkul']	    = $this->M_matkul->getMatkul();
        $data['ruang']	    = $this->M_kelas->getKelas();
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
		if ($this->M_jadwalK->createJadwal($newvar) == FALSE) {
            redirect('jadwalkuliah/create');
		}else{
            echo "Ada yang salah";
		}
    }

    public function edit()
    {
        menu();
        $content        = $this->uri->segment(2);
        $id_jadwal      = $this->uri->segment(3);
        $data['dosen']  = $this->M_dosen->getDosen();
        $data['matkul']	= $this->M_matkul->getMatkul();
        $data['ruang']	= $this->M_kelas->getKelas();
        $data['jadwal'] = $this->M_jadwalK->getJadwalKulBy($id_jadwal);
		$this->load->view('jadwal/v_edit_jadwal', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $id_jadwal  = $this->input->post('id_jadwal');
        $tahun	    = $this->input->post('tahun');
		$semester   = $this->input->post('semester');
		$matkul     = $this->input->post('matkul');
		$hari       = $this->input->post('hari');
		$jam        = $this->input->post('jam');
		$dosen      = $this->input->post('dosen');
        $ruangan    = $this->input->post('ruangan');

		$var		= array(
            'id_jadwalkuliah'   => $id_jadwal,
            'tahun'             => $tahun,
            'semester'	        => $semester,
            'id_matkul'	        => $matkul,
            'hari'	            => $hari,
            'jam'	            => $jam,
            'id_dosen'	        => $dosen,
            'id_kelas'	        => $ruangan,
        );
        $where      = array('id_jadwalkuliah' => $id_jadwal);
		$res 	    = $this->M_jadwalK->update('jadwal_kuliah', $var, $where);

		if ($res >= 1) {
			redirect('jadwalkuliah');
		}else{echo "salah";}
    }

    public function delete($id)
	{
		$var	= array(
			'deleted'	=> 1,
		);
		$where	= array('id_jadwalkuliah' => $id);
		$res 	= $this->db->update('jadwal_kuliah', $var, $where);
		
		if ($res >=1) {
			redirect('jadwalkuliah');
		}
    }
    
    public function getSmt()
    {
        $semester   = $this->input->post('id_matkul'); 
        $getsmt     = $this->M_jadwalK->getSmt($semester);
        foreach($getsmt as $data){
            $lists = "<option value='".$data->semester."'>".$data->semester."</option>";
        }
        $callback = array('smst'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($lists); // konversi varibael $callback menjadi JSON
    }

}

/* End of file JadwalKuliah.php */
