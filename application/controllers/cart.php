<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function index()
    {
        $this->load->library('cart');

        $data = $this->cart->contents();
        // echo '<pre>'.print_r($data, true).'</pre>'; exit();

        $data['page_name']      = 'cart/index';
        $data['page_title']     = 'Shopping Cart - Bookmart';

        $this->load->view('theme/index', $data);
    }

    public function add($product_id = 0)
    {
        $product_id = (int)$product_id;

        if(! $product_id)
        {
            redirect('/');
        }

        $this->load->model('model_cart');

        $product = $this->model_cart->get_product($product_id);

        if($product == false)
        {
            redirect('/');
        }

        /*
            if user goes back to the website from order summary page
            and tries to add items to the cart
        */
        $pending_order_id = $this->session->userdata('pending_order_id');

        if($pending_order_id)
        {
            $user_id = $this->session->userdata('user_id');
            
            $this->load->model('model_order');
            $this->model_order->cancel($pending_order_id, $user_id);
            $this->session->unset_userdata('pending_order_id');
        }

        $this->load->library('cart');
        $this->cart->insert($product);

        redirect('cart');
    }

    public function remove_item($row_id)
    {
        /*
            if user goes back to the website from order summary page
            and tries to remove items to the cart
        */
        $pending_order_id = $this->session->userdata('pending_order_id');

        if($pending_order_id)
        {
            $user_id = $this->session->userdata('user_id');
            
            $this->load->model('model_order');
            $this->model_order->cancel($pending_order_id, $user_id);
            $this->session->unset_userdata('pending_order_id');
        }

        $data = array('rowid' => $row_id, 'qty' => 0);

        $this->load->library('cart');
        $this->cart->update($data); 

        redirect('cart');
    }

}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */
