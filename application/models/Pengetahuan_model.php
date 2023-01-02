<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pengetahuan_model extends CI_Model
{

	public $table = 'pengetahuan';
	public $id = 'id_pengetahuan';
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
		$this->db->like('id_pengetahuan', $q);
		$this->db->or_like('kd_kasus', $q);
		$this->db->or_like('kd_penyakit', $q);
		$this->db->or_like('kd_gejala', $q);
		$this->db->or_like('bobot', $q);
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
		$this->db->select('RIGHT(pengetahuan.kd_kasus,3) as kd_kasus', FALSE);
		$this->db->order_by('kd_kasus', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pengetahuan');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kd_kasus) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "K" . $batas;
		return $kodetampil;
	}
}
