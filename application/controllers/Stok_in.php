<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Stok_in extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Barang_model');
		$this->load->model('Supplier_model');
		$this->load->model('Stok_in_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$stok_in = $this->Stok_in_model->get_all();
		$data = array(
			'stok_in_data' => $stok_in,
		);
		$this->template->load('template', 'stok_in/stok_list', $data);
	}

	public function read($id)
	{
		$row = $this->Stok_in_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'stok_id' => $row->stok_id,
				'barang_id' => $row->barang_id,
				'type' => $row->type,
				'detail' => $row->detail,
				'supplier_id' => $row->supplier_id,
				'qty' => $row->qty,
				'tanggal' => $row->tanggal,
			);
			$this->template->load('template', 'stok_in/stok_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('stok_in'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'barang' => $this->Barang_model->get_all(),
			'supplier' => $this->Supplier_model->get_all(),
			'action' => site_url('stok_in/create_action'),
			'stok_id' => set_value('stok_id'),
			'barang_id' => set_value('barang_id'),
			'type' => set_value('type'),
			'detail' => set_value('detail'),
			'supplier_id' => set_value('supplier_id'),
			'qty' => set_value('qty'),
			'tanggal' => set_value('tanggal'),
		);
		$this->template->load('template', 'stok_in/stok_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$qty = $this->input->post('qty', TRUE);
			$barang_id = $this->input->post('barang_id', TRUE);
			$data = array(
				'barang_id' => $barang_id,
				'type' => "In",
				'detail' => $this->input->post('detail', TRUE),
				'supplier_id' => $this->input->post('supplier_id', TRUE),
				'qty' => $qty,
				'tanggal' => date('Y-m-d H:i:s'),
			);

			$this->Stok_in_model->insert($data);
			// tambah stok 
			$this->db->query("UPDATE barang SET stok = stok + $qty WHERE barang_id='$barang_id'");

			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('stok_in'));
		}
	}

	public function delete($id)
	{
		$row = $this->Stok_in_model->get_by_id(decrypt_url($id));
		if ($row) {
			$this->Stok_in_model->delete(decrypt_url($id));
			$this->db->query("UPDATE barang SET stok = stok - $row->qty WHERE barang_id='$row->barang_id'");
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('stok_in'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('stok_in'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('barang_id', 'barang id', 'trim|required');
		$this->form_validation->set_rules('detail', 'detail', 'trim|required');
		$this->form_validation->set_rules('supplier_id', 'supplier id', 'trim|required');
		$this->form_validation->set_rules('qty', 'qty', 'trim|required');

		$this->form_validation->set_rules('stok_id', 'stok_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Stok_in.php */
/* Location: ./application/controllers/Stok_in.php */
/* Please DO NOT modify this information : */
