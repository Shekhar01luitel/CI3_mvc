<?php
class User_model extends CI_Model
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
	public function get_user()
	{
		$this->db->where('role','4');
		$query = $this->db->get('users');
		return $query->result(); 
	}
	public function get_admin() 
	{
		$this->db->where('role','2');
		$query = $this->db->get('users');
		return $query->result();
	}
	public function get_super_admin()
	{
		$this->db->where('role', '8'); 
		$query = $this->db->get('users'); 
		return $query->result();
	}


	public function get_user_by_id($user_id) // select by ID
	{
		$query = $this->db->get_where('users', array('id' => $user_id));

		if ($query->num_rows() > 0) {
			return $query->row(); // Return a single user object
		} else {
			return false; // Return false if user not found
		}
	}
	public function delete_user($user_id)
	{
		$this->load->model('User_model');

		if ($this->User_model->delete_user_by_id($user_id)) {
			// User deleted successfully
			$success_message = '<div class="alert alert-success">User deleted.</div>';
			$this->session->set_flashdata('message', $success_message);
		} else {
			// User not found or couldn't be deleted
			$error_message = '<div class="alert alert-danger">User not found or couldn\'t be deleted.</div>';
			$this->session->set_flashdata('message', $error_message);
		}

		redirect(base_url('user')); // Redirect to user list page
	}

	public function update_user_profile($user_id, $data)
	{
		$this->db->where('id', $user_id);
		return $this->db->update('users', $data);
	}

	public function delete_user_by_id($user_id)
	{
		// Perform the deletion of the user by their ID in the 'users' table
		$this->db->where('id', $user_id);
		$this->db->delete('users');

		// Check if the deletion was successful
		return $this->db->affected_rows() > 0;
	}

	public function update_user_password($user_id, $data)
	{
		$this->db->where('id', $user_id);
		return $this->db->update('users', $data);
	}
	public function updateUserRole($user_id, $data)
	{
		// Update the user's role in the 'users' table
		$this->db->where('id', $user_id);
		return $this->db->update('users', $data);
	}
}
