<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_user_loged_in();
        $this->check_user_role(2, 4, 8);
        $this->load->model('Product_model');
        $this->load->library("pagination");
    }

    public function index()
    {
        $config['base_url'] = site_url('ecommerce/dashboard/');
        $config['total_rows'] = $this->Product_model->get_total_products(); 
        $config['per_page'] = 1;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        // $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         $offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $product['product_list'] = $this->Product_model->get_products_with_pagination($config['per_page'], $offset);
        $head = array();
        $navbar = array();
        $sidebar = array();
        $head['title'] = 'Ecommerce-Dashboard';
        $navbar['data'] = ['cart', 'user', 'logout'];
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
        $this->load->view('ecommerce/dashboard/dashoard', $product);
        $this->load->view('parts/footer');
    }
}
