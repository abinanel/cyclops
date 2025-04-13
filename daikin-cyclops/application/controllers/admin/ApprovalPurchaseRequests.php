<?php

class ApprovalPurchaseRequests extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('Purchase_requests_model');
		$this->load->model('Purchase_requests_items_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("admin/approval_purchase_requests_list");
	}
}