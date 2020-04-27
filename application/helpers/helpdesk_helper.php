<?php 

function is_logged_in()
{
  $ci = get_instance();
  if(empty($ci->session->userdata('id'))) {
    redirect('login');
  }else {
    $id_akses  = $ci->session->userdata('id_akses');
    $uri    = $ci->uri->segment(1);

    $qmenu  = $ci->db->get_where('menu', ['slug' => $uri])->row_array();
    $menu   = $qmenu['id_menu'];

    $akses  = $ci->db->get_where('detailakses',[
                  'id_akses'  => $id_akses,
                  'id_menu'   => $menu 
                ]);
    if ($akses->num_rows() < 1) {
      redirect('auth/blocked');
    }
  }
}

function is_active()
{
  $ci = get_instance();
  $aktif  = $ci->session->userdata('aktif');

  if ($aktif == 0) {
    redirect('login');
  }

}

function menu()
{
  $ci = get_instance();

  $ci->load->model('M_menu');
  $ci->load->model('M_user');
  $ci->load->model('M_mahasiswa');
  $ci->load->model('M_dosen');
  $uid                = $ci->session->userdata('id');
  $nim                = $ci->session->userdata('nim');
  $id_dosen 			    = $ci->session->userdata('id_dosen');
  $data['menu']       = $ci->M_menu->sysmenu($uid);
  $data['menu_mhs'] 	= $ci->M_menu->sysmenu_mhs($nim);
  $data['menu_dosen']	= $ci->M_menu->sysmenu_dosen($id_dosen);
  $data['getuser']    = $ci->M_user->ambilUser($uid);
  $data['getmhs']     = $ci->M_mahasiswa->getMhsByNim($nim);
  $data['getdosen']   = $ci->M_dosen->getDosenByid($id_dosen);
  $ci->load->view('layout/feheader', $data);
}