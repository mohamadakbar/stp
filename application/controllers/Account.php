<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Account extends CI_Controller {
  
    public function __construct()
    {
      parent::__construct();
      
      // is_logged_in();
      $this->load->model('M_ticket');
      $this->load->model('M_menu');
      $uid = $this->session->userdata('id');
      $data['menu'] = $this->M_menu->sysmenu($uid);
      $this->load->view('layout/feheader', $data);
    }
    
    public function index()
    {
      $this->load->view('user/v_account');
      $this->load->view('layout/fefooter');
    }
  
  }
  
  /* End of file Controllername.php */
  