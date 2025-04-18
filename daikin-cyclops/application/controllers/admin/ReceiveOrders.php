<?php

class ReceiveOrders extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('Purchase_requests_model');
		$this->load->model('Purchase_requests_items_model');
		$this->load->model('Purchase_orders_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index()
	{
        $this->load->view("admin/receive_orders_list");
	}

	public function receiveForm($split_po_id) {
		// Ambil daftar item
        // $data['items'] = $this->Purchase_requests_items_model->get_list_by_pr_id($pr_id);
        // $data['pr'] = $this->Purchase_requests_model->get_by_id($pr_id);
        // $this->load->view("admin/approval_purchase_requests_form", $data);
	}
}