<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Konsultasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Gejala_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$gejala = $this->Gejala_model->get_all();
		$user = $this->User_model->get_all();
		$data = array(
			'gejala_data' => $gejala,
			'user_data' => $user,
		);

		$this->template->load('template', 'konsultasi', $data);
	}
}
