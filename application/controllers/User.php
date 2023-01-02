<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$user = $this->User_model->get_all();
		$data = array(
			'user_data' => $user,
		);
		$this->template->load('template', 'user/user_list', $data);
	}

	public function read($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'user_id' => $row->user_id,
				'username' => $row->username,
				'password' => $row->password,
				'nama' => $row->nama,
				'alamat' => $row->alamat,
				'email' => $row->email,
				'phone' => $row->phone,
				'gambar' => $row->gambar,
				'level_id' => $row->level_id,
			);
			$this->template->load('template', 'user/user_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('user/create_action'),
			'user_id' => set_value('user_id'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'nama' => set_value('nama'),
			'alamat' => set_value('alamat'),
			'email' => set_value('email'),
			'phone' => set_value('phone'),
			'gambar' => set_value('gambar'),
			'level_id' => set_value('level_id'),
		);
		$this->template->load('template', 'user/user_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$config['upload_path']      = './assets/img';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload("gambar");
			$data = $this->upload->data();
			$gambar = $data['file_name'];


			$data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => sha1($this->input->post('password', TRUE)),
				'nama' => $this->input->post('nama', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'email' => $this->input->post('email', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'gambar' => $gambar,
				'level_id' => $this->input->post('level_id', TRUE),
			);

			$this->User_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('user'));
		}
	}

	public function update($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('user/update_action'),
				'user_id' => set_value('user_id', $row->user_id),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'nama' => set_value('nama', $row->nama),
				'alamat' => set_value('alamat', $row->alamat),
				'email' => set_value('email', $row->email),
				'phone' => set_value('phone', $row->phone),
				'gambar' => set_value('gambar', $row->gambar),
				'level_id' => set_value('level_id', $row->level_id),
			);
			$this->template->load('template', 'user/user_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('user_id', TRUE)));
		} else {

			$config['upload_path']      = './assets/img';
			$config['allowed_types']    = '*';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload("gambar")) {
				$id = $this->input->post('user_id');
				$row = $this->User_model->get_by_id($id);
				$data = $this->upload->data();
				$gambar = $data['file_name'];
				if ($row->gambar == null || $row->gambar == '') {
				} else {
					$target_file = './assets/img/' . $row->gambar;
					unlink($target_file);
				}
			} else {
				$gambar = $this->input->post('gambar_lama');
			}


			if ($this->input->post('password') == '' || $this->input->post('password') == null) {
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'nama' => $this->input->post('nama', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'email' => $this->input->post('email', TRUE),
					'phone' => $this->input->post('phone', TRUE),
					'gambar' => $gambar,
					'level_id' => $this->input->post('level_id', TRUE),
				);
			} else {
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'password' => sha1($this->input->post('password', TRUE)),
					'nama' => $this->input->post('nama', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'email' => $this->input->post('email', TRUE),
					'phone' => $this->input->post('phone', TRUE),
					'gambar' => $gambar,
					'level_id' => $this->input->post('level_id', TRUE),
				);
			}

			$this->User_model->update($this->input->post('user_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('user'));
		}
	}

	public function delete($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));

		if ($row) {

			if ($row->gambar == null || $row->gambar == '') {
			} else {
				$target_file = './assets/img/' . $row->gambar;
				unlink($target_file);
			}
			$this->User_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('user'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		// $this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
		$this->form_validation->set_rules('level_id', 'level id', 'trim|required');

		$this->form_validation->set_rules('user_id', 'user_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function download($gambar)
	{
		force_download('assets/img/' . $gambar, NULL);
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
