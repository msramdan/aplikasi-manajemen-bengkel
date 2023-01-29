<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sale extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Customer_model');
		$this->load->model('Sale_model');
		$this->load->model('Barang_model');
		$this->load->model('Service_model');
		$this->load->model('Mekanik_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$sale = $this->Sale_model->get_all();
		$data = array(
			'sale_data' => $sale,
		);
		$this->template->load('template', 'sale/sale_list', $data);
	}



	public function create()
	{
		$data = array(
			'button' => 'Create',
			'customer' => $this->Customer_model->get_all(),
			'mekanik' => $this->Mekanik_model->get_all(),
			'barang' => $this->Barang_model->get_all(),
			'service' => $this->Service_model->get_all(),
			'invoice' => $this->Sale_model->invoice_no(),
			'action' => site_url('sale/create_action'),
			'sale_id' => set_value('sale_id'),
			'customer_id' => set_value('customer_id'),
			'total' => set_value('total'),
			'bayar' => set_value('bayar'),
			'kembalian' => set_value('kembalian'),
			'note' => set_value('note'),
			'tanggal' => set_value('tanggal'),
			'user_id' => set_value('user_id'),
		);
		$this->template->load('template', 'sale/sale_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'invoice' => $this->input->post('invoice', TRUE),
				'customer_id' => $this->input->post('customer_id', TRUE),
				'total' => $this->input->post('total', TRUE),
				'bayar' => $this->input->post('bayar', TRUE),
				'kembalian' => $this->input->post('kembalian', TRUE),
				'note' => $this->input->post('note', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'user_id' => $this->input->post('user_id', TRUE),
			);

			$this->Sale_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('sale'));
		}
	}

	public function update($id)
	{
		$row = $this->Sale_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('sale/update_action'),
				'sale_id' => set_value('sale_id', $row->sale_id),
				'invoice' => set_value('invoice', $row->invoice),
				'customer_id' => set_value('customer_id', $row->customer_id),
				'total' => set_value('total', $row->total),
				'bayar' => set_value('bayar', $row->bayar),
				'kembalian' => set_value('kembalian', $row->kembalian),
				'note' => set_value('note', $row->note),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'user_id' => set_value('user_id', $row->user_id),
			);
			$this->template->load('template', 'sale/sale_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sale'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('sale_id', TRUE));
		} else {
			$data = array(
				'invoice' => $this->input->post('invoice', TRUE),
				'customer_id' => $this->input->post('customer_id', TRUE),
				'total' => $this->input->post('total', TRUE),
				'bayar' => $this->input->post('bayar', TRUE),
				'kembalian' => $this->input->post('kembalian', TRUE),
				'note' => $this->input->post('note', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'user_id' => $this->input->post('user_id', TRUE),
			);

			$this->Sale_model->update($this->input->post('sale_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('sale'));
		}
	}

	public function delete($id)
	{
		$row = $this->Sale_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Sale_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('sale'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sale'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('invoice', 'invoice', 'trim|required');
		$this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
		$this->form_validation->set_rules('total', 'total', 'trim|required');
		$this->form_validation->set_rules('bayar', 'bayar', 'trim|required');
		$this->form_validation->set_rules('kembalian', 'kembalian', 'trim|required');
		$this->form_validation->set_rules('note', 'note', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

		$this->form_validation->set_rules('sale_id', 'sale_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Sale.php */
/* Location: ./application/controllers/Sale.php */
/* Please DO NOT modify this information : */
