<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		is_active();
        $this->load->model('M_tagihan');
        $this->load->model('M_mahasiswa');
		$uid = $this->session->userdata('id');
		$data['menu'] = $this->M_menu->sysmenu($uid);
		$data['getuser']= $this->M_user->ambilUserById($uid);
		$this->load->view('layout/feheader', $data);
    }

    public function index()
    {
        // $data['rupiah']     = $this->rupiah();
        $data['tagihan']	= $this->M_tagihan->getTagihanAll();
		$this->load->view('tagihan/v_list_tagihan', $data);
        $this->load->view('layout/fefooter');
    }

    public function create()
    {
        $data['mhs']    = $this->M_mahasiswa->getMhs();
		$this->load->view('tagihan/v_create_tagihan', $data);
        $this->load->view('layout/fefooter');
    }

    public function store()
    {
        $nim	    = $this->input->post('nim');
        $pembayaran	= $this->input->post('pembayaran');
        $jml_tagihan= $this->input->post('jumlah_tagihan');
        $status     = $this->input->post('status');
		$var	    = array(
            'nim'           => $nim,
            'pembayaran'    => $pembayaran,
            'jumlah_tagihan'=> $jml_tagihan,
            'status'        => $status,
        );
		if ($this->M_tagihan->createTagihan($var) == FALSE) {
            redirect('tagihan');
		}else{
            echo "Ada yang salah";
		}
    }

    public function edit()
    {
        $id_tag         = $this->uri->segment(3);
        $data['mhs']    = $this->M_mahasiswa->getMhs();
        $data['tag']    = $this->M_tagihan->edit($id_tag);
        // print_r($datas);die();
		$this->load->view('tagihan/v_edit_tagihan', $data);
        $this->load->view('layout/fefooter');
    }

    public function update()
    {
        $id_tag	    = $this->input->post('id_tag');
		$nim	    = $this->input->post('nim');
        $pembayaran	= $this->input->post('pembayaran');
        $jml_tagihan= $this->input->post('jumlah_tagihan');
        $status     = $this->input->post('status');
		$var	    = array(
            'nim'           => $nim,
            'pembayaran'    => $pembayaran,
            'jumlah_tagihan'=> $jml_tagihan,
            'status'        => $status,
        );
        $where      = array('id_tagihan' => $id_tag);
		$res 	    = $this->M_tagihan->update('tagihan', $var, $where);

		if ($res >= 1) {
			redirect('tagihan');
		}else{echo "salah";}
    }
    
    public function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
     
    }

}

/* End of file Tagihan.php */
