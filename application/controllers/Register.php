<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

public function __construct()
{
  parent::__construct();
  $this->load->model('M_user');
  $this->load->library('form_validation');
}
  public function index()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',['is_unique' => 'Email sudah terdaftar, gunakan email lain']);
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]', [
      'matches' => 'Password tidak sama!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password]');

    if ($this->form_validation->run() == false) {
      $data['div']  = $this->M_user->ambilDiv();
      $data['kode'] = $this->M_user->kode();
      $this->load->view('v_regis', $data);
    } else {
      $this->create();
    } 
    
  }

  function create()
  {

    $id_akses   = $this->input->post('id_akses');
    $nama       = $this->input->post('nama');
    $divisi     = $this->input->post('divisi');
    $email      = $this->input->post('email');
    $password   = $this->input->post('password');

    $id_akses   = array('id_akses'  => $id_akses);
    $user   = array(
      'nama'      => $nama,
      'no_div'    => $divisi,
      'email'     => $email,
      'password'  => $password,
      'aktif'     => 0
    );
    $data   = array_merge($user);

    $token  = base64_encode(random_bytes(32));
    $user_token = [
      'email' => $email,
      'token' => $token,
      'created_at' => time()
    ];

    $this->M_user->user($data,$id_akses);
    $this->db->insert('token', $user_token);

    $this->_kirimemail($token, 'verify');

    $this->session->set_flashdata('message', 
      '<div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <center>Akun berhasil dibuat .. Silakan cek email anda</center>
      </div>');
      redirect('login');
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
    
    $this->email->from('akbar@sadhanas.co.id', 'Akbar');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Verifikasi Akun');
      $this->email->message('Klik link ini untuk verifikasi akun anda <a href="'.base_url().'register/verifikasi?email='. $this->input->post('email') . '&token=' .urlencode($token). '">Aktivasi</a>');
    }
    
    if ($this->email->send()) {
      return true;
    }else{
      echo $this->email->print_debugger();
      die();
    }
    
  }

  public function verifikasi()
  {
    $email  = $this->input->get('email');
    $token  = $this->input->get('token');

    $user   = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('token', ['token' => $token])->row_array();

      if ($user_token) {
        if (time() - $user_token['created_at'] < 86400) {
          $this->db->set('aktif', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('token', ['email' => $email]);

          $this->session->set_flashdata('message', 
          '<div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <center><p>'.$email.' telah aktif. Silakan Login.</p></center>
          </div>');
          redirect('login');

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
            <p class="warn">Aktivasi akun gagal : Token tidak valid</p>
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

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */