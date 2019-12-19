<?php

if ( ! function_exists('set_userdata')) 
{
	function set_userdata($userdata)
	{
		$ci =& get_instance();

		$ci->session->set_userdata('logged_in', $userdata);
	}
}

if ( ! function_exists('clear_userdata')) 
{
	function clear_userdata()
	{
		$ci =& get_instance();

		$ci->session->unset_userdata('logged_in');
	}
}

if ( ! function_exists('get_userdata')) 
{
	function get_userdata()
	{
		$ci =& get_instance();

		return $ci->session->userdata('logged_in');
	}
}

if ( ! function_exists('auth_checker_init')) 
{
	function auth_checker_init()
	{
		$userdata = get_userdata();

		if ($userdata) {
			redirect('post');
		}
	}
}

if ( ! function_exists('auth_checker')) 
{
	function auth_checker()
	{
		$userdata = get_userdata();

		if (!$userdata) {
			redirect('auth');
		}
	}
}
