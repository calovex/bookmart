<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index($offset = 0)
	{
		$offset = (int)$offset;

		$this->load->model('model_page');
		$this->load->library('pagination');

		$config['base_url'] 	= base_url('pages/index');
		$config['total_rows'] 	= $this->model_page->pages_count();
		$config['per_page'] 	= PAGES_LIMIT;
		$config['uri_segment'] 	= 3;
		$config['num_links'] 	= 3;

		$this->pagination->initialize($config);

		$data['pages'] 			= $this->model_page->pages($offset);
		$data['page_name'] 		= 'pages/index';
        $data['page_title'] 	= 'Manage Products';

        $this->load->view('theme/index', $data);
	}

	public function edit($page_id = 0)
	{
		$page_id = (int)$page_id;

		if(! $page_id)
		{
			redirect('pages');
		}

		$this->load->model('model_page');

		if ($this->form_validation->run('page') == false)
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        	$page = $this->model_page->get_page($page_id);

        	if($page == false)
        	{
        		redirect('pages');
        	}

			$data['page_name'] 		= 'pages/edit';
        	$data['page_title'] 	= 'Edit Page - '.$page->title;
        	$data['page'] 			= $page;

			$this->load->view('theme/index', $data);
        }
        else
        {
        	$this->model_page->update($page_id);

			$message = '<div class="bg-success">Page has been updated successfully.</div>';
			$this->session->set_flashdata('message', $message);

			redirect('pages/edit/'.$page_id);
        }
	}

	public function view($page_id = 0)
	{
		$page_id = (int)$page_id;

		if(!$page_id)
		{
			redirect('/');
		}

		$this->load->model('model_page');
		$page = $this->model_page->get_page($page_id);

		if($page == false)
		{
			redirect('/');
		}

		$this->model_page->update_view_counter($page_id);

		$data['page_name'] 		= 'pages/view';
    	$data['page_title'] 	= 'Bookmart - '.$page->title;
    	$data['page'] 			= $page;

		$this->load->view('theme/index', $data);
	}

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */