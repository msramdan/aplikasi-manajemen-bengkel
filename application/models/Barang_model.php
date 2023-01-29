<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Barang_model extends CI_Model
{

	public $table = 'barang';
	public $id = 'barang_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		$this->db->join('unit', 'unit.unit_id = barang.unit_id', 'left');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('barang_id', $q);
		$this->db->or_like('kode_barang', $q);
		$this->db->or_like('nama_barang', $q);
		$this->db->or_like('unit_id', $q);
		$this->db->or_like('harga', $q);
		$this->db->or_like('stok', $q);
		$this->db->or_like('keterangan', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	public function CreateCode()
	{
		$this->db->select('RIGHT(barang.kode_barang,3) as kode_barang', FALSE);
		$this->db->order_by('kode_barang', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('barang');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode_barang) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "B" . $batas;
		return $kodetampil;
	}
}
