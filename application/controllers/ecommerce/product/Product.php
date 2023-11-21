<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
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
		$sidebar = array();

        $head['title'] = 'Ecommerce-Dashboard';
        $navbar['data'] = ['cart','user','logout'];
		$sidebar['menu'] = [
            'dashboard' => ['dashboard'],
            'sales' => ['sales', 'submenu1' => ['billing cart', 'submenu1 item2']],
            'catalog' => ['catalog', 'submenu1' => ['products', 'categories']],
            'customers' => ['customers'],
            'marketing' => ['marketing'],
            'content' => ['content'],
            'report' => ['report'],
            'stores' => ['stores'],
            'system' => ['system'],
        ];        
		$this->load->view('parts/header', $head);
		$this->load->view('ecommerce/parts/navbar', $navbar);
		$this->load->view('ecommerce/parts/sidebar', $sidebar);
        $this->load->view('ecommerce/product/attribute');
		$this->load->view('parts/footer');
    }
	
}
