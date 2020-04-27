<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_mhs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
		// is_active();
        menu();
		$this->load->model('M_matkul');
		$this->load->model('M_kelas');
		$this->load->model('M_nilai');
		$this->load->model('M_jadwalK');
		$this->load->model('M_tagihan');
        $this->load->model('M_krs');
    }

    public function index()
    {
        $nim    = $this->session->userdata('nim');
        $smt    = $this->session->userdata('semester');
        $chart  = $this->M_nilai->chartNilai($nim,$smt);
        $total  = $this->M_nilai->getTotalBobot($nim,$smt);
        // echo "<pre>";
        // print_r($total);
        // die();
        $data['charts'] = json_encode($chart);
        $data['nilai']  = $chart;
        $data['total']  = $total;
        $data['no']     = 1;
        $this->load->view('nilai_mhs/v_nilai_mhs_list.php', $data);
        $this->load->view('layout/fefooter');
    }

}

/* End of file Nilai_mhs.php */
