<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_user_loged_in();
        $this->check_user_role(2, 4, 8);
        $this->load->library('form_validation');
        $this->load->model('Product_model');
    }

    public function index()
    {
        $head = array();
        $navbar = array();
        $sidebar = array();
        $product = array();
        $product['product_list'] = $this->Product_model->get_all_product();
        $head['title'] = 'Ecommerce-Dashboard';
        $navbar['data'] = ['cart', 'user', 'logout'];
        $sidebar['menu'] = [
            'dashboard' => ['dashboard'],
            'sales' => ['sales', 'submenu1' => ['billing cart', 'submenu1 item2']],
            'catalog' => ['catalog', 'submenu1' => ['products', 'categories', 'attributes']],
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
        $this->load->view('ecommerce/product/product', $product);
        $this->load->view('parts/footer');
    }

    public function submit_product()
    {
        // Set form validation rules
        $this->form_validation->set_rules('enableProduct', 'Enable Product', 'required|trim|in_list[1,0]');
        $this->form_validation->set_rules('attributeSet', 'Attribute Set', 'required|trim');
        $this->form_validation->set_rules('productName', 'Product Name', 'required|trim');
        $this->form_validation->set_rules('sku', 'SKU', 'required|trim|is_unique[products.sku]');
        $this->form_validation->set_rules('price', 'Price', 'required|trim|numeric');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim|numeric');
        $this->form_validation->set_rules('stockStatus', 'Stock Status', 'required|trim|in_list[in_stock,out_of_stock]');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|numeric');
        $this->form_validation->set_rules('categories', 'Categories', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('photo', 'Photo', 'callback_validate_photo');
        $this->form_validation->set_rules('countryOfManufacture', 'Country', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $error_message = 'Product update failed.' . validation_errors();
            $this->session->set_flashdata('message', $error_message);
            redirect(base_url('ecommerce/dashboard'));
        } else {
            
            $photo_file = $this->product_image($this->input->post('sku', true));
            $data = array(
                'enable_product' => $this->input->post('enableProduct', true),
                'attribute_set' => $this->input->post('attributeSet', true),

                'product_name' => $this->input->post('productName', true),
                'sku' => $this->input->post('sku', true),
                'price' => $this->input->post('price', true),
                'quantity' => $this->input->post('quantity', true),

                'stock_status' => $this->input->post('stockStatus', true),
                'weight' => $this->input->post('weight', true),
                'categories' => $this->input->post('categories', true),
                'description' => $this->input->post('description', true),

                'country_of_manufacture' => $this->input->post('countryOfManufacture', true),
                'photo' => $photo_file,

            );
            $this->Product_model->insert_product($data);

            // Set success message
            $success_message = 'Product created successfully.';
            $this->session->set_flashdata('success', $success_message);
            redirect(base_url('ecommerce/dashboard'));
        }
    }
    public function product_image($file)
    {
       
        // Handle file upload securely
        $config['upload_path'] = FCPATH . 'assets/product_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = $file . '_' . time(); // Set the file name
        $config['file_name'] = str_replace(" ", "_", $config['file_name']);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('photo')) {
            return $this->upload->data('file_name');
        } else {
            $error_message = 'Product update failed.' . $this->upload->display_errors();
            $this->session->set_flashdata('message', $error_message);
            redirect(base_url('ecommerce/dashboard'));
        }
    }

    public function validate_photo()
    {
        if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            return true;
        } else {
            $this->form_validation->set_message('validate_photo', 'The photo upload failed.');
            return false;
        }
    }
}
