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
            'tags'              => $this->input->post('tags'),
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

        return $product_id;
	}

    public function get_product($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id', $product_id);
        $this->db->from('products');

        $data = $this->db->get()->result();

        return ($data) ? $data[0] : false;
    }

    public function get_product_slug($product_id, $slug)
    {
        $this->db->select('*');
        $this->db->where('product_id', $product_id);
        $this->db->where('slug', $slug);
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
            'tags'              => $this->input->post('tags'),
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

    public function get_ebooks($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id', $product_id);
        $this->db->from('products_ebooks');
        $this->db->order_by('products_ebooks_id', 'desc');

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

    public function get_ebook($products_ebooks_id)
    {
        $this->db->select('product_id, name');
        $this->db->where('products_ebooks_id', $products_ebooks_id);
        $this->db->from('products_ebooks');

        $data = $this->db->get()->result();

        return ($data) ? $data[0] : false;
    }

    public function create_image($product_id, $file_name)
    {
        $data = array('name' => $file_name, 'product_id' => $product_id);
        $this->db->insert('products_images', $data);

        $products_images_id = $this->db->insert_id();

        $this->db->where('product_id', $product_id);
        $count = $this->db->count_all_results('products_images');

        //set the first image uploaded as the cover by default
        if($count == 1)
        {
            $data = array('is_cover'=>1);
            $this->db->where('products_images_id', $products_images_id);
            $this->db->update('products_images', $data);

            $data = array('cover_image'=>$file_name);
            $this->db->where('product_id', $product_id);
            $this->db->update('products', $data);
        }

        $this->create_thumbnail($file_name);
    }

    private function create_thumbnail($name)
    {
        $config['image_library']    = 'gd2';
        $config['source_image']     = UPLOADS_PATH.$name;
        $config['new_image']        = THUMBS_PATH.$name;
        $config['create_thumb']     = true;
        $config['thumb_marker']     = '';
        $config['maintain_ratio']   = true;
        $config['width']            = 150;
        $config['height']           = 150;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    public function create_ebook($product_id, $file_name)
    {
        $data = array('name' => $file_name, 'product_id' => $product_id);
        $this->db->insert('products_ebooks', $data);
    }

    public function delete_image($product_id, $products_images_id, $image)
    {
        if( file_exists(UPLOADS_PATH.$image) )
        {
            unlink(UPLOADS_PATH.$image);
        }

        if( file_exists(THUMBS_PATH.$image) )
        {
            unlink(THUMBS_PATH.$image);
        }

        //check if it's the cover image
        $this->db->where('products_images_id', $products_images_id);
        $this->db->where('is_cover', 1);
        $count = $this->db->count_all_results('products_images');

        if($count == 1)
        {
            $data = array('cover_image'=>'');
            $this->db->where('product_id', $product_id);
            $this->db->update('products', $data);

            //checking if there is any other images available
            $this->db->where('product_id', $product_id);
            $count = $this->db->count_all_results('products_images');

            if($count >= 1)
            { // atleast an image found, set the first one as cover

                $this->db->select('*');
                $this->db->where('product_id', $product_id);
                $this->db->where('products_images_id !=', $products_images_id);
                $this->db->from('products_images');
                $this->db->order_by('products_images_id', 'asc');
                $this->db->limit(1);

                $item = $this->db->get()->result();
                $item = $item[0];

                $data = array('is_cover'=>1);
                $this->db->where('products_images_id', $item->products_images_id);
                $this->db->update('products_images', $data);

                $data = array('cover_image'=>$item->name);
                $this->db->where('product_id', $product_id);
                $this->db->update('products', $data);

            }
        }

        $this->db->where('products_images_id', $products_images_id);
        $this->db->delete('products_images');
    }

    public function set_cover($product_id, $products_images_id, $image)
    {
        $data = array('is_cover'=>0);
        $this->db->where('product_id', $product_id);
        $this->db->update('products_images', $data);

        $data = array('is_cover'=>1);
        $this->db->where('products_images_id', $products_images_id);
        $this->db->update('products_images', $data);

        $data = array('cover_image'=>$image);
        $this->db->where('product_id', $product_id);
        $this->db->update('products', $data);
    }

    public function delete_ebook($products_ebooks_id, $ebook)
    {
        if( file_exists(UPLOADS_PATH.'books/'.$ebook) )
        {
            unlink(UPLOADS_PATH.'books/'.$ebook);
        }

        $this->db->where('products_ebooks_id', $products_ebooks_id);
        $this->db->delete('products_ebooks');
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

                if( file_exists(THUMBS_PATH.$image->name) )
                {
                    unlink(THUMBS_PATH.$image->name);
                }
            }
        }

        $ebooks = $this->get_ebooks($product_id);

        if($ebooks)
        {
            foreach ($ebooks as $ebook)
            {
                if( file_exists(UPLOADS_PATH.'books/'.$ebook->name) )
                {
                    unlink(UPLOADS_PATH.'books/'.$ebook->name);
                }
            }
        }

        $this->db->where('product_id', $product_id);
        $this->db->delete('products_categories');

        $this->db->where('product_id', $product_id);
        $this->db->delete('products_images');

        $this->db->where('product_id', $product_id);
        $this->db->delete('products_ebooks');

        $this->db->where('product_id', $product_id);
        $this->db->delete('products');
    }

    public function related_products($tags, $author, $product_id)
    {
        $against    = $tags .' '.$author;
        $param      = array($against, $product_id);
        
        $sql = "SELECT product_id, title, slug, author, cover_image, original_price, sale_price, summary
                FROM products
                WHERE MATCH (title, tags, author, meta_keywords, meta_desc, summary, `desc`) 
                AGAINST (?)
                AND product_id != ?  
                LIMIT 0, 6";

        return $this->db->query($sql, $param)->result();
    }

}

/* End of file model_product.php */
/* Location: ./application/models/model_product.php */