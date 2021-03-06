<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Only authenticated user can access
		auth_checker();
		
		$this->load->model('m_post');
		$this->load->model('m_category');
	}

	public function index()
	{
		$posts = $this->m_post->get_all();

		$data['posts'] = $posts;

		$this->load->view('posts/index', $data);
	}

	public function create()
	{
		$data['categories'] = $this->m_category->get_all();

		$this->load->view('posts/create', $data);
	}

	public function store()
	{
		// Collecting data
		$title 		= $this->input->post('title');
		$descripion = $this->input->post('descripion');
		$category 	= $this->input->post('category');

		$data = [
			'title' 	  => $title,
			'description' => $descripion,
			'category_id' => $category
		];

		$save = $this->m_post->insert($data);

		if ($save) {
			$this->session->set_flashdata('msg_success', 'New post saved.');
		} else {
			$this->session->set_flashdata('msg_error', 'New post can\'t be save! Please try again.');
		}
		redirect('post');
	}

	public function edit($id)
	{
		$data['categories'] = $this->m_category->get_all();

		// Get single post data by ID
		$data['post'] = $this->m_post->get($id);

		$this->load->view('posts/edit', $data);
	}

	public function update()
	{
		// Collecting data
		$id 		= $this->input->post('id');
		$title 		= $this->input->post('title');
		$descripion = $this->input->post('descripion');
		$category 	= $this->input->post('category');

		$data = [
			'title' 	  => $title,
			'description' => $descripion,
			'category_id' => $category
		];

		$save = $this->m_post->update($data, $id);

		if ($save) {
			$this->session->set_flashdata('msg_success', 'Post updated.');
		} else {
			$this->session->set_flashdata('msg_error', 'Post can\'t be update! Please try again.');
		}
		redirect('post');
	}

	public function delete($id)
	{
		$delete = $this->m_post->delete($id);

		if ($delete) {
			$this->session->set_flashdata('msg_success', 'Post deleted.');
		} else {
			$this->session->set_flashdata('msg_error', 'Can\'t deleting post! Please try again.');
		}
		redirect('post');
	}
}
