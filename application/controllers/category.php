<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function products($slug, $offset = 0)
	{
		$offset = (int)$offset;

		$this->load->model('model_category');

		$category = $this->model_category->get_category_slug($slug);

		if($category == false)
		{
			redirect('/');
		}

		$config['base_url'] 	= base_url('category/'.$slug);
		$config['total_rows'] 	= $this->model_category->get_products_count($category->category_id);
		$config['per_page'] 	= PRODUCTS_LIMIT_BM;
		$config['uri_segment'] 	= 3;
		$config['num_links'] 	= 3;

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$products = $this->model_category->get_products($category->category_id, $offset);

		$data['page_name'] 		= 'categories/view';
    	$data['page_title'] 	= 'Bookmart - '.$category->name;
    	$data['category'] 		= $category;
    	$data['products'] 		= $products;	
    	
		$this->load->view('theme/index', $data);
	}

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */