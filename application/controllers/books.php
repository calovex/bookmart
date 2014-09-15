<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	public function index()
	{
		$data['page_name'] 		= 'books/manage';
        $data['page_title'] 	= 'Manage Books';

        $this->load->view('theme/index', $data);		
	}

}

/* End of file books.php */
/* Location: ./application/controllers/books.php */