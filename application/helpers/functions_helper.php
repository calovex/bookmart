<?php

function active_menu($page = '')
{
	
	$ci =& get_instance();

	$admin_pages = array('projects', 'posts', 'leads');

	if( ($page == 'manage') && (in_array($ci->uri->segment(1), $admin_pages)) )
	{
		return 'active';
	}
	
	if($page == $ci->uri->segment(1))
	{
		return 'class="active"';
	}

	if($page == 'blog' && ($ci->uri->segment(1) == 'post'))
	{
		return 'class="active"';	
	}	
}

function top_menu()
{
	$ci =& get_instance();

	$ci->db->select('name,slug');
	$ci->db->from('categories');
	$ci->db->where('status', 1);
	$ci->db->order_by('weightage', 'desc');

	return $ci->db->get()->result();
}