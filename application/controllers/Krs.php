<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // is_active();
        menu();
		$this->load->model('M_matkul');
		$this->load->model('M_kelas');
		$this->load->model('M_jadwalK');
		$this->load->model('M_tagihan');
		$this->load->model('M_krs');
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
        $id_dosen = $this->session->userdata('id_dosen');
        // die($id_dosen);
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
        $cari   = $this->M_krs->cari($id_jadwal,$nim);
        $cnt    = count($cari);

        if ($cnt > 0) {
            $this->session->set_flashdata('message', 
                '<div class="alert alert-danger hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    Anda sudah mengambil KRS ini
                </div>');
            redirect('krs');
        }else{
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
    
    public function coba()
    {
        $this->db->where('id_jadwal','26');
        $this->db->where('nim','2012141546');
        $q = $this->db->get('krs')->result();
        $c = count($q);

        if ($c > 0) {
            echo "ada";
        }else{
            echo 'ga ada';
        }
        // echo '<pre>';
        // print_r($c);
        exit;
    }

}

/* End of file Controllername.php */
