<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('M_menu');
		$uid = $this->session->userdata('id');
		$data['menu'] = $this->M_menu->sysmenu($uid);
		$this->load->view('layout/feheader', $data);
	}

	public function index()
	{
		$data['user']	= $this->M_user->ambilUser();
		$this->load->view('v_user', $data);
		$this->load->view('layout/fefooter');
	}

	public function add()
	{
		$data['kode']	= $this->M_user->kode();
		$data['div']	= $this->M_user->ambildiv();
		$data['role']	= $this->M_user->menu();
		$this->load->view('v_createuser',$data);
		$this->load->view('layout/fefooter');
	}

	// public function create()
	// {
 //    $id_akses   = $this->input->post('id_akses');
 //    $nama       = $this->input->post('nama');
 //    $divisi     = $this->input->post('divisi');
 //    $email      = $this->input->post('email');
 //    $password   = $this->input->post('password');

 //    $id_akses   = array('id_akses'  => $id_akses);
 //    $user   = array(
 //      'nama'      => $nama,
 //      'no_div'    => $divisi,
 //      'email'     => $email,
 //      'password'  => $password,
 //      'aktif'     => 0);
 //    $data   = array_merge($user);

 //    if ($this->M_user->user($data,$id_akses) == FALSE) {
 //    redirect('user');
 //    }else{
 //      redirect(base_url());
 //    }
	// }

	public function edit()
	{
		$akses 			= $this->uri->segment(3);
		$data['div']	= $this->M_user->ambilDiv();
		$data['menu']	= $this->M_user->menu();
		$data['role']	= $this->M_user->role($akses);
		$data['user'] 	= $this->M_user->ambiluserwh($akses);
		$this->load->view('v_edituser', $data);
		$this->load->view('layout/fefooter');
	}

  public function updateuser()
  {
    $cek = $_FILES['foto']['name'];
    if ($cek == "") {
      //tanpa edit foto
      $id_user    = $this->input->post('id_user');
      $nama       = $this->input->post('nama');
      $divisi     = $this->input->post('divisi');
      $email      = $this->input->post('email');
      $password   = $this->input->post('password');
      $aktif 			= $this->input->post('aktif');
      // echo "<pre>";
      // var_dump($aktif);
      // echo "</pre>";
      // exit();

      $where   = array('id_user'  => $id_user);
        $value   = array(
          'id_user' => $id_user,
          'nama'      => $nama,
          'no_div'    => $divisi,
          'email'     => $email,
          'password'  => $password,
        	'aktif'			=> $aktif );
       
        $res        = $this->M_user->perbaruiuser($value, $where);
        if ($res >= 1) {
          redirect('user');
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
        $divisi     = $this->input->post('divisi');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $aktif 			= $this->input->post('aktif');
        $foto       = $this->upload->data();

        $where   = array('id_user'  => $id_user);
        $value   = array(
          'id_user' => $id_user,
          'nama'      => $nama,
          'no_div'    => $divisi,
          'email'     => $email,
          'password'  => $password,
          'foto'      => $foto['file_name'],
        	'aktif'			=> $aktif);
       
        $res        = $this->M_user->perbaruiuser($value, $where);
        if ($res >= 1) {
          redirect('user');
        }
      }
    }
  }

	public function editrole()
	{
		$akses 			= $this->uri->segment(3);
		$data['div']	= $this->M_user->ambilDiv();
		$data['menu']	= $this->M_user->menu();
		$data['role']	= $this->M_user->role($akses);
		$data['user'] 	= $this->M_user->ambiluserwh($akses);
		$this->load->view('v_editrole', $data);
		$this->load->view('layout/fefooter');
	}

	public function updaterole()
	{
		$id_akses	= $this->input->post('id_akses');
		$role			= $this->input->post('check_list');
		$delete 	= $this->M_user->hapusakses("'$id_akses'");
		$cnt 			= count($role);
		for ($i=0;$i < $cnt; $i++) {
			$detail	= array(
					'id_akses'	=> $id_akses,
					'id_menu' 	=> $role[$i]
					);
			$this->M_user->tambahakses($detail);
			$this->db->update('user', ['aktif' => 1]);
		}
		redirect('user');
	}

	public function delete()
	{
		# code...
	}


}

/* End of file User.php */
/* Location: ./application/controllers/User.php */