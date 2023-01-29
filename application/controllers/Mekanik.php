<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mekanik extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Mekanik_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$mekanik = $this->Mekanik_model->get_all();
		$data = array(
			'mekanik_data' => $mekanik,
		);
		$this->template->load('template', 'mekanik/mekanik_list', $data);
	}

	public function read($id)
	{
		$row = $this->Mekanik_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'mekanik_id' => $row->mekanik_id,
				'nama_mekanik' => $row->nama_mekanik,
				'alamat' => $row->alamat,
				'no_hp' => $row->no_hp,
			);
			$this->template->load('template', 'mekanik/mekanik_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('mekanik'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('mekanik/create_action'),
			'mekanik_id' => set_value('mekanik_id'),
			'nama_mekanik' => set_value('nama_mekanik'),
			'alamat' => set_value('alamat'),
			'no_hp' => set_value('no_hp'),
		);
		$this->template->load('template', 'mekanik/mekanik_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_mekanik' => $this->input->post('nama_mekanik', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
			);

			$this->Mekanik_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('mekanik'));
		}
	}

	public function update($id)
	{
		$row = $this->Mekanik_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('mekanik/update_action'),
				'mekanik_id' => set_value('mekanik_id', $row->mekanik_id),
				'nama_mekanik' => set_value('nama_mekanik', $row->nama_mekanik),
				'alamat' => set_value('alamat', $row->alamat),
				'no_hp' => set_value('no_hp', $row->no_hp),
			);
			$this->template->load('template', 'mekanik/mekanik_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('mekanik'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('mekanik_id', TRUE));
		} else {
			$data = array(
				'nama_mekanik' => $this->input->post('nama_mekanik', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
			);

			$this->Mekanik_model->update($this->input->post('mekanik_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('mekanik'));
		}
	}

	public function delete($id)
	{
		$row = $this->Mekanik_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Mekanik_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('mekanik'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('mekanik'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_mekanik', 'nama mekanik', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');

		$this->form_validation->set_rules('mekanik_id', 'mekanik_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Mekanik.php */
/* Location: ./application/controllers/Mekanik.php */
/* Please DO NOT modify this information : */
