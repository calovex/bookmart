<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $user_type = $this->session->userdata('user_type');

        if($user_type == 'admin')
        {
            redirect('orders');
        }

        $this->load->model('model_dashboard');

		$data['page_name'] 		= 'dashboard/index';
		$data['page_title'] 	= 'Your Bookmart Account - Dashboard';
        $data['orders']         = $this->model_dashboard->orders();
        $data['ebooks']         = $this->model_dashboard->ebooks();

		$this->load->view('theme/index', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */