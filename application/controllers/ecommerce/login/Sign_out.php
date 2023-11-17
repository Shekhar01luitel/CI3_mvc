<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sign_out extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login/registration');
	}
	public function process_registration()
	{
		$this->load->library('form_validation');

		// Set validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() === FALSE) {
			// Validation failed, display errors
			// $this->session->set_flashdata('message', '<div class="alert alert-danger">Fill the form'. $this->form_validation->error().'.</div>');
			$error_message = '<div class="alert alert-danger">' . validation_errors() . '</div>';
			$this->session->set_flashdata('message', $error_message);
			redirect('registration');
			// $this->load->view('login/registration'); // Load your registration form view
		} else {
			// Validation successful, process registration
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// Load the User_model
			$this->load->model('Registration_model');
			$username = $this->generate_unique_username($name);
			// Check if the email already exists in the database
			if ($this->Registration_model->is_email_unique($email)) {
				// Email is unique, proceed with registration
				$user_data = array(
					'name' => $name,
					'email' => $email,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'username' => $username
				);

				// Insert user data into the database
				$this->Registration_model->create_user($user_data);
				redirect(base_url('login'));

				// Registration is successful
				$this->load->view('login/login');
			} else {
				// Email already exists, display an error message
				$error_message = '<div class="alert alert-danger">Email address already in use.</div>';
				$this->session->set_flashdata('message', $error_message);
				redirect(base_url('registration'));

				// $this->load->view('login/registration');
			}
		}
	}
	public function generate_unique_username($name)
	{
		// Remove any non-alphanumeric characters and spaces
		$clean_name = preg_replace('/[^a-zA-Z0-9]+/', '', $name);

		$clean_name = strtolower($clean_name);

		// Check if the username already exists in the database
		$is_unique = false;
		$base_username = $clean_name;
		$username = $base_username;
		$counter = 1;

		while (!$is_unique) {
			// Check if the username exists in the database
			if ($this->Registration_model->is_username_unique($username)) {
				$is_unique = true;
			} else {
				$username = $base_username . $counter;
				$counter++;
			}
		}

		return $username;
	}
}
