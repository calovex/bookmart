<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

    public function view($product_id, $slug)
    {
        $this->load->model('model_product');
        $product = $this->model_product->get_product_slug($product_id, $slug);

        if($product == false)
        {
            redirect('/');
        }

        $this->model_product->update_view_counter($product->product_id);

        $data['page_name']           = 'products/view';
        $data['page_title']          = 'Bookmart - '.$product->title;
        $data['product']             = $product;
        $data['related_products']    = $this->model_product->related_products($product->tags, $product->author, $product->product_id);
        $data['images']              = $this->model_product->get_images($product_id);

        $this->load->view('theme/index', $data);
    }

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */
