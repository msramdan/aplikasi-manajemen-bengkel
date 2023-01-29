<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sale extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Customer_model');
		$this->load->model('Sale_model');
		$this->load->model('Barang_model');
		$this->load->model('Service_model');
		$this->load->model('Mekanik_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$sale = $this->Sale_model->get_all();
		$data = array(
			'sale_data' => $sale,
		);
		$this->template->load('template', 'sale/sale_list', $data);
	}



	public function create()
	{
		$data = array(
			'button' => 'Create',
			'customer' => $this->Customer_model->get_all(),
			'mekanik' => $this->Mekanik_model->get_all(),
			'barang' => $this->Barang_model->get_all(),
			'service' => $this->Service_model->get_all(),
			'invoice' => $this->Sale_model->invoice_no(),
			'action' => site_url('sale/create_action'),
			'sale_id' => set_value('sale_id'),
			'customer_id' => set_value('customer_id'),
			'total' => set_value('total'),
			'bayar' => set_value('bayar'),
			'kembalian' => set_value('kembalian'),
			'note' => set_value('note'),
			'tanggal' => set_value('tanggal'),
			'user_id' => set_value('user_id'),
		);
		$this->template->load('template', 'sale/sale_form', $data);
	}

	public function create_action()
	{
		if ($this->input->post('mekanik_id', TRUE) == null || $this->input->post('mekanik_id', TRUE) == '') {
			$mekanik = null;
		} else {
			$mekanik = $this->input->post('mekanik_id', TRUE);
		}

		if ($this->input->post('catatan', TRUE) == null || $this->input->post('catatan', TRUE) == '') {
			$catatan = null;
		} else {
			$catatan = $this->input->post('catatan', TRUE);
		}
		$data = array(
			'invoice' => $this->input->post('invoice', TRUE),
			'customer_id' => $this->input->post('customer_id', TRUE),
			'mekanik_id' => $mekanik,
			'total' => $this->input->post('total', TRUE),
			'bayar' => $this->input->post('bayar', TRUE),
			'kembalian' => $this->input->post('kembalian', TRUE),
			'note' => $catatan,
			'tanggal' => $this->input->post('tanggal', TRUE),
			'user_id' => $this->input->post('user_id', TRUE),
		);
		$this->db->insert('sale', $data);
		$lastId = $this->db->insert_id();


		$produk = $this->input->post('produk', TRUE);
		$harga = $this->input->post('harga', TRUE);
		$qty = $this->input->post('qty', TRUE);
		$subtotal = $this->input->post('subtotal', TRUE);
		foreach ($produk as $i => $prd) {
			$cek = substr($prd, 0, 1);
			if ($cek == 'S') {
				$cekId = $this->db->query("SELECT service_id from service where kode_service='$prd'")->row();
				$service_id = $cekId->service_id;
				$detailBarang = [
					'sale_id' => $lastId,
					'service_id' => $service_id,
					'harga' => $harga[$i],
					'qty' => $qty[$i],
					'total' => $subtotal[$i],
				];
				$this->db->insert('sale_detail_service', $detailBarang);
			} else {
				$cekId = $this->db->query("SELECT barang_id from barang where kode_barang='$prd'")->row();
				$barang_id = $cekId->barang_id;
				$detailBarang = [
					'sale_id' => $lastId,
					'barang_id' => $barang_id,
					'harga' => $harga[$i],
					'qty' => $qty[$i],
					'total' => $subtotal[$i],
				];
				$this->db->insert('sale_detail_barang', $detailBarang);
			}
		}
		$params = array(
			"success" => true,
		);
		echo json_encode($params);
	}

	public function update($id)
	{
		$row = $this->Sale_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('sale/update_action'),
				'sale_id' => set_value('sale_id', $row->sale_id),
				'invoice' => set_value('invoice', $row->invoice),
				'customer_id' => set_value('customer_id', $row->customer_id),
				'total' => set_value('total', $row->total),
				'bayar' => set_value('bayar', $row->bayar),
				'kembalian' => set_value('kembalian', $row->kembalian),
				'note' => set_value('note', $row->note),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'user_id' => set_value('user_id', $row->user_id),
			);
			$this->template->load('template', 'sale/sale_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sale'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('sale_id', TRUE));
		} else {
			$data = array(
				'invoice' => $this->input->post('invoice', TRUE),
				'customer_id' => $this->input->post('customer_id', TRUE),
				'total' => $this->input->post('total', TRUE),
				'bayar' => $this->input->post('bayar', TRUE),
				'kembalian' => $this->input->post('kembalian', TRUE),
				'note' => $this->input->post('note', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'user_id' => $this->input->post('user_id', TRUE),
			);

			$this->Sale_model->update($this->input->post('sale_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('sale'));
		}
	}

	public function delete($id)
	{
		$row = $this->Sale_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Sale_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('sale'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sale'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('invoice', 'invoice', 'trim|required');
		$this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
		$this->form_validation->set_rules('total', 'total', 'trim|required');
		$this->form_validation->set_rules('bayar', 'bayar', 'trim|required');
		$this->form_validation->set_rules('kembalian', 'kembalian', 'trim|required');
		$this->form_validation->set_rules('note', 'note', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

		$this->form_validation->set_rules('sale_id', 'sale_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function getItem($kode)
	{
		$cek = substr($kode, 0, 1);
		if ($cek == 'S') {
			$produk = $this->db->query("SELECT * FROM service where kode_service='$kode'")->row();
		} else {
			$produk = $this->db->query("SELECT * FROM barang where kode_barang='$kode'")->row();
		}
		$params = array(
			"data" => $produk,
			"type" => $cek
		);
		echo json_encode($params);
	}

	public function cetak($id)
	{
		$row = $this->Sale_model->get_by_id(decrypt_url($id));

		if ($row) {
			$sale_detail = $this->db->query("SELECT * FROM sale_detail_barang LEFT JOIN barang on barang.barang_id = sale_detail_barang.barang_id where sale_id='$row->sale_id'")->result();
			$sale_detail_service = $this->db->query("SELECT * FROM sale_detail_service LEFT JOIN service on service.service_id = sale_detail_service.service_id where sale_id='$row->sale_id'")->result();
			$data = array(
				'invoice' => set_value('invoice', $row->invoice),
				'customer_id' => set_value('customer_id', $row->nama_customer),
				'mekanik_id' => set_value('customer_id', $row->nama_mekanik),
				'total' => set_value('total', $row->total),
				'bayar' => set_value('bayar', $row->bayar),
				'kembalian' => set_value('kembalian', $row->kembalian),
				'note' => set_value('note', $row->note),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'user_id' => set_value('user_id', $row->nama),
				'sale_detail' => $sale_detail,
				'sale_detail_service' => $sale_detail_service,
			);
			$this->load->view('sale/cetak', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sale'));
		}
	}
}

/* End of file Sale.php */
/* Location: ./application/controllers/Sale.php */
/* Please DO NOT modify this information : */
