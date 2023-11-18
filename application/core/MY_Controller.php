<?php
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
        $this->load->library('session');
    }

    protected function is_user_loged_in()
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('login'));
        }
    }

    protected function check_user_role(...$allowed_roles)
    {
        $user_id = $this->session->userdata('user_id');
        $user_role = $this->Role_model->get_role($user_id);

        if (!in_array($user_role, $allowed_roles)) {
            redirect(base_url('ecommerce/logout'));
        }
    }
    protected function return_dashboard(){
        if ($this->session->userdata('user_id')) {
            redirect(base_url('ecommerce/dashboard'));
        }
    }
}
