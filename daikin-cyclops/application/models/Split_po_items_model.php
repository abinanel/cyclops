<?php

class Split_po_items_model extends CI_Model
{
	private $_table = 'split_po_items';

    public function get_list() 
    {
        $query = $this->db->query("SELECT * FROM split_po_items");
        return $query->result(); // return berupa array objek
    }
}