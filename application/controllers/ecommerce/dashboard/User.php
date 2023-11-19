<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_user_loged_in();
        $this->check_user_role(2, 4, 8);
		$this->load->model('User_model');
    }

    public function index()
    {
        $data['super_admin'] = $this->User_model->get_super_admin();
        $data['admin'] = $this->User_model->get_admin();
        $data['users'] = $this->User_model->get_user();
        $head = array();
        $navbar = array();
        $head['title'] = 'Ecommerce-Dashboard';
        $navbar['data'] = ['user', 'logout'];

        $this->load->view('parts/header', $head);
        $this->load->view('ecommerce/parts/navbar', $navbar);
        $this->load->view('ecommerce/dashboard/user', $data);
        $this->load->view('parts/footer');
    }
}
