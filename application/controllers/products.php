<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index($offset = 0)
	{
		$offset = (int)$offset;

		$this->load->model('model_product');
		$this->load->library('pagination');

		$config['base_url'] 	= base_url('products/index');
		$config['total_rows'] 	= $this->model_product->products_count();
		$config['per_page'] 	= PRODUCTS_LIMIT;
		$config['uri_segment'] 	= 3;
		$config['num_links'] 	= 3;

		$this->pagination->initialize($config);

		$data['products'] 		= $this->model_product->products($offset);
		$data['page_name'] 		= 'products/manage';
        $data['page_title'] 	= 'Manage Products';

        $this->load->view('theme/index', $data);		
	}

	public function create()
	{
		$this->load->model('model_product');
		
		if ($this->form_validation->run('product') == false)
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        	$data['categories'] 	= $this->model_product->get_categories();
			$data['page_name'] 		= 'products/create';
        	$data['page_title'] 	= 'New Product';
        	
        	$data['types'] = array(
        		'Downloadable' 	=> 'Downloadable',
        		'Shipped' 		=> 'Shipped'
        	);

			$this->load->view('theme/index', $data);
		}
		else
		{
			$this->model_product->create();
			redirect('products');
		}
	}

	public function edit($product_id = 0)
	{
		$product_id = (int) $product_id;

		if(! $product_id) {
			redirect('products');
		}

		$this->load->model('model_product');

		if ($this->form_validation->run('product') == false)
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        	$product = $this->model_product->get_product($product_id);

        	if($product == false)
        	{
        		redirect('products');
        	}

        	$data['categories'] 	= $this->model_product->products_categories($product_id);
			$data['page_name'] 		= 'products/edit';
        	$data['page_title'] 	= 'Edit Product';
        	$data['product'] 		= $product;
        	
        	$data['types'] = array(
        		'Downloadable' 	=> 'Downloadable',
        		'Shipped' 		=> 'Shipped'
        	);

			$this->load->view('theme/index', $data);
		}
		else
		{
			$this->model_product->update($product_id);

			$message = '<div class="bg-success">Product has been updated successfully.</div>';
			$this->session->set_flashdata('message', $message);

			redirect('products/edit/'.$product_id);
		}
	}

}

/* End of file products.php */
/* Location: ./application/controllers/products.php */