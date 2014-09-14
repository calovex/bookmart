<?php
$config['login'] = array(
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email|max_length[45]|xss_clean'
    ),
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required|max_length[45]|xss_clean'
    )
);

$config['user'] = array(
    array(
        'field' => 'first_name',
        'label' => 'First Name',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'last_name',
        'label' => 'Last Name',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'trim|required|numeric|xss_clean'
    ),
    array(
        'field' => 'city',
        'label' => 'City',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email|is_unique[users.email]|xss_clean'
    ),
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required|min_length[6]|xss_clean'
    ),
    array(
        'field' => 'confirm_password',
        'label' => 'Confirm Password',
        'rules' => 'trim|required|matches[password]|xss_clean'
    ),
    array(
        'field' => 'terms1',
        'label' => 'terms1',
        'rules' => 'trim|required|xss_clean'
    ),
);
