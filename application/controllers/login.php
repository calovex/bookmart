<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
    {
    	if( $this->session->userdata('logged_in') )
		{
			redirect('dashboard');
		}

        if ($this->form_validation->run('login') == false)
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');            
            $data['status'] = '';
        } 
        else 
        { // form validation success
            $this->load->model('model_user');            
            $data = $this->model_user->verify_login();
            if ($data)
            { //login success
                $this->session->set_userdata($data);
                redirect('/dashboard');
            }
            else
            { //login failed
                $data['status'] = 'failed';
            }
        }

        $data['page_name'] 		= 'user/login';
        $data['page_title'] 	= 'Bookmart Account - Login';

        $this->load->view('theme/index', $data);
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */