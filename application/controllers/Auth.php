<?php defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process()
	{

		$post = $this->input->post(null, TRUE);

		if (isset($post['login'])) {
			$query = $this->User_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level_id' => $row->level_id
				);
				$this->session->set_userdata($params);

				echo "<script>window.location='" . site_url('dashboard') . "'</script>";
			} else {
				$this->session->set_flashdata('gagal', 'Login gagal, username atau password salah');
				redirect(site_url('auth'));
			}
		}
	}

	public function process_register()
	{
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
			'level_id' => 2,
		);
		$this->User_model->insert($data);
		$this->session->set_flashdata('gagal', 'Registrasi berhasil sialhkan login');
		redirect(site_url('auth'));
	}

	public function logout()
	{
		$params = array('userid', 'level_id');
		$this->session->unset_userdata($params);
		redirect('auth');
	}

	public function registrasi()
	{
		$this->load->view('registrasi');
	}

	public function profile()
	{
		$id = $this->fungsi->user_login()->user_id;
		$profile = $this->User_model->get_by_id($id);
		$data = array(
			'profile' => $profile,
		);
		$this->template->load('template', 'profile', $data);
	}

	public function update_profile()
	{

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
				'nama' => $this->input->post('nama', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'email' => $this->input->post('email', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'gambar' => $gambar,
			);
		} else {
			$data = array(
				'password' => sha1($this->input->post('password', TRUE)),
				'nama' => $this->input->post('nama', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'email' => $this->input->post('email', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'gambar' => $gambar,
			);
		}

		$this->User_model->update($this->input->post('user_id', TRUE), $data);
		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('dashboard'));
	}
}
