<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Konsultasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Diagnosa_model');
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

	public function proses()
	{
		$this->db->query("DELETE From temp_probabilitas");
		$this->db->query("DELETE From temp_probabilitas_gejala");
		$this->db->query("DELETE From temp_total");
		//1. tampung data inputan
		$kd_gejala			= $_POST['kd_gejala'];
		$array 				= implode("','", $kd_gejala);
		$user_id			= $_POST['user_id'];
		// 2. insert data diagnosa
		$data = array(
			'id_user ' => $user_id,
			'kd_gejala' => json_encode($kd_gejala),
			'tanggal' => date('Y-m-d H:i:s'),
		);
		$this->Diagnosa_model->insert($data);
		$id_diagnosa = $this->db->insert_id();

		//3. cari penyakit dari pengetahuan yg sesuaidengan gejala
		$sql = "SELECT kd_penyakit,kd_kasus FROM pengetahuan where kd_gejala in ('" . $array . "') GROUP by kd_kasus";
		$rule = $this->db->query($sql)->result();
		$ganguanAkibatGejala = $this->db->query($sql)->num_rows();

		// ===== hitung probabilitas setiap penyakit ==============
		// 4. hitung jumlah penyakit pada basis pengetahuan
		$jmlAllKasus = $this->db->query("SELECT * FROM pengetahuan GROUP by kd_kasus")->num_rows();

		// 5. probabilitas setiap penyakit
		foreach ($rule as $value) {
			$peluangPenyakit = $this->db->query("SELECT * from pengetahuan where kd_penyakit='$value->kd_penyakit' GROUP by kd_kasus")->num_rows();

			//6. insert temp_probabilitas
			$pro = $peluangPenyakit / $jmlAllKasus;
			$data = array(
				'kd_penyakit' => $value->kd_penyakit,
				'probabilitas' => $pro,
			);
			$this->db->insert('temp_probabilitas', $data);
			//7. insert temp_probabilitas_gejala
			foreach ($kd_gejala as $row) {
				// cek di penyakit(kd_penyakit) ada tidak gejala ini
				$cekJml = $this->db->query("SELECT * from pengetahuan where kd_penyakit='$value->kd_penyakit' and kd_gejala='$row' ")->num_rows();
				$nilai  = $cekJml / $ganguanAkibatGejala;
				$data = array(
					'kd_penyakit' => $value->kd_penyakit,
					'kd_gejala' => $row,
					'pembilang' => $cekJml,
					'penyebut' => $ganguanAkibatGejala,
					'nilai' =>  $nilai,
				);
				$this->db->insert('temp_probabilitas_gejala', $data);
			}
		}
		// hitung Naïve Bayes setiap Penyakit P(P00X|G00X)
		$temp_pro = $this->db->query("SELECT * FROM temp_probabilitas")->result();
		foreach ($temp_pro as $value) {
			$total = 0;
			foreach ($kd_gejala as $data) {
				$get = $this->db->query("SELECT * FROM temp_probabilitas_gejala join temp_probabilitas on temp_probabilitas.kd_penyakit = temp_probabilitas_gejala.kd_penyakit where kd_gejala='$data'")->result();
				$pembilang = pembilang($value->kd_penyakit, $data);
				$penyebut = penyebut($data);
				$total = $total + ($pembilang / $penyebut);
			}

			$data = array(
				'kd_penyakit' => $value->kd_penyakit,
				'total' =>  $total,
			);
			$this->db->insert('temp_total', $data);
		}
		$totalBayes = $this->db->query("SELECT SUM(total) AS total FROM temp_total")->row();
		$t = $totalBayes->total;
		$fetch_temp_total = $this->db->query("SELECT * FROM temp_total")->result();
		foreach ($fetch_temp_total as $rows) {
			$data = array(
				'total_bayes' => $t,
				'persentase' => ($rows->total / $t) * 100,
			);
			$this->db->where('kd_penyakit', $rows->kd_penyakit);
			$this->db->update('temp_total', $data);
		}
		$data_persentase = $this->db->query("SELECT * FROM temp_total join penyakit on penyakit.kd_penyakit =temp_total.kd_penyakit order by persentase desc ")->result();
		$top = $this->db->query("SELECT * FROM temp_total join penyakit on penyakit.kd_penyakit =temp_total.kd_penyakit order by persentase desc limit 1 ")->row();
		// update diagnosa
		$data = array(
			'kd_penyakit' => $top->kd_penyakit,
			'presentase' => $top->persentase
		);
		$this->db->where('id_diagnosa', $id_diagnosa);
		$this->db->update('diagnosa', $data);

		$informasi = array(
			'user' => $this->User_model->get_by_id($user_id),
			'data_persentase' => $data_persentase,
			'data_gejala' => $kd_gejala,
			'top' => $top,
		);
		$this->template->load('template', 'diagnosa', $informasi);
	}
}
