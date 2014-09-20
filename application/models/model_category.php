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
		$this->db->order_by('updated_at', 'desc');
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

	public function update($category_id)
	{
		$data = array(
            'name'          => $this->input->post('name'),
            'status' 		=> ( isset($_POST['status']) ) ? 1 : 0,
            'updated_at'    => date('Y-m-d H:i:s', time())
        );

        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
	}

	public function create()
	{
		$data = array(
            'name'          => $this->input->post('name'),
            'status' 		=> ( isset($_POST['status']) ) ? 1 : 0,
            'created_at'    => date('Y-m-d H:i:s', time()),
            'updated_at'    => date('Y-m-d H:i:s', time())
        );

        $this->db->insert('categories', $data);
	}

}

/* End of file model_category.php */
/* Location: ./application/models/model_category.php */