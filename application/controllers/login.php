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

        $data['page_name']      = 'user/login';
        $data['page_title']     = 'Bookmart Account - Login';

        $this->load->view('theme/index', $data);
    }

    public function forgot_password()
    {
        if ($this->form_validation->run('forgot_pwd') == false)
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $data['result']   = 0;
            $data['response'] = validation_errors();
        }
        else
        {
            $email = $this->input->post('user_email');

            $this->load->model('model_user');
            $reset_link = $this->model_user->create_pwd_reset_link($email);

            $this->trigger_forgot_pwd_mail($reset_link);
            
            $data['result']   = 1;
            $data['response'] = '<div class="ajax-success">Please check your email for the reset link</div>';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    private function trigger_forgot_pwd_mail($reset_link)
    {
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => SMTP_HOST,
            'smtp_port' => SMTP_PORT,
            'smtp_user' => SMTP_USER,
            'smtp_pass' => SMTP_PASS,
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap'  => TRUE
        );

        $message = 'Please use the below temporary link to reset your Bookmart account password.<br><br>';
        $message .= '<a href="'.$reset_link.'">'.$reset_link.'</a>';
    
        $this->load->library('email', $config);
        $this->email->from(SMTP_USER, 'Bookmart');
        $this->email->to('nivincp@gmail.com'); 
        
        $this->email->subject('Your Bookmart Account - Password Reset');
        $this->email->message($message);  

        $this->email->send();
    }

    public function reset_password($hash = '')
    {
        if($hash == '')
        {
            redirect('/');
        }

        $this->load->model('model_user');
        $valid_code = $this->model_user->valid_reset_hash($hash);

        if($valid_code == false)
        {
            redirect('/login');
        }

        if ($this->form_validation->run('update_pwd') == false)
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $data['page_name']      = 'user/reset_password';
            $data['page_title']     = 'Bookmart Account - Reset Password';
            $data['hash']           = $hash;

            $this->load->view('theme/index', $data);
        }
        else
        {
            $password = md5($this->input->post('password'));            
            $this->model_user->reset_password($hash, $password);
            redirect('/login');
        }
    }

    public function change_password()
    {
        if ($this->form_validation->run('update_pwd') == false)
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $data['page_name']      = 'user/change_password';
            $data['page_title']     = 'Bookmart Account - Change Password';

            $this->load->view('theme/index', $data);
        }
        else
        {
            $user_id    = $this->session->userdata('user_id');
            $password   = md5($this->input->post('password'));

            $this->load->model('model_user');
            $this->model_user->update_password($user_id, $password);
            
            $message = '<div class="bg-success">Your password has been changed successfully.</div>';
            $this->session->set_flashdata('message', $message);

            redirect('login/change_password');
        }
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
