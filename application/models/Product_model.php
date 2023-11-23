<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function insert_product($data)
    {
        // Insert data into the 'products' table
        $this->db->insert('products', $data);
    }
    public function get_all_product()
    {
        $query = $this->db->get('products');
        return $query->result();
    }
    public function get_total_products()
    {
        return $this->db->count_all('products');
    }

    public function get_products_with_pagination($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('products')->result();
    }
}
