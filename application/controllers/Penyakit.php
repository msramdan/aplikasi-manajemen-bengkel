<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Penyakit_model');
		$this->load->model('Gejala_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$penyakit = $this->Penyakit_model->get_all();
		$data = array(
			'penyakit_data' => $penyakit,
		);
		$this->template->load('template', 'penyakit/penyakit_list', $data);
	}

	public function read($id)
	{

		$row = $this->Penyakit_model->get_by_id(decrypt_url($id));
		$gejala = $this->Gejala_model->get_all();
		if ($row) {
			$data = array(
				'kd_penyakit' => $row->kd_penyakit,
				'penyakit' => $row->penyakit,
				'deskripsi' => $row->deskripsi,
				'solusi' => $row->solusi,
				'gejala_data' => $gejala,
			);
			$this->template->load('template', 'penyakit/penyakit_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('penyakit'));
		}
	}

	public function create()
	{
		check_admin();
		$data = array(
			'button' => 'Create',
			'action' => site_url('penyakit/create_action'),
			'kd_penyakit' => $this->Penyakit_model->CreateCode(),
			'penyakit' => set_value('penyakit'),
			'deskripsi' => set_value('deskripsi'),
			'solusi' => set_value('solusi'),
		);
		$this->template->load('template', 'penyakit/penyakit_form', $data);
	}

	public function create_action()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'kd_penyakit' => $this->input->post('kd_penyakit', TRUE),
				'penyakit' => $this->input->post('penyakit', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
				'solusi' => $this->input->post('solusi', TRUE),
			);

			$this->Penyakit_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('penyakit'));
		}
	}

	public function update($id)
	{
		check_admin();
		$row = $this->Penyakit_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('penyakit/update_action'),
				'kd_penyakit' => set_value('kd_penyakit', $row->kd_penyakit),
				'penyakit' => set_value('penyakit', $row->penyakit),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
				'solusi' => set_value('solusi', $row->solusi),
			);
			$this->template->load('template', 'penyakit/penyakit_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('penyakit'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('kd_penyakit', TRUE)));
		} else {
			$data = array(
				'penyakit' => $this->input->post('penyakit', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
				'solusi' => $this->input->post('solusi', TRUE),
			);

			$this->Penyakit_model->update($this->input->post('kd_penyakit', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('penyakit'));
		}
	}

	public function delete($id)
	{
		check_admin();
		$row = $this->Penyakit_model->get_by_id(decrypt_url($id));
		if ($row) {
			$this->Penyakit_model->delete(decrypt_url($id));
			$db_error = $this->db->error();
			if ($db_error['message'] == '') {
				$this->session->set_flashdata('message', 'Delete Record Success');
			} else {
				$this->session->set_flashdata('error', 'Data tidak bisa di hapus sudah berelasi');
			}
			redirect(site_url('penyakit'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('penyakit'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('penyakit', 'penyakit', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('solusi', 'solusi', 'trim|required');

		$this->form_validation->set_rules('kd_penyakit', 'kd_penyakit', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Penyakit.php */
/* Location: ./application/controllers/Penyakit.php */
/* Please DO NOT modify this information : */
