<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pengetahuan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Pengetahuan_model');
		$this->load->model('Penyakit_model');
		$this->load->model('Gejala_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// $pengetahuan = $this->Pengetahuan_model->get_all();
		$pengetahuan = $this->db->query("SELECT * From pengetahuan join penyakit on penyakit.kd_penyakit = pengetahuan.kd_penyakit group by kd_kasus order by kd_kasus desc")->result();
		$data = array(
			'pengetahuan_data' => $pengetahuan,
		);
		$this->template->load('template', 'pengetahuan/pengetahuan_list', $data);
	}

	public function read($kd_kasus)
	{
		$kd_kasus = decrypt_url($kd_kasus);
		$row = $this->db->query("SELECT * From pengetahuan join penyakit on penyakit.kd_penyakit = pengetahuan.kd_penyakit where kd_kasus='$kd_kasus' group by kd_kasus")->row();
		$gejala = $this->Gejala_model->get_all();
		if ($row) {
			$data = array(
				'kd_kasus' => $row->kd_kasus,
				'kd_penyakit' => $row->kd_penyakit,
				'penyakit' => $row->penyakit,
				'deskripsi' => $row->deskripsi,
				'solusi' => $row->solusi,
				'gejala_data' => $gejala,
				'id_pengetahuan' => $row->id_pengetahuan,
			);
			$this->template->load('template', 'pengetahuan/penyakit_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pengetahuan'));
		}
	}

	public function create()
	{
		$gejala = $this->Gejala_model->get_all();
		$penyakit = $this->db->query("SELECT penyakit.kd_penyakit as kode,penyakit.penyakit FROM `penyakit` LEFT JOIN pengetahuan on pengetahuan.kd_penyakit=penyakit.kd_penyakit WHERE id_pengetahuan is null;")->result();
		$data = array(
			'button' => 'Create',
			'action' => site_url('pengetahuan/create_action'),
			'id_pengetahuan' => set_value('id_pengetahuan'),
			'kd_kasus' => $this->Pengetahuan_model->CreateCode(),
			'kd_penyakit' => $penyakit,
			'kd_gejala' => set_value('kd_gejala'),
			'bobot' => set_value('bobot'),
			'gejala_data' => $gejala,
		);
		$this->template->load('template', 'pengetahuan/pengetahuan_form', $data);
	}

	public function create_action()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$bobot               = $_POST['bobot'];
			$kd_gejala       = $_POST['kd_gejala'];
			$fix_kasus = $this->input->post('kd_kasus', TRUE);
			$fix_penyakit =  $this->input->post('kd_penyakit', TRUE);

			$jumlah_data = count($kd_gejala);
			for ($i = 0; $i < $jumlah_data; $i++) {
				$fix_gejala = $kd_gejala[$i];
				if ($bobot[$i] != 0) {
					$data['kd_kasus'] = $fix_kasus;
					$data['kd_penyakit'] = $fix_penyakit;
					$data['kd_gejala'] = $fix_gejala;
					$data['bobot'] = $bobot[$i];
					$this->db->insert('pengetahuan', $data);
				}
			}
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('pengetahuan'));
		}
	}

	public function update($id)
	{
		$row = $this->Pengetahuan_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('pengetahuan/update_action'),
				'id_pengetahuan' => set_value('id_pengetahuan', $row->id_pengetahuan),
				'kd_kasus' => set_value('kd_kasus', $row->kd_kasus),
				'kd_penyakit' => set_value('kd_penyakit', $row->kd_penyakit),
				'kd_gejala' => set_value('kd_gejala', $row->kd_gejala),
				'bobot' => set_value('bobot', $row->bobot),
			);
			$this->template->load('template', 'pengetahuan/pengetahuan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pengetahuan'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_pengetahuan', TRUE));
		} else {
			$data = array(
				'kd_kasus' => $this->input->post('kd_kasus', TRUE),
				'kd_penyakit' => $this->input->post('kd_penyakit', TRUE),
				'kd_gejala' => $this->input->post('kd_gejala', TRUE),
				'bobot' => $this->input->post('bobot', TRUE),
			);

			$this->Pengetahuan_model->update($this->input->post('id_pengetahuan', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('pengetahuan'));
		}
	}

	public function delete($kd_kasus)
	{
		$this->db->where('kd_kasus', decrypt_url($kd_kasus));
		$this->db->delete('pengetahuan');
		$this->session->set_flashdata('message', 'Delete Record Success');
		redirect(site_url('pengetahuan'));
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kd_kasus', 'kd kasus', 'trim|required');
		$this->form_validation->set_rules('kd_penyakit', 'kd penyakit', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function bobot()
	{
		$bobot               = $_POST['bobot'];
		$kd_penyakit       = $_POST['kd_penyakit'];
		$kd_gejala       = $_POST['kd_gejala'];
		$kd_kasus       = $_POST['kd_kasus'];

		$jumlah_data = count($kd_kasus);
		for ($i = 0; $i < $jumlah_data; $i++) {
			$fix_penyakit = $kd_penyakit[$i];
			$fix_gejala = $kd_gejala[$i];
			$fix_kasus = $kd_kasus[$i];


			// cek udah ada data atw blm
			$jml = $this->db->query("SELECT * FROM pengetahuan WHERE kd_kasus ='$fix_kasus' AND kd_penyakit ='$fix_penyakit' AND kd_gejala ='$fix_gejala'");
			if ($jml->num_rows() == 0) {
				// cek nilainya 0 gk
				if ($bobot[$i] != 0) {
					$data['kd_kasus'] = $fix_kasus;
					$data['kd_penyakit'] = $fix_penyakit;
					$data['kd_gejala'] = $fix_gejala;
					$data['bobot'] = $bobot[$i];
					$this->db->insert('pengetahuan', $data);
				}
			} else {
				if ($bobot[$i] != 0) {
					$data = array(
						'bobot' => $bobot[$i]
					);
					$this->db->where('kd_kasus', $fix_kasus);
					$this->db->where('kd_penyakit', $fix_penyakit);
					$this->db->where('kd_gejala', $fix_gejala);
					$this->db->update('pengetahuan', $data);
				} else {
					$this->db->where('kd_kasus', $fix_kasus);
					$this->db->where('kd_penyakit', $fix_penyakit);
					$this->db->where('kd_gejala', $fix_gejala);
					$this->db->delete('pengetahuan');
				}
			}
		}
		$this->session->set_flashdata('message', 'Update Value Bobot Success');
		redirect(site_url('pengetahuan'));
	}
}

/* End of file Pengetahuan.php */
/* Location: ./application/controllers/Pengetahuan.php */
/* Please DO NOT modify this information : */
