<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Diagnosa_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$diagnosa = $this->Diagnosa_model->get_all();
		$data = array(
			'diagnosa_data' => $diagnosa,
		);
		$this->template->load('template', 'diagnosa/diagnosa_list', $data);
	}

	public function read($id)
	{
		$row = $this->Diagnosa_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'id_diagnosa' => $row->id_diagnosa,
				'id_user' => $row->id_user,
				'kd_penyakit' => $row->kd_penyakit,
				'kd_gejala' => $row->kd_gejala,
				'presentase' => $row->presentase,
				'tanggal' => $row->tanggal,
			);
			$this->template->load('template', 'diagnosa/diagnosa_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('diagnosa'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('diagnosa/create_action'),
			'id_diagnosa' => set_value('id_diagnosa'),
			'id_user' => set_value('id_user'),
			'kd_penyakit' => set_value('kd_penyakit'),
			'kd_gejala' => set_value('kd_gejala'),
			'presentase' => set_value('presentase'),
			'tanggal' => set_value('tanggal'),
		);
		$this->template->load('template', 'diagnosa/diagnosa_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'id_user' => $this->input->post('id_user', TRUE),
				'kd_penyakit' => $this->input->post('kd_penyakit', TRUE),
				'kd_gejala' => $this->input->post('kd_gejala', TRUE),
				'presentase' => $this->input->post('presentase', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
			);

			$this->Diagnosa_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('diagnosa'));
		}
	}

	public function update($id)
	{
		$row = $this->Diagnosa_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('diagnosa/update_action'),
				'id_diagnosa' => set_value('id_diagnosa', $row->id_diagnosa),
				'id_user' => set_value('id_user', $row->id_user),
				'kd_penyakit' => set_value('kd_penyakit', $row->kd_penyakit),
				'kd_gejala' => set_value('kd_gejala', $row->kd_gejala),
				'presentase' => set_value('presentase', $row->presentase),
				'tanggal' => set_value('tanggal', $row->tanggal),
			);
			$this->template->load('template', 'diagnosa/diagnosa_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('diagnosa'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_diagnosa', TRUE));
		} else {
			$data = array(
				'id_user' => $this->input->post('id_user', TRUE),
				'kd_penyakit' => $this->input->post('kd_penyakit', TRUE),
				'kd_gejala' => $this->input->post('kd_gejala', TRUE),
				'presentase' => $this->input->post('presentase', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
			);

			$this->Diagnosa_model->update($this->input->post('id_diagnosa', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('diagnosa'));
		}
	}

	public function delete($id)
	{
		$row = $this->Diagnosa_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Diagnosa_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('diagnosa'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('diagnosa'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
		$this->form_validation->set_rules('kd_penyakit', 'kd penyakit', 'trim|required');
		$this->form_validation->set_rules('kd_gejala', 'kd gejala', 'trim|required');
		$this->form_validation->set_rules('presentase', 'presentase', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

		$this->form_validation->set_rules('id_diagnosa', 'id_diagnosa', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "diagnosa.xls";
		$judul = "diagnosa";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();

		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Id User");
		xlsWriteLabel($tablehead, $kolomhead++, "Kd Penyakit");
		xlsWriteLabel($tablehead, $kolomhead++, "Kd Gejala");
		xlsWriteLabel($tablehead, $kolomhead++, "Presentase");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

		foreach ($this->Diagnosa_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->penyakit);
			xlsWriteLabel($tablebody, $kolombody++, $data->kd_gejala);
			xlsWriteLabel($tablebody, $kolombody++, $data->presentase);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}
}

/* End of file Diagnosa.php */
/* Location: ./application/controllers/Diagnosa.php */
/* Please DO NOT modify this information : */
