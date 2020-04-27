<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ManageMenu extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_active();
		menu();
  }
  
  	public function index()
  	{
		$data['getmenu']	= $this->db->get_where('menu', ['parent' => 1])->result();
		$data['menu']		= $this->M_user->menu();
		$this->load->view('v_managemenu', $data);
		$this->load->view('layout/fefooter');
	}
	
	public function store()
	{
		$nama 		= $this->input->post('namamenu');
		$slug 		= $this->input->post('slug');
		$menuutama	= $this->input->post('menuutama');
		$submenu	= $this->input->post('submenu');
		$icon		= $this->input->post('icon');

		if ($icon == null) {
			$arr 	= array(
				'nama_menu' => $nama,
				'slug'			=> $slug,
				'parent'		=> $menuutama,
				'child'			=> 0,
				'icon'			=> $icon,
			);
		}else{
			$arr 	= array(
				'nama_menu' => $nama,
				'slug'			=> $slug,
				'parent'		=> $menuutama,
				'child'			=> $submenu,
				'icon'			=> $icon,
			);
		}

		$this->db->insert('menu', $arr);
		redirect('managemenu');
	}

	public function edit()
	{
		$id 	= $this->input->post('id_menu');
		$nama   = $this->input->post('nama');
		$slug   = $this->input->post('slug');
		$menu 	= $this->input->post('menuutama');
		$submenu= $this->input->post('submenu');

		$this->db->where('id_menu', $id);
		$this->db->update('menu', ['nama_menu' => $nama, 'slug' => $slug, 'parent' => $menu, 'child' => $submenu]);
    	redirect('managemenu');
	}


	public function delete($id)
{
	$this->db->where('id_menu', $id);
	$this->db->delete('menu');
	redirect('managemenu');
}

}
/* End of file Controllername.php */
