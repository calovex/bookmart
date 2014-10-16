<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->model('model_home');

        $data['page_name']      = 'home/index';
        $data['promotion']      = $this->model_home->get_promotion();
        $data['our_products']   = $this->model_home->our_products();
        $data['slides']         = $this->model_home->get_slides();

        $this->load->view('theme/index', $data);
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
