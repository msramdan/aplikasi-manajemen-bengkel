<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

	public $table = 'sale';
	public $id = 'sale_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		$this->db->join('customer', 'customer.customer_id = sale.customer_id', 'left');
		$this->db->join('user', 'user.user_id = sale.user_id', 'left');
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
		$this->db->like('sale_id', $q);
		$this->db->or_like('invoice', $q);
		$this->db->or_like('customer_id', $q);
		$this->db->or_like('total', $q);
		$this->db->or_like('bayar', $q);
		$this->db->or_like('kembalian', $q);
		$this->db->or_like('note', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->or_like('user_id', $q);
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
