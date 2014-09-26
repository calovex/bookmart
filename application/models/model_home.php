<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_home extends CI_Model {

    public function our_products()
    {
        $this->db->select(
            'product_id, title, slug, 
            author, original_price, sale_price, cover_image,
            ROUND (((original_price - sale_price) / original_price) * 100) savings',
            false
        );

        $this->db->from('products');
        $this->db->where('published', 1);
        $this->db->where('our_product', 1);
        $this->db->order_by('updated_at', 'desc');
        $this->db->limit(9);

        return $this->db->get()->result();
    }

    public function get_promotion()
    {
        $sql = "SELECT p.product_id, p.title, p.slug, p.summary, pim.name image
                FROM products p
                JOIN products_images pim
                ON p.product_id = pim.product_id
                WHERE pim.is_promotion = 1
                ORDER BY pim.updated_at DESC
                LIMIT 1";

        $data = $this->db->query($sql)->result();

        return $data ? $data[0] : false;
    }

    public function get_slides()
    {
        $sql = "SELECT p.product_id, p.title, p.slug, p.summary, pim.name image
                FROM products p
                JOIN products_images pim
                ON p.product_id = pim.product_id
                WHERE pim.is_slider = 1
                ORDER BY pim.updated_at DESC
                LIMIT 4";

        $data = $this->db->query($sql)->result();

        return $data ? $data : false;
    }

}

/* End of file model_home.php */
/* Location: ./application/models/model_home.php */