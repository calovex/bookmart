<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_page extends CI_Model {

    public function pages_count()
    {
        return $this->db->count_all('pages');
    }

    public function pages($offset)
    {
        $this->db->select('page_id, title, slug, views, created_at, updated_at');
        $this->db->from('pages');
        $this->db->order_by('updated_at', 'desc');
        $this->db->limit(PAGES_LIMIT, $offset);
        
        return $this->db->get()->result();
    }

    public function get_page($page_id)
    {
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('page_id', $page_id);

        $data = $this->db->get()->result();
        
        return ($data) ? $data[0] : false;
    }

    public function update($page_id)
    {
        $data = array(
            'title'         => $this->input->post('title'),
            'slug'          => url_title($this->input->post('title'), '-', true),
            'meta_keywords' => $this->input->post('meta_keywords'),
            'meta_desc'     => $this->input->post('meta_desc'),
            'desc'          => $this->input->post('desc'),
            'updated_at'    => date('Y-m-d H:i:s', time())
        );

        $this->db->where('page_id', $page_id);
        $this->db->update('pages', $data);
    }

    public function update_view_counter($page_id)
    {
        $sql    = "UPDATE pages SET views = views + 1 WHERE page_id = ?";
        $param  = array($page_id);

        $this->db->query($sql, $param);
    }

}

/* End of file model_page.php */
/* Location: ./application/models/model_page.php */
