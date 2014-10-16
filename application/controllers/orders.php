<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function index($offset = 0)
    {
        $offset = (int)$offset;

        $this->load->model('model_order');
        $this->load->library('pagination');

        $config['base_url']     = base_url('orders/index');
        $config['total_rows']   = $this->model_order->orders_count();
        $config['per_page']     = ORDERS_LIMIT;
        $config['uri_segment']  = 3;
        $config['num_links']    = 3;

        $this->pagination->initialize($config);

        $data['orders']         = $this->model_order->orders($offset);
        $data['page_name']      = 'orders/index';
        $data['page_title']     = 'Manage Orders';

        $this->load->view('theme/index', $data);
    }

    public function view($order_id = 0)
    {
        $order_id = (int)$order_id;

        if(! $order_id)
        {
            redirect('orders');
        }

        $this->load->model('model_order');
        $order = $this->model_order->get_order($order_id);

        if($order == false)
        {
            redirect('orders');
        }

        $data['order']          = $order;
        $data['products']       = $this->model_order->get_products($order_id);
        $data['log']            = $this->model_order->transaction_log($order_id);
        $data['page_name']      = 'orders/view';
        $data['page_title']     = 'Order Details';

        $this->load->view('theme/index', $data);
    }

    public function details($order_id = 0)
    {
        $order_id = (int)$order_id;

        if(! $order_id)
        {
            redirect('dashboard');
        }

        $this->load->model('model_order');
        $order = $this->model_order->get_user_order($order_id);

        if($order == false)
        {
            redirect('dashboard');
        }

        $data['order']          = $order;
        $data['products']       = $this->model_order->get_products($order_id);
        $data['page_name']      = 'orders/details';
        $data['page_title']     = 'Order Details';

        $this->load->view('theme/index', $data);
    }

    public function cancel($order_id = 0)
    {
        $order_id   = (int)$order_id;
        $user_id    = $this->session->userdata('user_id');

        if(! $order_id)
        {
            redirect('/');
        }

        $this->load->model('model_order');
        $this->model_order->cancel($order_id, $user_id);

        $this->session->unset_userdata('pending_order_id');

        $this->load->library('cart');
        $this->cart->destroy();

        redirect('cart');
    }

}

/* End of file orders.php */
/* Location: ./application/controllers/orders.php */
