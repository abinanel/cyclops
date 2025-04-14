<?php

class Purchase_orders_model extends CI_Model
{
	private $_table = 'purchase_orders';

    public function get_list() 
    {
        $query = $this->db->query("SELECT * FROM purchase_orders");
        return $query->result(); // return berupa array objek
    }

    public function insert($data) {
        return $this->db->insert($this->_table, $data);
    }
}