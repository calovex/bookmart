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

$config['forgot_pwd'] = array(
    array(
        'field' => 'user_email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email|max_length[45]|xss_clean'
    )
);

$config['update_pwd'] = array(
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required|min_length[6]|xss_clean'
    ),
    array(
        'field' => 'confirm_password',
        'label' => 'Confirm Password',
        'rules' => 'trim|required|matches[password]|xss_clean'
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

$config['user_profile'] = array(
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
        'field' => 'phone',
        'label' => 'Phone',
        'rules' => 'trim|xss_clean'
    )
);

$config['guest_checkout'] = array(
    array(
        'field' => 'guest_email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email|is_unique[users.email]|xss_clean'
    ),
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
    )
);

$config['product'] = array(
    array(
        'field' => 'title',
        'label' => 'Title',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'tags',
        'label' => 'Tags',
        'rules' => 'trim|required|max_length[255]|xss_clean'
    ),
    array(
        'field' => 'author',
        'label' => 'Author',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'published',
        'label' => 'Published Status',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'our_product',
        'label' => 'Our Product',
        'rules' => 'trim|xss_clean'
    ),
     array(
        'field' => 'service_type',
        'label' => 'Service Type',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'type',
        'label' => 'Type',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'original_price',
        'label' => 'Original Price',
        'rules' => 'trim|required|numeric|xss_clean'
    ),
    array(
        'field' => 'sale_price',
        'label' => 'Sale Price',
        'rules' => 'trim|required|numeric|xss_clean'
    ),
    array(
        'field' => 'shipping_costs',
        'label' => 'Shipping costs',
        'rules' => 'trim|required|numeric|xss_clean'
    ),
    array(
        'field' => 'category[]',
        'label' => 'Category',
        'rules' => 'trim|required|numeric|xss_clean'
    ),
    array(
        'field' => 'weightage',
        'label' => 'Weightage',
        'rules' => 'trim|integer|xss_clean'
    ),
    array(
        'field' => 'meta_keywords',
        'label' => 'Meta keywords',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'meta_desc',
        'label' => 'Meta description',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'summary',
        'label' => 'Summary',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'desc',
        'label' => 'Description',
        'rules' => 'trim|required|xss_clean'
    )
);

$config['category'] = array(
    array(
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'status',
        'label' => 'Status',
        'rules' => 'trim|numeric|xss_clean'
    ),
    array(
        'field' => 'weightage',
        'label' => 'Weightage',
        'rules' => 'trim|required|integer|xss_clean'
    )
);

$config['page'] = array(
    array(
        'field' => 'title',
        'label' => 'Title',
        'rules' => 'trim|required|xss_clean'
    ),
    array(
        'field' => 'meta_keywords',
        'label' => 'Meta Keywords',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'meta_desc',
        'label' => 'Meta Description',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'desc',
        'label' => 'Description',
        'rules' => 'trim|required|xss_clean'
    )
);