<?php

function is_logged_in()
{
	$ci = get_instance();

	if (!$ci->session->userdata('email') && !$ci->session->userdata('role_id'))
    {
    	redirect('auth');
    }
    elseif (!$ci->session->userdata('role_id'))
    {
        redirect('auth/blocked');
    }
    else 
    {
    	$role_id = $ci->session->userdata('role_id');
    	$menu = $ci->uri->segment(1);

    	$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    	$menu_role_id = $queryMenu['role_id'];

    	if ($role_id != $menu_role_id)
    	{
            $ci->session->unset_userdata('role_id');
    		redirect('auth/blocked');
    	}
    }
}

?>