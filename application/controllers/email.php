<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
    
    /* //for testing purpose only
    public function send()
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
    
        $this->load->library('email', $config);
        $this->email->from(SMTP_USER, 'Bookmart');
        $this->email->to('nivincp@gmail.com'); 
        
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');  

        $this->email->send();

        echo $this->email->print_debugger();
    }*/

}

/* End of file email.php */
/* Location: ./application/controllers/email.php */
