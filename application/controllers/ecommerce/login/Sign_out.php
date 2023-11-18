<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sign_out extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function logout()
	{
		// Destroy the user's session data
		$this->session->sess_destroy();

		// Redirect to the login page or any other desired location
		redirect(base_url('ecommerce/login'));
	}
}
