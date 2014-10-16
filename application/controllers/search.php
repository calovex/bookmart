<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    public function index()
    {
        $query = isset($_GET['query']) ? strtolower(urlencode($_GET['query'])) : false;

        if($query == false)
        {
            redirect('/');
        }

        redirect('search/results/?query='.$query);
    }

    public function results()
    {
        $query = isset($_GET['query']) ? strtolower(urldecode($_GET['query'])) : false;

        if($query == false)
        {
            redirect('/');
        }

        $this->load->model('model_search');

        $data['page_name']      = 'search/results';
        $data['page_title']     = 'Search results for - '.$query;
        $data['products']       = $this->model_search->results($query);

        $this->load->view('theme/index', $data);
    }

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */
