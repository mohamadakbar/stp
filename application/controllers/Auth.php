<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function blocked()
  {
    $this->load->view('v_forbidden');
  }

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */