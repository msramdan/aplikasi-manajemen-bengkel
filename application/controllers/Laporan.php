<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Laporan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$laporan = $this->Laporan_model->get_all();
		$data = array(
			'laporan_data' => $laporan,
		);
		$this->template->load('template', 'laporan/sale_list', $data);
	}


	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "sale.xls";
		$judul = "sale";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Invoice");
		xlsWriteLabel($tablehead, $kolomhead++, "Customer");
		xlsWriteLabel($tablehead, $kolomhead++, "Mekanik");
		xlsWriteLabel($tablehead, $kolomhead++, "Total");
		xlsWriteLabel($tablehead, $kolomhead++, "Bayar");
		xlsWriteLabel($tablehead, $kolomhead++, "Kembalian");
		xlsWriteLabel($tablehead, $kolomhead++, "Note");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
		xlsWriteLabel($tablehead, $kolomhead++, "Penginput");

		foreach ($this->Laporan_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->invoice);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_customer);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_mekanik);
			xlsWriteNumber($tablebody, $kolombody++, $data->total);
			xlsWriteNumber($tablebody, $kolombody++, $data->bayar);
			xlsWriteNumber($tablebody, $kolombody++, $data->kembalian);
			xlsWriteLabel($tablebody, $kolombody++, $data->note);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama);
			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
/* Please DO NOT modify this information : */
