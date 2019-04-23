<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_login');
  }

  public function index()
  {
    if ($this->session->userdata('id')) {
      redirect('home');
    }
    $this->load->view('v_login');
  }

  public function masuk()
  {
    $email    = $this->input->post('email');
    $password = $this->input->post('password');

    $cek      = $this->M_login->loginAct($email);
    $userdata = array(
                'email'   => $cek['email'],
                'nama'    => $cek['nama'],
                'id_akses'=> $cek['id_akses'],
                'id'      => $cek['id_user'],
                'level'   => $cek['level'],
                'aktif'   => $cek['aktif'],
    );
    $this->session->set_userdata($userdata);
    $cekakses = $this->db->get_where('detailakses', ['id_akses' => $userdata['id_akses']])->result_array();

    if ($cek) {
      //user ada
      if ($cek['aktif'] != 0) {
        //user aktif
        if ($password == $cek['password']) {
          //password benar
          if (count($cekakses) > 0 ) {
            redirect('home');
          }else{
            $this->session->set_flashdata('message',
            '<div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <p class="warn">Akun belum aktif, silakan hubungi admin!</p>
            </div>');
            redirect('login');
          }
        }else{
          $this->session->set_flashdata('message', 
          '<div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <p class="warn">Wrong password!</p>
            </div>');
          redirect('login');
        }
      }else{
        $this->session->set_flashdata('message', 
        '<div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="warn">Email belum di verifikasi, silakan cek email anda!</p>
          </div>');
        redirect('login');
      }

    }else{
      $this->session->set_flashdata('message', 
      '<div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p class="warn">Email is not registred!</p>
        </div>');
      redirect('login');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */