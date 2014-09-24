<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ipn extends CI_Controller {

	public function paypal()
	{
		echo '<pre>'.print_r($_POST, true).'</pre>'; exit();
	}

}

/* End of file ipn.php */
/* Location: ./application/controllers/ipn.php */