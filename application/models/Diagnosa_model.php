<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Diagnosa_model extends CI_Model
{

	public $table = 'diagnosa';
	public $id = 'id_diagnosa';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		if ($this->fungsi->user_login()->level_id != 1) {
			$this->db->where('user_id', $this->fungsi->user_login()->user_id);
		}
		$this->db->join('user', 'user.user_id  = diagnosa.id_user');
		$this->db->join('penyakit', 'penyakit.kd_penyakit  = diagnosa.kd_penyakit');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{

		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('id_diagnosa', $q);
		$this->db->or_like('id_user', $q);
		$this->db->or_like('kd_penyakit', $q);
		$this->db->or_like('kd_gejala', $q);
		$this->db->or_like('presentase', $q);
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
