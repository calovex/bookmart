<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cart extends CI_Model {

    public function get_product($product_id)
    {
        $this->db->select('product_id, title, slug, sale_price, original_price, cover_image');
        $this->db->where('product_id', $product_id);
        $this->db->from('products');

        $data = $this->db->get()->result();

        return ($data) ? $this->ci_cart_format($data[0]) : false;
    }

    private function ci_cart_format($product)
    {
        $data = array(
            'id'      => $product->product_id,
            'qty'     => 1,
            'price'   => $product->sale_price,
            'name'    => $this->sanitize_cart_entry($product->title),
            'options' => array(
                'original_price'    => $product->original_price,
                'cover_image'       => $this->sanitize_cart_entry($product->cover_image),
                'url'               => base_url('product/'.$product->product_id.'/'.$product->slug)
            )
        );

        return $data;
    }

    /*
        fix for CI cart entry restrictions
        http://stackoverflow.com/questions/
        21508566/removing-restriction-on-characters-in-cart-in-codeigniter
    */
    private function sanitize_cart_entry($entry)
    {
        return preg_replace('/[^a-z0-9\.\:\-_ ]/i', '', $entry);
    }

    public function get_countries()
    {
        $countries = $this->db->get('countries')->result();

        $list = array(''=>'Select');

        foreach ($countries as $country)
        {
            $list[$country->country_id] = $country->name;
        }

        return $list;
    }

    public function create_order($user_id)
    {
        $product_ids    = array();

        foreach ($this->cart->contents() as $items)
        {
            $product_ids[] = $items['id'];
        }

        $product_ids = implode(',', $product_ids);

        //create order
        $data = array(
            'product_ids'      => $product_ids,
            'user_id'          => $user_id,
            'order_amount'     => $this->cart->format_number($this->cart->total()),
            'payment_currency' => CURRENCY_CODE,
            'created_at'       => date('Y-m-d H:i:s', time())
        );

        $this->db->insert('orders', $data);

        return $this->db->insert_id();
    }

}

/* End of file model_cart.php */
/* Location: ./application/models/model_cart.php */
