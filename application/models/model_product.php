<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_product extends CI_Model {

	public function products_count()
	{
		return $this->db->count_all('products');
	}

	public function products($offset)
	{
		$this->db->select(
			'product_id, slug, title, service_type, original_price, 
			sale_price, shipping_costs, weightage, views, created_at, updated_at'
		);
    	$this->db->from('products');
		$this->db->order_by('updated_at', 'desc');
		$this->db->limit(PRODUCTS_LIMIT, $offset);
		
		return $this->db->get()->result();
	}

	public function create()
	{
		$data = array(
            'title'      		=> $this->input->post('title'),
            'author'       		=> $this->input->post('author'),
            'service_type'      => $this->input->post('service_type'),
            'type'      		=> $this->input->post('type'),
            'original_price'    => $this->input->post('original_price'),
            'sale_price'        => $this->input->post('sale_price'),
            'shipping_costs'    => $this->input->post('shipping_costs'),
            'weightage'        	=> $this->input->post('weightage'),
            'slug' 				=> url_title($this->input->post('title'), '-', true),
            'meta_keywords'     => $this->input->post('meta_keywords'),
            'meta_desc'        	=> $this->input->post('meta_desc'),
            'summary'        	=> $this->input->post('summary'),
            'desc'        		=> $this->input->post('desc'),
            'created_at'        => date('Y-m-d H:i:s', time()),
            'updated_at'        => date('Y-m-d H:i:s', time())
        );


        $this->db->insert('products', $data);
        
        $product_id 	= $this->db->insert_id();
        $categories 	= $this->input->post('category');
        $category_array = array();

        foreach ($categories as $category_id)
        {
        	$category_array[] = array(
        		'product_id' 	=> $product_id,
        		'category_id' 	=> $category_id
        	);
        }

        $this->db->insert_batch('products_categories', $category_array);
	}

    public function get_product($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id', $product_id);
        $this->db->from('products');
        
        $data = $this->db->get()->result();
        
        return ($data) ? $data[0] : false;
    }

    public function get_product_name($product_id)
    {
        $this->db->select('title');
        $this->db->where('product_id', $product_id);
        $this->db->from('products');
        
        $data = $this->db->get()->result();
        
        return ($data) ? $data[0]->title : false;
    }

    public function get_categories()
    {
        $data = $this->db->get('categories')->result();        
        return ($data) ? $data : false;
    }

    public function products_categories($product_id)
    {
       $sql =   "SELECT c.category_id, c.name, IF(pc.product_id, 1, 0) is_checked
                FROM categories c
                LEFT JOIN (SELECT * 
                FROM products_categories 
                WHERE product_id = ?) pc
                ON c.category_id = pc.category_id
                ORDER BY c.category_id ASC";

        $params = array($product_id);
        $data   = $this->db->query($sql, $params)->result();

        return ($data) ? $data : false;
    }

    public function update($product_id)
    {
        $data = array(
            'title'             => $this->input->post('title'),
            'author'            => $this->input->post('author'),
            'service_type'      => $this->input->post('service_type'),
            'type'              => $this->input->post('type'),
            'original_price'    => $this->input->post('original_price'),
            'sale_price'        => $this->input->post('sale_price'),
            'shipping_costs'    => $this->input->post('shipping_costs'),
            'weightage'         => $this->input->post('weightage'),
            'slug'              => url_title($this->input->post('title'), '-', true),
            'meta_keywords'     => $this->input->post('meta_keywords'),
            'meta_desc'         => $this->input->post('meta_desc'),
            'summary'           => $this->input->post('summary'),
            'desc'              => $this->input->post('desc'),
            'updated_at'        => date('Y-m-d H:i:s', time())
        );

        $this->db->where('product_id', $product_id);
        $this->db->update('products', $data);

        $categories     = $this->input->post('category');
        $category_array = array();

        foreach ($categories as $category_id)
        {
            $category_array[] = array(
                'product_id'    => $product_id,
                'category_id'   => $category_id
            );
        }

        $this->db->where('product_id', $product_id);
        $this->db->delete('products_categories');         
        $this->db->insert_batch('products_categories', $category_array);
    }

    public function get_images($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id', $product_id);
        $this->db->from('products_images');
        $this->db->order_by('products_images_id', 'desc');
        
        return $this->db->get()->result();
    }

    public function get_image($products_images_id)
    {
        $this->db->select('product_id, name');
        $this->db->where('products_images_id', $products_images_id);
        $this->db->from('products_images');
        
        $data = $this->db->get()->result();

        return ($data) ? $data[0] : false;
    }

    public function create_image($product_id, $file_name)
    {
        $data = array('name' => $file_name, 'product_id' => $product_id);
        $this->db->insert('products_images', $data);
    }

    public function delete_image($products_images_id, $image)
    {
        if( file_exists(UPLOADS_PATH.$image) )
        {
            unlink(UPLOADS_PATH.$image);
        }

        $this->db->where('products_images_id', $products_images_id);
        $this->db->delete('products_images');
    }

    public function delete($product_id)
    {
        $images = $this->get_images($product_id);

        if($images)
        {
            foreach ($images as $image)
            {
                if( file_exists(UPLOADS_PATH.$image->name) )
                {
                    unlink(UPLOADS_PATH.$image->name);
                }
            }
        }

        $this->db->where('product_id', $product_id);
        $this->db->delete('products_categories');

        $this->db->where('product_id', $product_id);
        $this->db->delete('products_images');

        $this->db->where('product_id', $product_id);
        $this->db->delete('products');
    }

}

/* End of file model_product.php */
/* Location: ./application/models/model_product.php */