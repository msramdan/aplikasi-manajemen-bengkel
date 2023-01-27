<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Service extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Service_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$service = $this->Service_model->get_all();
		$data = array(
			'service_data' => $service,
		);
		$this->template->load('template', 'service/service_list', $data);
	}

	public function read($id)
	{
		$row = $this->Service_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'service_id' => $row->service_id,
				'nama_service' => $row->nama_service,
				'harga' => $row->harga,
				'keterangan' => $row->keterangan,
			);
			$this->template->load('template', 'service/service_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('service'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('service/create_action'),
			'service_id' => set_value('service_id'),
			'nama_service' => set_value('nama_service'),
			'harga' => set_value('harga'),
			'keterangan' => set_value('keterangan'),
		);
		$this->template->load('template', 'service/service_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_service' => $this->input->post('nama_service', TRUE),
				'harga' => $this->input->post('harga', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
			);

			$this->Service_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('service'));
		}
	}

	public function update($id)
	{
		$row = $this->Service_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('service/update_action'),
				'service_id' => set_value('service_id', $row->service_id),
				'nama_service' => set_value('nama_service', $row->nama_service),
				'harga' => set_value('harga', $row->harga),
				'keterangan' => set_value('keterangan', $row->keterangan),
			);
			$this->template->load('template', 'service/service_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('service'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('service_id', TRUE));
		} else {
			$data = array(
				'nama_service' => $this->input->post('nama_service', TRUE),
				'harga' => $this->input->post('harga', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
			);

			$this->Service_model->update($this->input->post('service_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('service'));
		}
	}

	public function delete($id)
	{
		$row = $this->Service_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Service_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('service'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('service'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_service', 'nama service', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

		$this->form_validation->set_rules('service_id', 'service_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Service.php */
/* Location: ./application/controllers/Service.php */
/* Please DO NOT modify this information : */
