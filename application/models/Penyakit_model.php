<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Penyakit_model extends CI_Model
{

	public $table = 'penyakit';
	public $id = 'kd_penyakit';
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
		$this->db->like('kd_penyakit', $q);
		$this->db->or_like('penyakit', $q);
		$this->db->or_like('deskripsi', $q);
		$this->db->or_like('solusi', $q);
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
		$this->db->select('RIGHT(penyakit.kd_penyakit,3) as kd_penyakit', FALSE);
		$this->db->order_by('kd_penyakit', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('penyakit');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kd_penyakit) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "P" . $batas;
		return $kodetampil;
	}
}
