<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index($offset = 0)
    {
        $offset = (int)$offset;

        $this->load->model('model_user');
        $this->load->library('pagination');

        $config['base_url']     = base_url('users/index');
        $config['total_rows']   = $this->model_user->users_count();
        $config['per_page']     = USERS_LIMIT;
        $config['uri_segment']  = 3;
        $config['num_links']    = 3;

        $this->pagination->initialize($config);

        $data['users']          = $this->model_user->users($offset);
        $data['page_name']      = 'user/index';
        $data['page_title']     = 'Manage Users';

        $this->load->view('theme/index', $data);
    }

    public function block($user_id = 0)
    {
        $user_id = (int)$user_id;

        if(! $user_id)
        {
            redirect('users');
        }

        $this->load->model('model_user');
        $this->model_user->block($user_id);

        $message = '<div class="bg-success">User has been blocked.</div>';
        $this->session->set_flashdata('message', $message);

        $ref = $this->input->server('HTTP_REFERER', true);
        redirect($ref);
    }

    public function unblock($user_id = 0)
    {
        $user_id = (int)$user_id;

        if(! $user_id)
        {
            redirect('users');
        }

        $this->load->model('model_user');
        $this->model_user->unblock($user_id);

        $message = '<div class="bg-success">User has been unblocked.</div>';
        $this->session->set_flashdata('message', $message);

        $ref = $this->input->server('HTTP_REFERER', true);
        redirect($ref);
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
