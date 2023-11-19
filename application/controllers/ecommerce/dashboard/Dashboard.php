<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->is_user_loged_in();
        $this->check_user_role(2,4,8);
	}

	public function index()
	{
        $head = array();
		$navbar = array();
        $head['title'] = 'Ecommerce-Dashboard';
        $navbar['data'] = ['user','logout'];
        
		$this->load->view('parts/header', $head);
		$this->load->view('ecommerce/parts/navbar', $navbar);
        $this->load->view('ecommerce/dashboard/dashoard');
		$this->load->view('parts/footer');
    }
	
}
