<?php

function active_menu($page = '')
{
	
	$ci =& get_instance();

	if($page == $ci->uri->segment(1))
	{
		return 'class="active"';
	}

	if($ci->uri->segment(2) != '' && $page == $ci->uri->segment(2))
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