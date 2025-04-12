<?php

class PurchaseRequests extends CI_Controller {
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
        $this->load->view("admin/purchase_requests_form");
	}

    public function get_list_by_user_id() {
		// Mengambil user id dari sesi pengguna
        $user_id = $this->session->userdata('user_id');

		
		//Panggil metode get_list_by_user_id dari model Purchase_requests_model
		$purchase_requests = $this->Purchase_requests_model->get_list_by_user_id($user_id);

		// Kirimkan data sebagai JSON
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($purchase_requests));
	}

    public function submit() {
        $pr_id = $this->input->post('pr-id');
    
        // Cek apakah pr_id sudah ada di database
        $existingPR = $this->Purchase_requests_model->get_by_id($pr_id);
    
        if ($existingPR) {
            $this->update($pr_id);
        } else {
            $this->save($pr_id); // kirim pr_id agar tidak di-generate ulang
        }
    }

    public function save() {
        // Mengambil user_id dari sesi pengguna
        $user_id = $this->session->userdata('user_id');

		// Ambil nilai dari input
        //$pr_id = $this->input->post('pr-id');
        $status = $this->input->post('status');
        $statusNote = $this->input->post('status-note');
        $items = $this->input->post('items');
        // Log data $items untuk memeriksa apa yang terkirim
        log_message('debug', 'Received Items: ' . print_r($items, true));

        date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Jakarta
    
        // Simpan PR utama ke database (jika belum ada)
        $prData = [
            'created_by'   => $user_id,
            'request_date' => date('Y-m-d'), // tanggal saat ini dalam format YYYY-MM-DD
            'status'       => $status,
            'status_note'  => $statusNote
        ];
        $pr_id = $this->Purchase_requests_model->insert($prData);
        log_message('debug', 'PR ID: ' . $pr_id);
    
        // Simpan item-itemnya
        $itemData = [];
        foreach ($items as $item) {
            $itemData[] = [
                'pr_id'            => $pr_id,
                'item_name'        => $item['name'],
                'item_description' => $item['desc'],
                'quantity'         => $item['qty'],
                'unit'             => $item['unit']
            ];
        }
        $this->Purchase_requests_items_model->insert($itemData);
    
        echo json_encode(['status' => true, 'message' => 'Data berhasil disimpan.']);
	}

    public function delete() {
		// Cek jika ID tersedia di permintaan POST
		$id = $this->input->post('id');
		if (!$id) {
			// ID tidak ada, kirim response error
			$this->output
				 ->set_content_type('application/json')
				 ->set_status_header(400) // Bad Request
				 ->set_output(json_encode(['error' => 'No ID provided']));
			return;
		}
	
		// delete pr items
		$this->Purchase_requests_items_model->delete_by_pr_id($id);
        // delete pr 
		$this->Purchase_requests_model->delete($id);
	
		// Kirim response sukses
		$this->output
			 ->set_content_type('application/json')
			 ->set_output(json_encode(['message' => 'Data deleted successfully']));
	}

    public function get_by_id() {
		$id = $this->input->post('id');

        // Ambil daftar item
        $items = $this->Purchase_requests_items_model->get_list_by_pr_id($id);

        // Ambil PR utama (status & status_note)
        $pr = $this->Purchase_requests_model->get_by_id($id); // pastikan ada function ini

        // Gabungkan jadi satu array
        $response = [
            'status' => $pr->status ?? null,
            'status_note' => $pr->status_note ?? null,
            'items' => $items
        ];

        // Kirimkan sebagai JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
	}

    public function update() {
        $user_id = $this->session->userdata('user_id');
    
        $pr_id = $this->input->post('pr-id');
        $status = $this->input->post('status');
        $statusNote = $this->input->post('status-note');
        $items = $this->input->post('items');
    
        log_message('debug', 'Updating PR ID: ' . $pr_id);
        log_message('debug', 'Items: ' . print_r($items, true));
    
        // Update PR utama
        $prData = [
            'created_by' => $user_id,
            'status'       => $status,
            'status_note'  => $statusNote
        ];
        $this->Purchase_requests_model->update($pr_id, $prData);
    
        // Ambil semua item lama dari database
        $existingItems = $this->Purchase_requests_items_model->get_list_by_pr_id($pr_id);
        $existingIds = array_column($existingItems, 'pr_item_id');
    
        // Track ID item yang tetap ada
        $sentIds = [];
    
        foreach ($items as $item) {
            if (!empty($item['id'])) {
                // Update item lama
                $sentIds[] = $item['id'];
                $updateData = [
                    'item_name'        => $item['name'],
                    'item_description' => $item['desc'],
                    'quantity'         => $item['qty'],
                    'unit'             => $item['unit']
                ];
                $this->Purchase_requests_items_model->update($item['id'], $updateData);
            } else {
                // Insert item baru
                $newItem = [
                    'pr_id'            => $pr_id,
                    'item_name'        => $item['name'],
                    'item_description' => $item['desc'],
                    'quantity'         => $item['qty'],
                    'unit'             => $item['unit']
                ];
                $this->Purchase_requests_items_model->insert([$newItem]);
            }
        }
    
        // Hapus item yang tidak ada di list baru
        $itemsToDelete = array_diff($existingIds, $sentIds);
        if (!empty($itemsToDelete)) {
            $this->Purchase_requests_items_model->delete_by_ids($itemsToDelete);
        }
    
        echo json_encode(['status' => true, 'message' => 'Data berhasil diperbarui.']);
    }

}
