<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index()
    {
        if( $this->session->userdata('logged_in') )
        {
            redirect('dashboard');
        }

        $this->load->model('model_user');

        if ($this->form_validation->run('user') == false)
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $data['page_name']      = 'user/register';
            $data['page_title']     = 'Create a Bookmart Account';
            $data['countries']      = $this->model_user->get_countries();

            $this->load->view('theme/index', $data);
        }
        else
        {
            $this->model_user->create();
            $data = $this->model_user->verify_login();

            if($data)
            { //login success
                
                $this->session->set_userdata($data);

                $message = '<div class="bg-success">Thanks for creating an account with Bookmart, you have been logged in!</div>';
                $this->session->set_flashdata('message', $message);

                redirect('dashboard');
            }
            else
            { //login failed
                
                die('Something went wrong with the login.');
            }
        }
    }

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */
