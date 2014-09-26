<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_order extends CI_Model {

    public function orders_count()
    {
        $this->db->where('user_id !=', 0);
        return $this->db->count_all_results('orders');
    }

    public function orders($offset)
    {
        $sql = "SELECT      o.order_id, o.user_id, o.order_amount, o.paid_amount,
                            o.payment_currency, o.`status`, o.created_at, o.paid_at, u.email,
                            CONCAT(u.first_name, ' ', u.last_name) full_name
                FROM        orders o
                JOIN        users u
                ON          o.user_id = u.user_id
                WHERE       u.user_id != 0
                ORDER BY    order_id DESC
                LIMIT       ?, ?";

        $param = array($offset, ORDERS_LIMIT);

        return $this->db->query($sql, $param)->result();
    }

    public function get_order($order_id)
    {
        $sql = "SELECT      o.order_id, o.user_id, o.order_amount, o.paid_amount,
                            o.payment_currency, o.`status`, o.created_at, o.paid_at, u.email,
                            CONCAT(u.first_name, ' ', u.last_name) full_name
                FROM        orders o
                JOIN        users u
                ON          o.user_id = u.user_id
                WHERE       o.order_id = ?";

        $param = array($order_id);
        $data  = $this->db->query($sql, $param)->result();

        return $data ? $data[0] : false;
    }

    public function get_user_order($order_id)
    {
        $sql = "SELECT      o.order_id,  o.user_id, o.order_amount, o.paid_amount,
                            o.payment_currency, o.`status`, o.created_at, o.paid_at, u.email,
                            CONCAT(u.first_name, ' ', u.last_name) full_name
                FROM        orders o
                JOIN        users u
                ON          o.user_id = u.user_id
                WHERE       o.order_id = ?
                AND         o.user_id = ?
                AND         o.`status` = 'Confirmed'";

        $param = array($order_id, $this->session->userdata('user_id'));
        $data  = $this->db->query($sql, $param)->result();

        return $data ? $data[0] : false;
    }

    public function get_products($order_id)
    {
        $this->db->select('product_ids');
        $this->db->from('orders');
        $this->db->where('order_id', $order_id);

        $data           = $this->db->get()->result();
        $product_ids    = $data[0]->product_ids;

        $sql = "SELECT product_id, title, slug, sale_price FROM products
                WHERE product_id IN ($product_ids)";

        return $this->db->query($sql)->result();
    }

    public function transaction_log($order_id)
    {
        $this->db->select('*');
        $this->db->from('orders_logs');
        $this->db->where('order_id_received', $order_id);

        return $this->db->get()->result();
    }

    public function cancel($order_id, $user_id)
    {
        $this->db->where('order_id', $order_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 'Pending');
        $this->db->delete('orders');
    }
}

/* End of file model_order.php */
/* Location: ./application/models/model_order.php */