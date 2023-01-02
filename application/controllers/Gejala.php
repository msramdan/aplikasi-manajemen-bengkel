<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Gejala extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
		$this->load->model('Gejala_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$gejala = $this->Gejala_model->get_all();
		$data = array(
			'gejala_data' => $gejala,
		);
		$this->template->load('template', 'gejala/gejala_list', $data);
	}

	public function read($id)
	{
		$row = $this->Gejala_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'kd_gejala' => $row->kd_gejala,
				'gejala' => $row->gejala,
			);
			$this->template->load('template', 'gejala/gejala_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('gejala'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('gejala/create_action'),
			'kd_gejala' => $this->Gejala_model->CreateCode(),
			'gejala' => set_value('gejala'),
		);
		$this->template->load('template', 'gejala/gejala_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'kd_gejala' => $this->input->post('kd_gejala', TRUE),
				'gejala' => $this->input->post('gejala', TRUE),
			);

			$this->Gejala_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('gejala'));
		}
	}

	public function update($id)
	{
		$row = $this->Gejala_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('gejala/update_action'),
				'kd_gejala' => set_value('kd_gejala', $row->kd_gejala),
				'gejala' => set_value('gejala', $row->gejala),
			);
			$this->template->load('template', 'gejala/gejala_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('gejala'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('kd_gejala', TRUE)));
		} else {
			$data = array(
				'gejala' => $this->input->post('gejala', TRUE),
			);

			$this->Gejala_model->update($this->input->post('kd_gejala', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('gejala'));
		}
	}

	public function delete($id)
	{
		$row = $this->Gejala_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Gejala_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('gejala'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('gejala'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('gejala', 'gejala', 'trim|required');

		$this->form_validation->set_rules('kd_gejala', 'kd_gejala', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Gejala.php */
/* Location: ./application/controllers/Gejala.php */
/* Please DO NOT modify this information : */
