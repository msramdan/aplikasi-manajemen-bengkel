<?php
date_default_timezone_set('Asia/Jayapura');

function check_already_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if ($user_session) {
		redirect('dashboard');
	}
}

function is_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

function check_admin()
{
	$ci = &get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level_id != 1) {
		echo "Tidak Ada akses";
		die();
	}
}

function namaGejala($kd_gejala)
{
	$ci = &get_instance();
	$jml = $ci->db->query("SELECT * FROM gejala WHERE kd_gejala ='$kd_gejala' ");
	if ($jml->num_rows() == 0) {
		$value = 'None';
	} else {
		$x = $jml->row();
		$value = $x->gejala;
	}
	return $value;
}

function checked($kd_kasus, $kd_penyakit, $kd_gejala)
{
	$ci = &get_instance();
	$jml = $ci->db->query("SELECT * FROM pengetahuan WHERE kd_kasus ='$kd_kasus' AND kd_gejala ='$kd_gejala' AND kd_penyakit ='$kd_penyakit' ");
	if ($jml->num_rows() > 0) {
		return "checked";
	}
}

function pembilang($kd_penyakit, $kd_gejala)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM temp_probabilitas_gejala join temp_probabilitas on temp_probabilitas.kd_penyakit = temp_probabilitas_gejala.kd_penyakit where kd_gejala='$kd_gejala' AND temp_probabilitas_gejala.kd_penyakit='$kd_penyakit' ")->row();
	return $data->nilai * $data->probabilitas;
}

function penyebut($kd_gejala)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM temp_probabilitas_gejala join temp_probabilitas on temp_probabilitas.kd_penyakit = temp_probabilitas_gejala.kd_penyakit where kd_gejala='$kd_gejala'")->result();
	$nilaiTotal = 0;
	foreach ($data as $value) {
		$nilaiTotal = $nilaiTotal + ($value->nilai * $value->probabilitas);
	}
	return $nilaiTotal;
}
