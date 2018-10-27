<?php

class M_category extends CI_Model {

	public function get_all()
	{
		return $this->db->get('categories')
				 	 	->result();
	}
}