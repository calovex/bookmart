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

        	$data['service_types'] = array('Paid' => 'Paid', 'Free' => 'Free');
        	$data['types'] = array('Downloadable' => 'Downloadable', 'Shipped' => 'Shipped');

			$this->load->view('theme/index', $data);
		}
		else
		{
			$product_id = $this->model_product->create();

			$message = '<div class="bg-success">New product has been created successfully.</div>';
			$this->session->set_flashdata('message', $message);

			redirect('products/edit/'.$product_id);
		}
	}

	public function edit($product_id = 0)
	{
		$product_id = (int) $product_id;

		if(! $product_id)
		{
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

        	$data['service_types'] = array('Paid' => 'Paid', 'Free' => 'Free');
        	$data['types'] = array('Downloadable' => 'Downloadable', 'Shipped' => 'Shipped');

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

	public function images($product_id = 0)
	{
		$product_id = (int)$product_id;

		if(! $product_id)
		{
			redirect('products');
		}

		$this->load->model('model_product');

		$config['upload_path'] 		= './uploads/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '250';
		$config['max_width']  		= '1024';
		$config['max_height']  		= '768';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			$data['images'] 		= $this->model_product->get_images($product_id);
			$data['product_id'] 	= $product_id;
			$data['product_name'] 	= $this->model_product->get_product_name($product_id);
			$data['errors'] 		= $this->upload->display_errors();
			$data['page_name'] 		= 'products/images';
	        $data['page_title'] 	= 'Manage Product Images';

			$this->load->view('theme/index', $data);
		}
		else
		{
			$upload_data 	= $this->upload->data();
			$file_name 		= $upload_data['file_name'];

			$this->model_product->create_image($product_id, $file_name);

			$message = '<div class="bg-success">Image has been uploaded successfully.</div>';
			$this->session->set_flashdata('message', $message);
			redirect('products/images/'.$product_id);
		}
	}

	public function ebooks($product_id = 0)
	{
		$product_id = (int)$product_id;

		if(! $product_id)
		{
			redirect('products');
		}

		$this->load->model('model_product');

		$config['upload_path'] 		= EBOOKS_PATH;
		$config['allowed_types'] 	= 'epub|pdf|doc|docx';
		$config['max_size']			= '2024';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			$data['ebooks'] 		= $this->model_product->get_ebooks($product_id);
			$data['product_id'] 	= $product_id;
			$data['product_name'] 	= $this->model_product->get_product_name($product_id);
			$data['errors'] 		= $this->upload->display_errors();
			$data['page_name'] 		= 'products/ebooks';
	        $data['page_title'] 	= 'Manage Ebooks';

			$this->load->view('theme/index', $data);
		}
		else
		{
			$upload_data 	= $this->upload->data();
			$file_name 		= $upload_data['file_name'];

			$this->model_product->create_ebook($product_id, $file_name);

			$message = '<div class="bg-success">Ebook has been uploaded successfully.</div>';
			$this->session->set_flashdata('message', $message);
			redirect('products/ebooks/'.$product_id);
		}
	}

	public function delete($product_id = 0)
	{
		$product_id = (int)$product_id;

		if(! $product_id)
		{
			redirect('products');
		}

		$this->load->model('model_product');
		$this->model_product->delete($product_id);

		$message = '<div class="bg-success">Product has been deleted successfully.</div>';
		$this->session->set_flashdata('message', $message);
		redirect('products');
	}

	public function delete_image($products_images_id = 0)
	{
		$products_images_id = (int)$products_images_id;

		if(! $products_images_id)
		{
			redirect('products');
		}

		$this->load->model('model_product');

		$image = $this->model_product->get_image($products_images_id);

		if($image)
		{
			$this->model_product->delete_image($image->product_id, $products_images_id, $image->name);

			$message = '<div class="bg-success">Image has been deleted successfully.</div>';
			$this->session->set_flashdata('message', $message);
			redirect('products/images/'.$image->product_id);
		}
	}

	public function cover_image($products_images_id = 0)
	{
		$products_images_id = (int)$products_images_id;

		if(! $products_images_id)
		{
			redirect('products');
		}

		$this->load->model('model_product');

		$image = $this->model_product->get_image($products_images_id);

		if($image)
		{
			$this->model_product->set_cover($image->product_id, $products_images_id, $image->name);

			$message = '<div class="bg-success">Image has been set as the cover.</div>';
			$this->session->set_flashdata('message', $message);
			redirect('products/images/'.$image->product_id);
		}
	}

    public function set_promotion($products_images_id = 0, $product_id = 0)
    {
        $products_images_id = (int)$products_images_id;
        $product_id         = (int)$product_id;

        if(! $products_images_id)
        {
            redirect('products');
        }

        $this->load->model('model_product');

        $image = $this->model_product->set_promotion($products_images_id);


        $message = '<div class="bg-success">Product has been set as the promotion in home page.</div>';
        $this->session->set_flashdata('message', $message);
        redirect('products/images/'.$product_id);
    }

    public function slider_image($products_images_id = 0, $product_id = 0)
    {
        $products_images_id = (int)$products_images_id;
        $product_id         = (int)$product_id;

        if(! $products_images_id)
        {
            redirect('products');
        }

        $this->load->model('model_product');

        $image = $this->model_product->set_slider_image($products_images_id);


        $message = '<div class="bg-success">Image has been added to the slideshow in home page.</div>';
        $this->session->set_flashdata('message', $message);
        redirect('products/images/'.$product_id);
    }

    public function remove_slider($products_images_id = 0, $product_id = 0)
    {
        $products_images_id = (int)$products_images_id;
        $product_id         = (int)$product_id;

        if(! $products_images_id)
        {
            redirect('products');
        }

        $this->load->model('model_product');

        $image = $this->model_product->remove_slider($products_images_id);


        $message = '<div class="bg-success">Image has been removed from the slideshow in home page.</div>';
        $this->session->set_flashdata('message', $message);
        redirect('products/images/'.$product_id);
    }

	public function delete_ebook($products_ebooks_id = 0)
	{
		$products_ebooks_id = (int)$products_ebooks_id;

		if(! $products_ebooks_id)
		{
			redirect('products');
		}

		$this->load->model('model_product');

		$ebook = $this->model_product->get_ebook($products_ebooks_id);

		if($ebook)
		{
			$this->model_product->delete_ebook($products_ebooks_id, $ebook->name);

			$message = '<div class="bg-success">Ebook has been deleted successfully.</div>';
			$this->session->set_flashdata('message', $message);
			redirect('products/ebooks/'.$ebook->product_id);
		}
	}

}

/* End of file products.php */
/* Location: ./application/controllers/products.php */