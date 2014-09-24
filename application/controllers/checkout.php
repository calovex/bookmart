<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function index()
	{
		$this->load->library('cart');

		if( $this->cart->contents() )
		{
			$this->load->model('model_cart');		

			$data['page_name'] 		= 'checkout/digital';
	        $data['page_title'] 	= 'Bookmart - Checkout';
	        $data['countries'] 		= $this->model_cart->get_countries();
	        $data['order_id'] 		= $this->model_cart->create_order();

	        $this->load->view('theme/index', $data);
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

			$data['page_name'] 		= 'checkout/digital';
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

        $data['page_name'] 		= 'checkout/digital';
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
		$data['page_name'] 		= 'checkout/success';
        $data['page_title'] 	= 'Bookmart - Payment success';

        $this->load->view('theme/index', $data);	
	}

}

/* End of file checkout.php */
/* Location: ./application/controllers/checkout.php */