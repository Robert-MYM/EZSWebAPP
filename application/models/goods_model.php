<?php
class goods_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function add($goods)
	{
		$hits->db->insert('goods',$goods);
	}

	public function get($name)
	{
		$this->db->from('goods');
		$this->db->where('name', $name);
		$query = $this->db->get();
		return $query->result_array();

	}

	public function getAll()
	{
		$query = $this->db->get('goods');
		return $query->result_array();
	}

}