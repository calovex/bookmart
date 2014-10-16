<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index()
    {
        $this->load->model('model_user');
        $user_id = $this->session->userdata('user_id');

        if ($this->form_validation->run('user_profile') == false)
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $profile = $this->model_user->get_profile($user_id);

            if($profile == false)
            {
                redirect('/');
            }

            $data['page_name']      = 'user/profile';
            $data['page_title']     = 'My Bookmart Profile Details';
            $data['profile']        = $profile;
            $data['countries']      = $this->model_user->get_countries();

            $this->load->view('theme/index', $data);
        }
        else
        {
            $this->model_user->update_profile($user_id);

            $message = '<div class="bg-success">Your profile has been updated successfully.</div>';
            $this->session->set_flashdata('message', $message);
            redirect('profile');
        }
    }

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */
