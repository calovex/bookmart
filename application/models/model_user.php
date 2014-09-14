<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function get_countries()
    {
        $countries = $this->db->get('countries')->result();
        
        $list = array(''=>'Select');

        foreach ($countries as $country)
        {
            $list[$country->country_id] = $country->name;
        }

        return $list;
    }

    public function create()
    {
        $data = array(
            'first_name'      => $this->input->post('first_name'),
            'last_name'       => $this->input->post('last_name'),
            'country_id'      => $this->input->post('country'),
            'city'            => $this->input->post('city'),
            'email'           => $this->input->post('email'),
            'password'        => md5( $this->input->post('password') ),
            'user_type'       => 'normal_user',
            'blocked'         => 0,
            'joined'          => time()
        );

        $this->db->insert('users', $data);
    }

    public function verify_login()
    {
        $email      = $this->input->post('email');
        $password   = md5($this->input->post('password'));

        $this->db->select('user_id, user_type, country_id, first_name, last_name, email');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('blocked', 0);

        $query = $this->db->get();

        if ($query->num_rows() == 1)
        { //login successfull

            $data = array();

            $data['user_id']        = $query->row('user_id');
            $data['user_type']      = $query->row('user_type');
            $data['country_id']     = $query->row('country_id');
            $data['first_name']     = $query->row('first_name');
            $data['last_name']      = $query->row('last_name');
            $data['email']          = $query->row('email');
            $data['logged_in']      = true;

            return $data;
        }
        else
        { //login failed
            return false;
        }
    }

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */