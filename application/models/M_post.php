<?php

class M_post extends CI_Model {

	public function get_all()
	{
		return $this->db->select('p.*, c.name category')
						->from('posts p')
						->join('categories c', 'c.id=p.category_id')
						->get()
				 	 	->result();
	}

	public function insert($data)
	{
		return $this->db->insert('posts', $data);
	}

	public function get($id)
	{
		return $this->db->where('id', $id)
						->get('posts')
						->row();
	}

	public function update($data, $id)
	{
		return $this->db->where('id', $id)
						->update('posts', $data);
	}

	public function delete($id)
	{
		return $this->db->where('id', $id)
						->delete('posts');
	}
}