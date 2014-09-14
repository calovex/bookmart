<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['page_name'] 	= 'home/index';
		$this->load->view('theme/index', $data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */