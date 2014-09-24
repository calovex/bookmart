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

    public function create($mode = '')
    {
        $password   = ($mode == 'guest') ? md5( uniqid() ) : md5( $this->input->post('password') );
        $email      = ($mode == 'guest') ? $this->input->post('guest_email') : $this->input->post('email');

        $data = array(
            'first_name'      => $this->input->post('first_name'),
            'last_name'       => $this->input->post('last_name'),
            'country_id'      => $this->input->post('country'),
            'city'            => $this->input->post('city'),
            'email'           => $email,
            'password'        => $password,
            'user_type'       => 'normal_user',
            'blocked'         => 0,
            'joined'          => date('Y-m-d H:i:s', time())
        );

        $this->db->insert('users', $data);

        if($mode == 'guest')
        {
            return $password;
        }
    }

    public function verify_login($password = '')
    {
        $email      = $this->input->post('email');
        $password   = ($password) ? $password : md5($this->input->post('password'));

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

    public function users_count()
    {
        $this->db->where('user_type', 'normal_user');
        return $this->db->count_all_results('users');
    }

    public function users($offset)
    {
        $sql = "SELECT      u.user_id, u.first_name, u.last_name, 
                            u.email, u.phone, u.dob, u.blocked, u.city,
                            u.joined, c.name country
                FROM        users u
                JOIN        countries c
                ON          u.country_id = c.country_id
                WHERE       u.user_type = 'normal_user'
                ORDER BY    u.joined DESC
                LIMIT       ?, ?";

        $param = array($offset, USERS_LIMIT);

        return $this->db->query($sql, $param)->result();
    }

    public function block($user_id)
    {
        $data = array('blocked' => 1);

        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
    }


    public function unblock($user_id)
    {
        $data = array('blocked' => 0);

        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
    }
}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */