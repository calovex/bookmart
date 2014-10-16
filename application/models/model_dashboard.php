<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_dashboard extends CI_Model {

    public function orders()
    {
        $sql = "SELECT      o.order_id, o.user_id, o.order_amount, o.paid_amount,
                            o.payment_currency, o.`status`, o.paid_at, u.email,
                            CONCAT(u.first_name, ' ', u.last_name) full_name
                FROM        orders o
                JOIN        users u
                ON          o.user_id = u.user_id
                WHERE       u.user_id = ?
                AND         o.`status` = 'confirmed'
                ORDER BY    order_id DESC";

        $param = array($this->session->userdata('user_id'));

        return $this->db->query($sql, $param)->result();
    }

    public function ebooks()
    {
        $sql = "SELECT GROUP_CONCAT(product_ids) product_ids
                FROM orders
                WHERE user_id = ?
                AND `status` = 'Confirmed'";

        $param = array($this->session->userdata('user_id'));

        $data = $this->db->query($sql, $param)->result();

        if($data)
        {
            $product_ids = $data[0]->product_ids;

            if($product_ids)
            {
                $sql = "SELECT pe.product_id, pe.name, p.title, p.slug
                        FROM products_ebooks pe
                        JOIN products p
                        ON pe.product_id = p.product_id
                        WHERE pe.product_id IN ($product_ids)";

                $data = $this->db->query($sql)->result();
            }
            else
            {
                return false;
            }

            if($data)
            {
                return $data;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

}

/* End of file model_dashboard.php */
/* Location: ./application/models/model_dashboard.php */
