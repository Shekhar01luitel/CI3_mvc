<?php
class Role_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}
	public function get_role($user_id)
	{
		$this->db->select('role');
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		return $query->row()->role;
	}
}
