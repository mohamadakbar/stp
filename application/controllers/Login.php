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
    $password = md5($this->input->post('password'));

    $cek      = $this->M_login->loginAct($email);
    
    if ($cek) {
      foreach ($cek as $ck) {
        if ($ck->password == $password) {
          if ($ck->aktif != 0) {
            if ($ck->aktif != 9) {
                $userdata = array(
                  'email'   => $ck->email,
                  'nama'    => $ck->nama,
                  'id'      => $ck->id_user,
                  'id_akses'=> $ck->id_akses,
                  'level'   => $ck->level,
                  'aktif'   => $ck->aktif,
                );
                $this->session->set_userdata($userdata);
                redirect('home');
            }else{
              $this->session->set_flashdata('message', 
              '<div class="alert alert-warning">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p class="warn">Akun belum Aktif, silakan hubungi admin!</p>
                </div>');
              redirect('login');
            }
          }else{
            $this->session->set_flashdata('message', 
            '<div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p class="warn">Email belum Aktif, silakan cek email anda untuk verifikasi!</p>
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

  public function forgotpass()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == false) {
      $this->load->view('v_forgotpass');
    } else {
      $email  = $this->input->post('email');
      $user   = $this->db->get_where('user', ['email' => $email, 'aktif' => 1])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = array(
            'email' => $email,
            'token' => $token,
            'created_at' => time()
          );

        $this->db->insert('token', $user_token);
        $this->_kirimemail($token, 'forgot');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="warn">Please check your email to reset password</p>
          </div>');
        redirect('login');

      }else{
        $this->session->set_flashdata('message', 
        '<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="warn">Email is not registred or activated!</p>
          </div>');
        redirect('login');
      }
    }
  }

  private function _kirimemail($token, $type)
  {
    $config   = array(
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'mohamadakbar1102@gmail.com',
      'smtp_pass' => 'passwordnyaabcde-12345',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    );

    $this->load->library('email', $config);
    
    $this->email->from('mohamadakbar1102@gmail.com', 'Akbar');
    $this->email->to($this->input->post('email'));

    if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('Klik link ini untuk reset password anda <a href="'.base_url().'login/reset?email='. $this->input->post('email') . '&token=' .urlencode($token). '">Reset Password</a>');
    }
    
    if ($this->email->send()) {
      return true;
    }else{
      echo $this->email->print_debugger();
      die();
    }
    
  }

  public function reset()
  {
    $email  = $this->input->get('email');
    $token  = $this->input->get('token');

    $user   = $this->db->get_where('user', ['email' => $email])->row_array();
    if ($user) {
      $user_token = $this->db->get_where('token', ['token' => $token])->row_array();

        if ($user_token){
          
          if(time() - $user_token['created_at'] < 86400) {

            $this->session->set_userdata('reset_email', $email);
            $this->changepass();
          }else{
            $this->db->delete('user', ['email' => $email]);
            $this->db->delete('token', ['email' => $email]);

            $this->session->set_flashdata('message', 
            '<div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p class="warn">Aktivasi akun gagal : Token kadaluarsa</p>
            </div>');
            redirect('login');
            }
        }else{
          $this->session->set_flashdata('message', 
          '<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <p class="warn">Aktivasi akun gagal : Token salah</p>
          </div>');
          redirect('login');
        }

    }else{
      $this->session->set_flashdata('message', 
      '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p class="warn">Aktivasi akun gagal : Email salah</p>
      </div>');
      redirect('login');
    }
  }

  public function changepass()
  {
    if (!$this->session->userdata('reset_email')  ) {
      redirect('login');
    }
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('v_resetpass');
    }else{
      $pass   = $this->input->post('password1');
      $email  = $this->session->userdata('reset_email');

      $this->db->set('password', $pass);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->unset_userdata('reset_email');

      $this->session->set_flashdata('message', 
      '<div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p class="warn">Password berhasil di ubah, silakan login</p>
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