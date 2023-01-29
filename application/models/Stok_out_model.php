<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Stok_out_model extends CI_Model
{

	public $table = 'stok';
	public $id = 'stok_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		$this->db->join('barang', 'barang.barang_id = stok.barang_id', 'left');
		$this->db->where('type', 'Out');
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
		$this->db->like('stok_id', $q);
		$this->db->or_like('barang_id', $q);
		$this->db->or_like('type', $q);
		$this->db->or_like('detail', $q);
		$this->db->or_like('supplier_id', $q);
		$this->db->or_like('qty', $q);
		$this->db->or_like('tanggal', $q);
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
}
