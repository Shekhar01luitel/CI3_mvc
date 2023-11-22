<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function insert_product($data)
    {
        // Insert data into the 'products' table
        $this->db->insert('products', $data);
    }
}
