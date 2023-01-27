<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Barang_model');
		$this->load->model('Unit_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$barang = $this->Barang_model->get_all();
		$data = array(
			'barang_data' => $barang,
		);
		$this->template->load('template', 'barang/barang_list', $data);
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('barang/create_action'),
			'barang_id' => set_value('barang_id'),
			'kode_barang' => set_value('kode_barang'),
			'nama_barang' => set_value('nama_barang'),
			'unit_id' => set_value('unit_id'),
			'harga' => set_value('harga'),
			'unit' => $this->Unit_model->get_all(),
			'stok' => set_value('stok'),
			'keterangan' => set_value('keterangan'),
		);
		$this->template->load('template', 'barang/barang_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'kode_barang' => $this->input->post('kode_barang', TRUE),
				'nama_barang' => $this->input->post('nama_barang', TRUE),
				'unit_id' => $this->input->post('unit_id', TRUE),
				'harga' => $this->input->post('harga', TRUE),
				'stok' => 0,
				'keterangan' => $this->input->post('keterangan', TRUE),
			);

			$this->Barang_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('barang'));
		}
	}

	public function update($id)
	{
		$row = $this->Barang_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'unit' => $this->Unit_model->get_all(),
				'action' => site_url('barang/update_action'),
				'barang_id' => set_value('barang_id', $row->barang_id),
				'kode_barang' => set_value('kode_barang', $row->kode_barang),
				'nama_barang' => set_value('nama_barang', $row->nama_barang),
				'unit_id' => set_value('unit_id', $row->unit_id),
				'harga' => set_value('harga', $row->harga),
				'stok' => set_value('stok', $row->stok),
				'keterangan' => set_value('keterangan', $row->keterangan),
			);
			$this->template->load('template', 'barang/barang_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('barang'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('barang_id', TRUE));
		} else {
			$data = array(
				'kode_barang' => $this->input->post('kode_barang', TRUE),
				'nama_barang' => $this->input->post('nama_barang', TRUE),
				'unit_id' => $this->input->post('unit_id', TRUE),
				'harga' => $this->input->post('harga', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
			);

			$this->Barang_model->update($this->input->post('barang_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('barang'));
		}
	}

	public function delete($id)
	{
		$row = $this->Barang_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Barang_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('barang'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('barang'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
		$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
		$this->form_validation->set_rules('unit_id', 'unit id', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('barang_id', 'barang_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
