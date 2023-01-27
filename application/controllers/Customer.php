<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Customer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Customer_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$customer = $this->Customer_model->get_all();
		$data = array(
			'customer_data' => $customer,
		);
		$this->template->load('template', 'customer/customer_list', $data);
	}

	public function read($id)
	{
		$row = $this->Customer_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'customer_id' => $row->customer_id,
				'nama_customer' => $row->nama_customer,
				'jenis_kelamin' => $row->jenis_kelamin,
				'no_hp' => $row->no_hp,
				'alamat' => $row->alamat,
			);
			$this->template->load('template', 'customer/customer_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('customer'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('customer/create_action'),
			'customer_id' => set_value('customer_id'),
			'nama_customer' => set_value('nama_customer'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'no_hp' => set_value('no_hp'),
			'alamat' => set_value('alamat'),
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_customer' => $this->input->post('nama_customer', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
			);

			$this->Customer_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('customer'));
		}
	}

	public function update($id)
	{
		$row = $this->Customer_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('customer/update_action'),
				'customer_id' => set_value('customer_id', $row->customer_id),
				'nama_customer' => set_value('nama_customer', $row->nama_customer),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'alamat' => set_value('alamat', $row->alamat),
			);
			$this->template->load('template', 'customer/customer_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('customer'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('customer_id', TRUE));
		} else {
			$data = array(
				'nama_customer' => $this->input->post('nama_customer', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
			);

			$this->Customer_model->update($this->input->post('customer_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('customer'));
		}
	}

	public function delete($id)
	{
		$row = $this->Customer_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Customer_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('customer'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('customer'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_customer', 'nama customer', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

		$this->form_validation->set_rules('customer_id', 'customer_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
