<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_download extends CI_Model {

    public function has_access($user_id, $product_id, $file_name)
    {
        $sql = "SELECT GROUP_CONCAT(product_ids) product_ids
                FROM orders
                WHERE user_id = ?
                AND `status` = 'Confirmed'";

        $param = array($user_id);

        $data = $this->db->query($sql, $param)->result();

        if($data)
        {
            $product_ids = $data[0]->product_ids;
            $product_ids = explode(',', $product_ids);

            if(in_array($product_id, $product_ids))
            {
                return true;
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

/* End of file model_download.php */
/* Location: ./application/models/model_download.php */