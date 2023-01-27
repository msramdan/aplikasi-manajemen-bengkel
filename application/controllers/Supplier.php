<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Supplier extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Supplier_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$supplier = $this->Supplier_model->get_all();
		$data = array(
			'supplier_data' => $supplier,
		);
		$this->template->load('template', 'supplier/supplier_list', $data);
	}

	public function read($id)
	{
		$row = $this->Supplier_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'supplier_id' => $row->supplier_id,
				'nama_supplier' => $row->nama_supplier,
				'no_hp' => $row->no_hp,
				'alamat' => $row->alamat,
				'deskripsi' => $row->deskripsi,
			);
			$this->template->load('template', 'supplier/supplier_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('supplier'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('supplier/create_action'),
			'supplier_id' => set_value('supplier_id'),
			'nama_supplier' => set_value('nama_supplier'),
			'no_hp' => set_value('no_hp'),
			'alamat' => set_value('alamat'),
			'deskripsi' => set_value('deskripsi'),
		);
		$this->template->load('template', 'supplier/supplier_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_supplier' => $this->input->post('nama_supplier', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
			);

			$this->Supplier_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('supplier'));
		}
	}

	public function update($id)
	{
		$row = $this->Supplier_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('supplier/update_action'),
				'supplier_id' => set_value('supplier_id', $row->supplier_id),
				'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'alamat' => set_value('alamat', $row->alamat),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
			);
			$this->template->load('template', 'supplier/supplier_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('supplier'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('supplier_id', TRUE));
		} else {
			$data = array(
				'nama_supplier' => $this->input->post('nama_supplier', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
			);

			$this->Supplier_model->update($this->input->post('supplier_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('supplier'));
		}
	}

	public function delete($id)
	{
		$row = $this->Supplier_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Supplier_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('supplier'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('supplier'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_supplier', 'nama supplier', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

		$this->form_validation->set_rules('supplier_id', 'supplier_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */
/* Please DO NOT modify this information : */
