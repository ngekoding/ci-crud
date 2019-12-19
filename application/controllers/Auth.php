<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('m_user');
	}

	public function index()
	{
		// Alredy logged in? Redirect to dashboard
		auth_checker_init();

		$this->load->view('users/login-form');
	}

	public function do_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			// Hash the password
			$password_md5 = md5($password);

			$userdata = $this->m_user->login($username, $password_md5);

			if ($userdata) {
				set_userdata($userdata);
				redirect('post');
			} else {
				$this->session->set_flashdata('login-error', 'Incorrect username or password!');
			}
		} else {
			$this->session->set_flashdata('login-error', 'Please enter username & password.');
		}

		// Login error, show the login form
		$this->index();
	}

	public function logout()
	{
		// Clear userdata
		clear_userdata();

		redirect('auth');
	}

}
