<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
		// is_active();
        // $this->load->model('M_fakultas');
        menu();
        $this->load->model('M_matkul');
		$this->load->model('M_nilai');
    }
    
    public function index()
    {
        $id_dosen       = $this->session->userdata('id_dosen');
        $data['matkul'] = $this->M_nilai->matkulByDosen($id_dosen);
        $this->load->view('nilai/v_list_nilai', $data);
        $this->load->view('layout/fefooter');
    }

    public function search()
    {
        $id_dosen   = $this->session->userdata('id_dosen');
        $tahun      = $this->input->post('tahun');
        $semester   = $this->input->post('semester');
        $matkul     = $this->input->post('matkul');
        $nim        = $this->input->post('nim');

        $data['mhs']    = $this->M_nilai->cari($id_dosen,$tahun,$semester,$matkul,$nim);
        $data['mhs']    = $this->M_nilai->cari($id_dosen,$tahun,$semester,$matkul,$nim);
        $data['matkul'] = $this->M_nilai->matkulByDosen($id_dosen);
        // $data['nilai'] = $this->M_nilai->getNilai($matkul);
        // print_r($data['nilai']);
        // die();
        $this->load->view('nilai/v_search_nilai', $data);
        $this->load->view('layout/fefooter');
    }

    public function addnilai($nim,$id_matkul,$id_jadwal)
    {
        // $data['nim']        = $nim;   
        // $data['id_matkul']  = $id_matkul;
        // $data['id_jadwal']  = $id_jadwal;
        $carinilai = $this->M_nilai->getNilai($nim,$id_matkul,$id_jadwal);
        $count = count($carinilai);
        // print_r($carinilai);
        //     die();
        if ($count == 0) {
            $data['nim']        = $nim;   
            $data['id_matkul']  = $id_matkul;
            $data['id_jadwal']  = $id_jadwal;
            $data['nilai']      = $carinilai;
            
            $this->load->view('nilai/v_add_nilai_emp', $data);
            $this->load->view('layout/fefooter');
            // die('masuk');
        }else{
            $datas['nilai']  = $carinilai;
            $this->load->view('nilai/v_add_nilai', $datas);
            $this->load->view('layout/fefooter');
        }
    }

    public function store_nilai()
    {
        $nim        = $this->input->post('nim');
        $id_matkul  = $this->input->post('id_matkul');
        $id_jadwal  = $this->input->post('id_jadwal');
        $nilai      = strtoupper($this->input->post('nilai'));
        $catatan    = strtoupper($this->input->post('catatan'));

        $value  =   array(
            'nim'       => $nim,
            'id_matkul' => $id_matkul,
            'nilai'     => $nilai,
            'catatan'   => $catatan,
            'id_jadwal'   => $id_jadwal,
        );

        $insert     = $this->M_nilai->create($value);

        if ($insert == FALSE) {
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    Nilai berhasil disimpan
                </div>');
            redirect('nilai');
        }else{
            $this->session->set_flashdata('message', 
                '<div class="alert alert-danger hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    Nilai GAGAL disimpan
                </div>');
            redirect('nilai');
        }
    }

    public function edit_nilai()
    {
        $nim        = $this->input->post('nim');
        $id_matkul	= $this->input->post('id_matkul');
        $id_jadwal	= $this->input->post('id_jadwal');
        $nilai  	= strtoupper($this->input->post('nilai'));
        $catatan	= strtoupper($this->input->post('catatan'));
        // die($nilai);
		$var		= array(
            'nilai'     => $nilai,
            'catatan'   => $catatan,
        );
        $where      = array('nim' => $nim, 'id_matkul' => $id_matkul, 'id_jadwal' => $id_jadwal);
		$res 	    = $this->M_nilai->updateNilai('nilai', $var, $where);

		if ($res >= 1) {
			$this->session->set_flashdata('message', 
                '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    Nilai berhasil di update
                </div>');
            redirect('nilai');
		}else{
            $this->session->set_flashdata('message', 
                '<div class="alert alert-danger hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    Nilai GAGAL di update
                </div>');
            redirect('nilai');
        }
    }

}

/* End of file Nilai.php */
