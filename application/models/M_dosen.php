<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {

    public function getDosen()
    {
        return $this->db->get('dosen')->result();
    }

}

/* End of file ModelName.php */
