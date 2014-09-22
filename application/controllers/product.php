<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function view($product_id, $slug)
	{
		$data['page_name'] 		= 'products/view';
        $data['page_title'] 	= 'Bookmart - product name';

        $this->load->view('theme/index', $data);
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */