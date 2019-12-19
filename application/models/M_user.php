<?php

class M_user extends CI_Model {

	private $table = 'users';

	public function login($username, $password)
	{
		return $this->db->where('username', $username)
						->where('password', $password)
						->get($this->table)
				 	 	->row();
	}

}
