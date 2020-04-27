<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        menu();
    }
    
    public function index()
    {
        $id_user    =  $this->session->userdata('id');
        $nim        =  $this->session->userdata('nim');
        $id_dosen   =  $this->session->userdata('id_dosen');

        if ($id_user) {
            $data['divisi'] = $this->db->get('divisi')->result();
            $data['user']   = $this->db->get_where('user', ['id_user' => $id_user])->result_array();
            $this->load->view('user/v_account', $data);
            $this->load->view('layout/fefooter');
        }elseif ($nim) {
            $data['user']   = $this->db->get_where('mahasiswa', ['nim' => $nim])->result_array();
            $this->load->view('user/v_account', $data);
            $this->load->view('layout/fefooter');
        }elseif($id_dosen){
            $data['user']   = $this->db->get_where('dosen', ['id_dosen' => $id_dosen])->result_array();
            $this->load->view('user/v_account', $data);
            $this->load->view('layout/fefooter');
        }
        
    }

    public function editprofil(){
        $cek       = $_FILES['foto']['name'];
        if ($cek == "") {
            //tanpa edit foto
            $id_user    = $this->input->post('id_user');
            $nama       = $this->input->post('nama');
            $divisi     = $this->input->post('div');

            $where   = array('id_user'  => $id_user);
            $value   = array(
            'nama'      => $nama,
            'no_div'    => $divisi
            );
            $res        = $this->db->update('user', $value, $where);
            if ($res >= 1) {
            redirect('account');
            }
        }else{
            // dengan edit foto
            $config['upload_path']    = 'upload/user/';
            $config['allowed_types']  = 'gif|jpg|png';
            // load library upload
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                // menampilkan pesan error
                print_r($error);
            }else{
                $id_user    = $this->input->post('id_user');
                $nama       = $this->input->post('nama');
                $divisi     = $this->input->post('div');
                $foto       = $this->upload->data();

                $where   = array('id_user'  => $id_user);
                $value   = array(
                    'nama'    => $nama,
                    'no_div'  => $divisi,
                    'foto'    => $foto['file_name']
                );
                $res        = $this->db->update('user', $value, $where);
                if ($res >= 1) {
                    redirect('account');
                }
            }
        }
    }

    public function editprofilmhs()
    {
        $cek       = $_FILES['foto']['name'];
        if ($cek == "") {
            //tanpa edit foto
            $nim    = $this->input->post('nim');
            $nama   = $this->input->post('nama');
            $no_tlp = $this->input->post('no_tlp');
            $email  = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $tgl_lahir     = $this->input->post('tgl_lahir');

            $value   = array(
                'nama_mahasiswa'      => $nama,
                'no_tlp'    => $no_tlp,
                'email'     => $email,
                'alamat'    => $alamat,
                'tgl_lahir' => $tgl_lahir
            );
            $where  = array('nim'  => $nim);
            $res    = $this->db->update('mahasiswa', $value, $where);
            if ($res >= 1) {
                $this->session->set_flashdata('message', 
                    '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                        Profile berhasil diperbaharui
                    </div>');
                redirect('account');
            }
        }else{
            // dengan edit foto
            $config['upload_path']    = 'upload/mhs/';
            $config['allowed_types']  = 'gif|jpg|png';
            // load library upload
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                // menampilkan pesan error
                print_r($error);
            }else{
                $nim    = $this->input->post('nim');
                $nama   = $this->input->post('nama');
                $no_tlp = $this->input->post('no_tlp');
                $email  = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $foto   = $this->upload->data();
                $tgl_lahir     = $this->input->post('tgl_lahir');

                $value   = array(
                    'nama_mahasiswa'      => $nama,
                    'no_tlp'    => $no_tlp,
                    'email'     => $email,
                    'alamat'    => $alamat,
                    'tgl_lahir' => $tgl_lahir,
                    'foto'    => $foto['file_name']
                );
                $where   = array('nim'  => $nim);
                $res     = $this->db->update('mahasiswa', $value, $where);
                if ($res >= 1) {
                    $this->session->set_flashdata('message', 
                        '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                            Profile berhasil diperbaharui
                        </div>');
                    redirect('account');
                }
            }
        }
    }

    public function editprofildosen()
    {
        $cek       = $_FILES['foto']['name'];
        if ($cek == "") {
            //tanpa edit foto
            $id_dosen   = $this->input->post('id_dosen');
            $nama       = $this->input->post('nama');
            $no_tlp     = $this->input->post('no_tlp');
            $email      = $this->input->post('email');
            $tgl_lahir  = $this->input->post('tgl_lahir');
            $tempat_lahir = $this->input->post('tempat_lahir');

            $value   = array(
                'nama_dosen'    => $nama,
                'no_tlp'        => $no_tlp,
                'email'         => $email,
                'tgl_lahir'     => $tgl_lahir,
                'tempat_lahir'  => $tempat_lahir
            );
            $where  = array('id_dosen'  => $id_dosen);
            $res    = $this->db->update('dosen', $value, $where);
            if ($res >= 1) {
                $this->session->set_flashdata('message', 
                    '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                        Profile berhasil diperbaharui
                    </div>');
                redirect('account');
            }
        }else{
            $config['upload_path']    = 'upload/dosen/';
            $config['allowed_types']  = 'gif|jpg|png';
            // load library upload
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                // menampilkan pesan error
                print_r($error);
            }else{
                $id_dosen   = $this->input->post('id_dosen');
                $nama       = $this->input->post('nama');
                $no_tlp     = $this->input->post('no_tlp');
                $email      = $this->input->post('email');
                $tgl_lahir  = $this->input->post('tgl_lahir');
                $foto       = $this->upload->data();
                $tempat_lahir = $this->input->post('tempat_lahir');
                
                $value   = array(
                    'nama_dosen'    => $nama,
                    'no_tlp'        => $no_tlp,
                    'email'         => $email,
                    'tgl_lahir'     => $tgl_lahir,
                    'tempat_lahir'  => $tempat_lahir,
                    'foto'          => $foto['file_name']
                );
                $where  = array('id_dosen'  => $id_dosen);
                $res    = $this->db->update('dosen', $value, $where);
                if ($res >= 1) {
                    $this->session->set_flashdata('message', 
                        '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                            Profile berhasil diperbaharui
                        </div>');
                    redirect('account');
                }
            }
        }
    }

    public function editDetail()
    {
        $id_user    = $this->input->post('id_user');
        $pendidikan = $this->input->post('pendidikan');
        $pangkat    = $this->input->post('pangkat');
        $alamat     = $this->input->post('alamat');
        $jab_akd    = $this->input->post('jab_akd');
        $jab_str    = $this->input->post('jab_str');
        $peng_sert  = $this->input->post('peng_sert');
        $peng_jabatan    = $this->input->post('peng_jabatan');

        $value = array(
            'pendidikan'    => strtoupper($pendidikan),
            'pangkat'       => strtoupper($pangkat),
            'alamat'        => strtoupper($alamat),
            'jab_akd'       => strtoupper($jab_akd),
            'jab_str'       => strtoupper($jab_str),
            'peng_sert'     => strtoupper($peng_sert),
            'peng_jabatan'  => strtoupper($peng_jabatan)
        );
        $where   = array('id_user'  => $id_user);

        $res        = $this->db->update('user', $value, $where);
        if ($res >= 1) {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                Profile berhasil diperbaharui
            </div>');
          redirect('account');
        }
    }

    public function editDetailDosen()
    {
        $id_dosen    = $this->input->post('id_dosen');
        $pendidikan = $this->input->post('pendidikan');
        $pangkat    = $this->input->post('pangkat');
        $alamat     = $this->input->post('alamat');
        $jab_akd    = $this->input->post('jab_akd');
        $jab_str    = $this->input->post('jab_str');
        $peng_sert  = $this->input->post('peng_sert');
        $peng_jabatan    = $this->input->post('peng_jabatan');

        $value = array(
            'pendidikan'    => strtoupper($pendidikan),
            'pangkat'       => strtoupper($pangkat),
            'alamat'        => strtoupper($alamat),
            'jab_akd'       => strtoupper($jab_akd),
            'jab_str'       => strtoupper($jab_str),
            'peng_sert'     => strtoupper($peng_sert),
            'peng_jabatan'  => strtoupper($peng_jabatan),
            'tgl_lahir'     => strtoupper($tgl_lahir),
            'tempat_lahir'  => strtoupper($tempat_lahir)
        );
        $where   = array('id_dosen'  => $id_dosen);

        $res        = $this->db->update('dosen', $value, $where);
        if ($res >= 1) {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                Profile berhasil diperbaharui
            </div>');
          redirect('account');
        }
    }

    public function changePass()
    {
        $this->form_validation->set_rules('new_pass1', 'New Password', 'trim|required|min_length[3]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'Repeat Password', 'trim|required|min_length[3]|matches[new_pass1]');

        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('message1', 
                '<div class="alert alert-danger" style="width:20%; position: fixed; top: 80%; right:1%">'.validation_errors().'</div>');
            redirect('account');
        }else{
            $id_user      = $this->session->userdata('id');
            $new_pass     = $this->input->post('new_pass1');

            $this->db->set('password', md5($new_pass));
            $this->db->where('id_user', $this->session->userdata('id'));
            $this->db->update('user');

            $this->session->set_flashdata('message', 
                '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    Password berhasil diperbaharui
                </div>');
            redirect('account');
        }
    }

    public function changePassMhs()
    {
        $this->form_validation->set_rules('new_pass1', 'New Password', 'trim|required|min_length[3]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'Repeat Password', 'trim|required|min_length[3]|matches[new_pass1]');

        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('message1', 
                '<div class="alert alert-danger" style="width:20%; position: fixed; top: 80%; right:1%">'.validation_errors().'</div>');
            redirect('account');
        }else{
            $nim      = $this->session->userdata('nim');
            $new_pass     = $this->input->post('new_pass1');
            $this->db->set('password', md5($new_pass));
            $this->db->where('nim', $nim);
            $this->db->update('mahasiswa');

            $this->session->set_flashdata('message', 
                '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    Password berhasil diperbaharui
                </div>');
            redirect('account');
        }
    }
    
    public function changePassDosen()
    {
        $this->form_validation->set_rules('new_pass1', 'New Password', 'trim|required|min_length[3]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'Repeat Password', 'trim|required|min_length[3]|matches[new_pass1]');

        if($this->form_validation->run() == false) {
            die('masuk 1');
            $this->session->set_flashdata('message1', 
            '<div class="alert alert-danger" style="width:20%; position: fixed; top: 80%; right:1%">'.validation_errors().'</div>');
            redirect('account');
        }else{
            $id_dosen       = $this->session->userdata('id_dosen');
            $new_pass       = $this->input->post('new_pass1');
            $this->db->set('password', md5($new_pass));
            $this->db->where('id_dosen', $id_dosen);
            $this->db->update('dosen');

            $this->session->set_flashdata('message', 
                '<div class="alert alert-success hide-it" style="width:20%; height:7%; position: fixed; top: 85%; right:1%">
                    Password berhasil diperbaharui
                </div>');
            redirect('account');
        }    
    }
  
  }
  
  /* End of file Controllername.php */
  