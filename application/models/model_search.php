<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_search extends CI_Model {

    public function results($query)
    {
        $param = array($query);

        $sql = "SELECT  product_id, title, slug, author, cover_image,
                        original_price, sale_price, summary,
                        ROUND (((original_price - sale_price) / original_price) * 100) savings
                FROM    products
                WHERE   MATCH (title, tags, author, meta_keywords, meta_desc, summary, `desc`)
                AGAINST (?)
                AND     published = 1
                LIMIT   0, 18";

        return $this->db->query($sql, $param)->result();
    }

}

/* End of file model_search.php */
/* Location: ./application/models/model_search.php */
