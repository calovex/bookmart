<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['page_name'] 		= 'dashboard/index';
		$data['page_title'] 	= 'Your Bookmart Account - Dashboard';

		$this->load->view('theme/index', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */