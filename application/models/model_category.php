<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_category extends CI_Model {

	public function categories_count()
	{
		return $this->db->count_all('categories');
	}

	public function categories($offset)
	{
		$this->db->select('*');
    	$this->db->from('categories');
		$this->db->order_by('weightage', 'desc');
		$this->db->limit(CATEGORIES_LIMIT, $offset);

		return $this->db->get()->result();
	}

	public function get_category($category_id)
	{
		$this->db->select('*');
    	$this->db->from('categories');
    	$this->db->where('category_id', $category_id);

    	$data = $this->db->get()->result();

        return ($data) ? $data[0] : false;
	}

	public function get_category_slug($slug)
	{
		$this->db->select('category_id,name');
    	$this->db->from('categories');
    	$this->db->where('slug', $slug);

    	$data = $this->db->get()->result();

        return ($data) ? $data[0] : false;
	}

	public function get_products($category_id, $offset)
	{
		$sql = "SELECT  product_id, title, slug, author, cover_image,
						original_price, sale_price, summary,
						ROUND (((original_price - sale_price) / original_price) * 100) savings
				FROM products
                WHERE published = 1
				AND product_id IN (
					SELECT product_id
					FROM products_categories
					WHERE category_id = ?
				)
				LIMIT ?, ?";

		$param = array($category_id, $offset, PRODUCTS_LIMIT_BM);

		return $this->db->query($sql, $param)->result();
	}

	public function get_products_count($category_id)
	{
		$sql = "SELECT COUNT(product_id) products_count
				FROM products
                WHERE published = 1
				AND product_id IN (
					SELECT product_id
					FROM products_categories
					WHERE category_id = ?
				)";

		$param 	= array($category_id);
		$data 	= $this->db->query($sql, $param)->result();

		return $data[0]->products_count;
	}

	public function update($category_id)
	{
		$data = array(
            'name'          => $this->input->post('name'),
            'slug'          => url_title($this->input->post('name'), '-', true),
            'status' 		=> ( isset($_POST['status']) ) ? 1 : 0,
            'weightage' 	=> $this->input->post('weightage'),
            'updated_at'    => date('Y-m-d H:i:s', time())
        );

        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
	}

	public function create()
	{
		$data = array(
            'name'          => $this->input->post('name'),
            'slug'          => url_title($this->input->post('name'), '-', true),
            'status' 		=> ( isset($_POST['status']) ) ? 1 : 0,
            'weightage' 	=> $this->input->post('weightage'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'updated_at'    => date('Y-m-d H:i:s', time())
        );

        $this->db->insert('categories', $data);
	}

}

/* End of file model_category.php */
/* Location: ./application/models/model_category.php */