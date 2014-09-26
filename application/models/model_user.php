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

    public function create_pwd_reset_link($email)
    {
        $hash = md5(str_shuffle($email.uniqid().SALT_RESET_CODE));
        
        $data = array('reset_code' => $hash);

        $this->db->where('email', $email);
        $this->db->update('users', $data);

        $reset_link = base_url('login/reset_password/'.$hash);

        return $reset_link;
    }

    public function reset_password($hash, $password)
    {
        $data = array('password' => $password, 'reset_code' => NULL);

        $this->db->where('reset_code', $hash);
        $this->db->update('users', $data);
    }

    public function update_password($user_id, $password)
    {
        $data = array('password' => $password);

        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
    }

    public function valid_reset_hash($hash)
    {
        $this->db->where('reset_code', $hash);
        $count = $this->db->count_all_results('users');

        return ($count == 1) ? true : false;
    }

    public function get_profile($user_id)
    {
        $this->db->select('country_id, first_name, last_name, phone, city');
        $this->db->from('users');
        $this->db->where('user_id', $user_id);

        $data = $this->db->get()->result();

        return $data ? $data[0] : false;
    }

    public function update_profile($user_id)
    {
        $data['first_name']     = $this->input->post('first_name');
        $data['last_name']      = $this->input->post('last_name');
        $data['country_id']     = $this->input->post('country');
        $data['city']           = $this->input->post('city');
        $data['phone']          = $this->input->post('phone');
        $array                  = array('first_name' => $this->input->post('first_name'));
        
        $this->session->set_userdata($array);

        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
    }
}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */