<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index()
    {
        $data = $this->session->all_userdata();
        $this->session->sess_destroy();
        redirect('/login');
    }

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */
