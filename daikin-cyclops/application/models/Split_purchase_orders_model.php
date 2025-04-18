<?php

class Split_purchase_orders_model extends CI_Model
{
	private $_table = 'split_purchase_orders';

    public function get_list() 
    {
        $query = $this->db->query("SELECT * FROM split_purchase_orders");
        return $query->result(); // return berupa array objek
    }
}