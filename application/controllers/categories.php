<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function index($offset = 0)
	{
		$offset = (int)$offset;

		$this->load->model('model_category');
		$this->load->library('pagination');

		$config['base_url'] 	= base_url('categories/index');
		$config['total_rows'] 	= $this->model_category->categories_count();
		$config['per_page'] 	= CATEGORIES_LIMIT;
		$config['uri_segment'] 	= 3;
		$config['num_links'] 	= 3;

		$this->pagination->initialize($config);

		$data['categories'] 	= $this->model_category->categories($offset);
		$data['page_name'] 		= 'categories/index';
        $data['page_title'] 	= 'Manage Products';

        $this->load->view('theme/index', $data);
	}

	public function edit($category_id = 0)
	{
		$category_id = (int)$category_id;

		if(! $category_id)
		{
			redirect('categories');
		}

		$this->load->model('model_category');

		if ($this->form_validation->run('category') == false)
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        	$category = $this->model_category->get_category($category_id);

        	if($category == false)
        	{
        		redirect('categories');
        	}

			$data['page_name'] 		= 'categories/edit';
        	$data['page_title'] 	= 'Edit Category';
        	$data['category'] 		= $category;
        	
			$this->load->view('theme/index', $data);
        }
        else
        {
        	$this->model_category->update($category_id);

			$message = '<div class="bg-success">Category has been updated successfully.</div>';
			$this->session->set_flashdata('message', $message);

			redirect('categories/edit/'.$category_id);
        }
	}

	public function create()
	{
		$this->load->model('model_category');

		if ($this->form_validation->run('category') == false)
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			$data['page_name'] 		= 'categories/create';
        	$data['page_title'] 	= 'New Category';
       	
			$this->load->view('theme/index', $data);
        }
        else
        {
        	$this->model_category->create();

			$message = '<div class="bg-success">New category has been created successfully.</div>';
			$this->session->set_flashdata('message', $message);

			redirect('categories');
        }
	}

	public function delete($category_id = 0)
	{
		$category_id = (int)$category_id;
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */