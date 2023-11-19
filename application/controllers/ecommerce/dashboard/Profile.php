<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_user_loged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Load the User_model and get user data
        $this->load->model('User_model');
        $user_id = $this->session->userdata('user_id');
        $data['user_data'] = $this->User_model->get_user_by_id($user_id);
        $head = array();
        $navbar = array();
        $head['title'] = 'Ecommerce-Dashboard';
        $navbar['data'] = ['user', 'logout'];

        $this->load->view('parts/header', $head);
        $this->load->view('ecommerce/parts/navbar', $navbar);
        $this->load->view('ecommerce/dashboard/profile', $data);
        $this->load->view('parts/footer');
    }

    public function user_get_by_id_details($user_id)
    {
        $this->load->model('User_model'); // Load the User_model
        $data = $this->User_model->get_user_by_id($user_id);

        // Check if data is retrieved
        if ($data) {
            // Data is retrieved, you can access it
            $head = array();
            $navbar = array();
            $head['title'] = 'Ecommerce-Dashboard';
            $navbar['data'] = ['user', 'logout'];
            $this->load->view('parts/header', $head);
            $this->load->view('ecommerce/parts/navbar', $navbar);

            $this->load->view('ecommerce/dashboard/profile', array('user_data' => $data));
            $this->load->view('parts/footer');
        } else {
            // Data not found, handle the case when the user doesn't exist
            $error_message = '<div class="alert alert-danger">No user find.</div>';
            $this->session->set_flashdata('message', $error_message);
            redirect(base_url('eommerce/user'));
        }
    }
    // First form
    public function update_profile($user_id)
    {
        // Check if the form was submitted
        if ($this->input->post()) {
            // Load the User_model
            $this->load->model('User_model');

            // Define the data to be updated
            $update_data = array(
                'name' => $this->input->post('name'),
                'bio' => $this->input->post('bio'),
                'url' => $this->input->post('url'),
                'location' => $this->input->post('location')
            );

            // Call a method in your User_model to update the user's profile
            $result = $this->User_model->update_user_profile($user_id, $update_data);

            if ($result) {
                // Profile update successful, you can redirect or show a success message
                $success_message = '<div class="alert alert-success">Profile updated successfully.</div>';
                $this->session->set_flashdata('message', $success_message);
                redirect(base_url('user'));
            } else {
                // Profile update failed, handle the error (e.g., display an error message)
                $error_message = '<div class="alert alert-danger">Profile update failed. Please try again.</div>';
                $this->session->set_flashdata('message', $error_message);
                redirect(base_url('user'));
            }
        }

        // If the form was not submitted, you can load the profile view here
        $this->index(); // Reuse the code to load the profile view
    }
    // Second form
    public function update_account($user_id)
    {
        // Check if the form was submitted
        if ($this->input->post()) {
            // Load the User_model
            $this->load->model('User_model');


            // Get the new values from the form
            $new_username = $this->input->post('username');
            $new_email = $this->input->post('email');

            // Retrieve the current user data from the database
            $user_data = $this->User_model->get_user_by_id($user_id);

            // Get the old values from the database
            $old_username = $user_data->username;
            $old_email = $user_data->email;

            // Check if the new values match the old values
            if ($new_username == $old_username && $new_email == $old_email) {
                // No changes were made, so no need to perform the update
                $no_change_message = '<div class="alert alert-info">No changes were made to the account.</div>';
                $this->session->set_flashdata('message', $no_change_message);
                redirect(base_url('user'));
            }

            // Initialize the update_data array
            $update_data = array();

            // Check if the username is different from the old username
            if ($new_username != $old_username) {
                $update_data['username'] = $new_username;
            }

            // Check if the email is different from the old email
            if ($new_email != $old_email) {
                $update_data['email'] = $new_email;
            }

            try {
                // Call a method in your User_model to update the user's account
                $result = $this->User_model->update_user_profile($user_id, $update_data);
            } catch (Exception $e) {
                // Handle the exception, and check if it indicates a duplication of data
                if ($e->getCode() == 1062) { // MySQL error code for duplicate entry
                    $error_message = '<div class="alert alert-danger">Account update failed. Duplicate data in the database.</div>';
                } else {
                    $error_message = '<div class="alert alert-danger">Account update failed. Please try again.</div>';
                }
                $this->session->set_flashdata('message', $error_message);
                redirect(base_url('user'));
            }

            if ($result) {
                // Account update successful, you can redirect or show a success message
                $success_message = '<div class="alert alert-success">Account updated successfully.</div>';
                $this->session->set_flashdata('message', $success_message);
                redirect(base_url('user'));
            } else {
                // Account update failed for other reasons, handle the error (e.g., display an error message)
                $error_message = '<div class="alert alert-danger">Account update failed. Please try again.</div>';
                $this->session->set_flashdata('message', $error_message);
                redirect(base_url('user'));
            }
        }

        // If the form was not submitted, you can load the profile view here
        $this->index(); // Reuse the code to load the profile view
    }


    public function delete_user_by_id($user_id)
    {
        // Check if the logged-in user has the necessary permissions (e.g., admin rights) to delete other users
        // if ($this->session->userdata('2')) {
        // Load the User_model
        $this->load->model('User_model');

        // Call a method in your User_model to delete the user by their ID
        $result = $this->User_model->delete_user_by_id($user_id);

        if ($result) {
            if ($user_id === $this->session->userdata('user_id')) {
                redirect(base_url('logout'));
            } else
                // User deletion successful, you can redirect to a success page or do any necessary action
                $this->session->set_flashdata('message', '<div class="alert alert-success">User deleted successfully.</div>');
            redirect(base_url('user')); // Redirect to a success page

        } else {
            // User deletion failed, handle the error (e.g., display an error message)
            $error_message = '<div class="alert alert-danger">User deletion failed. Please try again.</div>';
            $this->session->set_flashdata('message', $error_message);
            redirect(base_url('profile'));
        }
    }

    public function update_password($user_id)
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        // Check if the form was submitted
        if ($this->input->post()) {
            // Load the User_model
            $this->load->model('User_model');

            // Get the new and old password values from the form
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            // Retrieve the current user's password hash from the database
            $user_data = $this->User_model->get_user_by_id($user_id);
            $hashed_password = $user_data->password;

            // Verify that the old password matches the stored hash
            if (password_verify($old_password, $hashed_password)) {
                // Check if the new password and confirm password match
                if ($new_password === $confirm_password) {
                    // Hash the new password
                    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                    // Update the user's password
                    $update_data = array('password' => $hashed_new_password);
                    $result = $this->User_model->update_user_password($user_id, $update_data);

                    if ($result) {
                        // Password update successful, you can redirect or show a success message
                        $success_message = '<div class="alert alert-success">Password updated successfully.</div>';
                        $this->session->set_flashdata('message', $success_message);
                        redirect(base_url('user'));
                    } else {
                        // Password update failed, handle the error (e.g., display an error message)
                        $error_message = '<div class="alert alert-danger">Password update failed. Please try again.</div>';
                        $this->session->set_flashdata('message', $error_message);
                        redirect(base_url('user'));
                    }
                } else {
                    // New password and confirm password do not match
                    $error_message = '<div class="alert alert-danger">New password and confirm password do not match.</div>';
                    $this->session->set_flashdata('message', $error_message);
                    redirect(base_url('user'));
                }
            } else {
                // Old password does not match the stored password
                $error_message = '<div class="alert alert-danger">Old password is incorrect.</div>';
                $this->session->set_flashdata('message', $error_message);
                redirect(base_url('user'));
            }
        }

        redirect(base_url('user'));
    }

    public function update_role($user_id)
    {
        // Check if the form was submitted
        if ($this->input->post()) {
            // Load the User_model
            $this->load->model('User_model');

            // Get the selected role value from the form
            $selectedRole = $this->input->post('role');

            if ($selectedRole == "super") {
                $roleValue = '8';
            } elseif ($selectedRole == "admin") {
                $roleValue = '2';
            } elseif ($selectedRole == "user") {
                $roleValue = '4';
            }

            if (isset($roleValue)) {
                $update_data = [
                    'role' => $roleValue
                ];

                // Call a method in your User_model to update the user's role
                $result = $this->User_model->updateUserRole($user_id, $update_data);

                if ($result) {
                    // Role update successful, you can redirect or show a success message
                    $success_message = '<div class="alert alert-success">Role updated successfully.</div>';
                    $this->session->set_flashdata('message', $success_message);
                    redirect(base_url('user'));
                } else {
                    // Role update failed, handle the error (e.g., display an error message)
                    $error_message = '<div class="alert alert-danger">Role update failed. Please try again.</div>';
                    $this->session->set_flashdata('message', $error_message);
                    redirect(base_url('user'));
                }
            } else {
                // Invalid role selected, handle the error (e.g., display an error message)
                $error_message = '<div class="alert alert-danger">Invalid role selected.</div>';
                $this->session->set_flashdata('message', $error_message);
                redirect(base_url('user'));
            }
        }
    }
}
