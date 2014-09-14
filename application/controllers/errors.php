<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function page_missing()
	{
		$this->output->set_status_header('404'); 
        
        $data['page_name'] = 'error/404';
        
        $this->load->view('theme/index',$data); 
	}

}

/* End of file errors.php */
/* Location: ./application/controllers/errors.php */