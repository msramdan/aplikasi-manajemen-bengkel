<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Gejala_model extends CI_Model
{

	public $table = 'gejala';
	public $id = 'kd_gejala';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
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
		$this->db->like('kd_gejala', $q);
		$this->db->or_like('gejala', $q);
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
		$this->db->select('RIGHT(gejala.kd_gejala,3) as kd_gejala', FALSE);
		$this->db->order_by('kd_gejala', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('gejala');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kd_gejala) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "G" . $batas;
		return $kodetampil;
	}
}
