<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function index()
	{
		$this->load->library('cart');

		if( $this->cart->contents() )
		{
			$this->load->model('model_cart');
			
			$user_id 			= $this->session->userdata('user_id');
	        $data['page_title'] = 'Bookmart - Checkout';

	        if($user_id)
	        {
	        	/*
	        		if there is a pending order id in session use it instead of
	        		creating a new order else create abd add order id to session
	        	*/

	        	$pending_order_id = $this->session->userdata('pending_order_id');

	        	if($pending_order_id == false)
	        	{
	        		$pending_order_id = $this->model_cart->create_order($user_id);	        		
	        		
	        		$data = array('pending_order_id' => $pending_order_id);
	        		$this->session->set_userdata($data);
	        	}

	        	$data['order_id'] = $pending_order_id;	        	
	        	$this->load->view('checkout/logged_in', $data);
	        }
	        else
	        {
	        	$data['page_name'] = 'checkout/login';
	        	$data['countries'] = $this->model_cart->get_countries();

	        	$this->load->view('theme/index', $data);
	        }	        
	    }
	    else
	    {
	    	redirect('cart');
	    }
	}

	public function guest()
	{
		if( $this->session->userdata('logged_in') )
		{
			redirect('cart');
		}

		$this->load->library('cart');
		$this->load->model('model_user');

		if ($this->form_validation->run('guest_checkout') == false)
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			$data['page_name'] 		= 'checkout/login';
			$data['page_title'] 	= 'Bookmart - Checkout';
			$data['countries'] 		= $this->model_user->get_countries();

			$this->load->view('theme/index', $data);
		}
		else
		{
			$guest_pwd 	= $this->model_user->create('guest');
			$data	 	= $this->model_user->verify_login($guest_pwd);

			if($data)
			{ //login success
				$this->session->set_userdata($data);
				redirect('checkout');
			}
			else
			{ //login failed

				die('Something went wrong with the guest checkout.');
			}
		}
	}

	public function login()
	{
		$this->load->library('cart');
		$this->load->model('model_user');

		if( $this->session->userdata('logged_in') )
		{
			redirect('cart');
		}

        if ($this->form_validation->run('login') == false)
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $data['status'] = '';
        }
        else
        { // form validation success
            $data = $this->model_user->verify_login();

            if ($data)
            { //login success
                $this->session->set_userdata($data);
                redirect('checkout');
            }
            else
            { //login failed
                $data['status'] = 'failed';
            }
        }

        $data['page_name'] 		= 'checkout/login';
        $data['page_title'] 	= 'Bookmart - Checkout';
        $data['countries'] 		= $this->model_user->get_countries();

        $this->load->view('theme/index', $data);
	}

	public function cancelled()
	{
		$data['page_name'] 		= 'checkout/cancelled';
        $data['page_title'] 	= 'Bookmart - Payment Cancelled';

        $this->load->view('theme/index', $data);
	}

	public function success()
	{
        $this->load->library('cart');
        $this->cart->destroy();

        $this->session->unset_userdata('pending_order_id');

		$data['page_name'] 		= 'checkout/success';
        $data['page_title'] 	= 'Bookmart - Payment success';

        $this->load->view('theme/index', $data);
	}

}

/* End of file checkout.php */
/* Location: ./application/controllers/checkout.php */