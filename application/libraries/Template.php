<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	public function show($view, $data = NULL)
	{
		$ci =& get_instance();
		$data['content'] = $ci->load->view($view, $data, TRUE);
		$ci->load->view('template', $data);
	}
}
