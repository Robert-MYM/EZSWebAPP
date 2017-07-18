<?php
class aks_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function getByPhone($phone)
	{
		$this->db->where('phone', $phone);
		$query = $this->db->get('aks');
		return $query->result_array();
	}

	public function getById($aksid)
	{
		$this->db->where('aksid', $aksid);
		$query = $this->db->get('aks');
		return $query->row();
	}

	public function bind($data)
	{
		$this->db->insert('aks',$data);
	}

	public function delete($aksid)
	{
		$this->db->where('aksid', $aksid);
		$this->db->delete('aks');
	}

}