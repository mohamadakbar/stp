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