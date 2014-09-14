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

		if( $this->is_a_protected_page($current_page) && (!$logged_in) )
		{
			redirect('/');
		}
	}

	private function is_a_protected_page($current_page)
	{
		$pages = array(
			'dashboard',
			'dashboard/index'
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