<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Stok_out extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Barang_model');
		$this->load->model('Stok_out_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$stok_out = $this->Stok_out_model->get_all();
		$data = array(
			'stok_out_data' => $stok_out,
		);
		$this->template->load('template', 'stok_out/stok_list', $data);
	}



	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('stok_out/create_action'),
			'barang' => $this->Barang_model->get_all(),
			'stok_id' => set_value('stok_id'),
			'barang_id' => set_value('barang_id'),
			'detail' => set_value('detail'),
			'qty' => set_value('qty'),
			'tanggal' => set_value('tanggal'),
		);
		$this->template->load('template', 'stok_out/stok_form', $data);
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
				'barang_id' => $this->input->post('barang_id', TRUE),
				'type' => 'Out',
				'detail' => $this->input->post('detail', TRUE),
				'qty' => $this->input->post('qty', TRUE),
				'tanggal' => date('Y-m-d H:i:s'),
			);

			$this->Stok_out_model->insert($data);
			$this->db->query("UPDATE barang SET stok = stok -  $qty WHERE barang_id='$barang_id'");
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('stok_out'));
		}
	}


	public function delete($id)
	{
		$row = $this->Stok_out_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Stok_out_model->delete(decrypt_url($id));
			$this->db->query("UPDATE barang SET stok = stok + $row->qty WHERE barang_id='$row->barang_id'");
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('stok_out'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('stok_out'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('barang_id', 'barang id', 'trim|required');
		$this->form_validation->set_rules('detail', 'detail', 'trim|required');
		$this->form_validation->set_rules('qty', 'qty', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

		$this->form_validation->set_rules('stok_id', 'stok_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Stok_out.php */
/* Location: ./application/controllers/Stok_out.php */
/* Please DO NOT modify this information : */
