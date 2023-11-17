<?php
class Login_model extends CI_Model
{
    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        
        return $query->row_array(); // Returns a user or false if not found
    }
}
