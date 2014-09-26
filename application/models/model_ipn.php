<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ipn extends CI_Model {

    public function get_paypal_order($order_id)
    {
        $this->db->select('order_amount,payment_currency');
        $this->db->from('orders');
        $this->db->where('order_id', $order_id);
        $this->db->where('status', 'Pending');
        $data = $this->db->get()->result();

        return $data ? $data[0] : false;
    }

    public function existing_paypal_txn_id($txn_id)
    {
        $this->db->select('txn_id');
        $this->db->from('orders_logs');
        $this->db->where('txn_id', $txn_id);
        $this->db->where('gateway', 'Paypal');

        $data = $this->db->get()->result();

        return $data ? $data[0]->txn_id : $txn_id.uniqid();
    }

    public function create_order_log($data)
    {
        $this->db->insert('orders_logs', $data);
    }

    public function update_order($data, $order_id)
    {
        $this->db->where('order_id', $order_id);
        $this->db->where('status', 'Pending');
        $this->db->update('orders', $data);
    }

}

/* End of file model_ipn.php */
/* Location: ./application/models/model_ipn.php */