<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup_env {

  	protected 	$ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->check_access();
	}

	public function check_access()
	{
		$logged_in 		= $this->ci->session->userdata('logged_in');
		$user_type 		= $this->ci->session->userdata('user_type');
		$uri1			= $this->ci->uri->segment(1);
		$uri2 			= $this->ci->uri->segment(2);
		$current_page 	= ($uri2 == '') ? $uri1.'/index' : $uri1.'/'.$uri2;

        if($user_type == 'admin')
        {
            return true;
        }

		if( $this->is_a_admin_page($current_page) && ($user_type != 'admin') )
		{
			redirect('/');
		}

        if( $this->is_a_normal_user_page($current_page) && ($user_type != 'normal_user') )
        {
            redirect('/');
        }
	}

	private function is_a_admin_page($current_page)
	{
		$pages = array(
			'products',
            'products/index',
            'products/create',
            'products/edit',
            'products/images',
            'products/ebooks',
            'products/delete',
            'products/delete_image',
            'products/cover_image',
            'products/set_promotion',
            'products/slider_image',
            'products/remove_slider',
            'products/delete_ebook',
            'categories',
            'categories/index',
            'categories/edit',
            'categories/create',
            'categories/delete',
            'orders',
            'orders/index',
            'orders/view',
            'users',
            'users/index',
            'users/block',
            'users/unblock',
            'pages',
            'pages/index',
            'pages/edit'
		);

		if(in_array($current_page, $pages))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

    private function is_a_normal_user_page($current_page)
    {
        $pages = array(
            'dashboard',
            'dashboard/index',
            'orders/details',
            'orders/cancel',
            'checkout/success',
            'checkout/cancelled',
            'profile',
            'profile/index',
            'login/change_password'
        );

        if(in_array($current_page, $pages))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}

/* End of file Setup_env.php */
/* Location: ./application/libraries/Setup_env.php */