<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Ngekoding\CodeIgniterDataTables\DataTables;

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Only authenticated user can access
		auth_checker();
		
		$this->load->model('m_post');
		$this->load->model('m_category');

		$this->load->helper('api');
	}

	public function index()
	{
		$posts = $this->m_post->get_all();

		$data['posts'] = $posts;

		$this->template->show('posts/index', $data);
	}

	public function create()
	{
		$data['categories'] = $this->m_category->get_all();

		$this->template->show('posts/create', $data);
	}

	public function store()
	{
		// Collecting data
		$title 		= $this->input->post('title');
		$description = $this->input->post('description');
		$category 	= $this->input->post('category');

		$data = [
			'title' 	  => $title,
			'description' => $description,
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

		$this->template->show('posts/edit', $data);
	}

	public function update()
	{
		// Collecting data
		$id 		= $this->input->post('id');
		$title 		= $this->input->post('title');
		$description = $this->input->post('description');
		$category 	= $this->input->post('category');

		$data = [
			'title' 	  => $title,
			'description' => $description,
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

	public function datatables()
	{
		// Use for modal
		$data['categories'] = $this->m_category->get_all();

		$this->template->show('posts/index-datatables', $data);
	}

	public function ajax_datatables()
	{
		$query = $this->m_post->get_all_query();

		$datatables = new DataTables($query, '3');

		$datatables->addSequenceNumber('row_number')
				   ->asObject()
				   ->generate();
	}

	public function datatables_array()
	{
		// Use for modal
		$data['categories'] = $this->m_category->get_all();

		$this->template->show('posts/index-datatables-array', $data);
	}

	public function ajax_datatables_array()
	{
		$query = $this->m_post->get_all_query();

		$datatables = new DataTables($query, '3');

		$datatables->addSequenceNumber()
				   ->only(['title', 'category', 'description'])
				   ->addColumn('action', function($row) {
						$edit = '<a href="#" onclick="alert(\'Edit button clicked!\')" class="btn btn-success btn-sm">Edit</a>';
					   	$delete = '<a href="#" onclick="alert(\'Delete button clicked!\')" class="btn btn-danger btn-sm">Delete</a>';
						return $edit.' '.$delete;
				   })
				   ->generate();
	}

	public function ajax_get($id)
	{
		$post = $this->m_post->get($id);

		return send_success_response($post);
	}

	public function ajax_delete()
	{
		$id = $this->input->post('id');
		if (empty($id)) return send_unprocessable_entity();

		$delete = $this->m_post->delete($id);

		if ($delete) return send_success_response();
		return send_internal_server_error();
	}

	/**
	 * We will use this method to handle both for insert and update
	 * If the ID exists, we perform an update
	 */
	public function ajax_store()
	{
		// Collecting data
		$id 		= $this->input->post('id');
		$title 		= $this->input->post('title');
		$description = $this->input->post('description');
		$category 	= $this->input->post('category');

		$data = [
			'title' 	  => $title,
			'description' => $description,
			'category_id' => $category
		];

		if (!empty($id)) {
			$save = $this->m_post->update($data, $id);
		} else {
			$save = $this->m_post->insert($data);
		}

		if ($save) return send_success_response();
		return send_internal_server_error();
	}
}
