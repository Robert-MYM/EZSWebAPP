<?php
class user_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function checkphone($phone)
	{
		$this->db->select('phone');
		$this->db->from('userinfo');
		$this->db->where('phone',$phone);
		$query = $this->db->get();
		if($query->num_rows())
			return true;
		else
			return false;

	}

	public function checkpsd($phone,$password)
	{

		$this->db->select('phone');
		$this->db->from('userinfo');
		$this->db->where('phone', $phone);
		$this->db->where('password', $password);
		$query = $this->db->get();
		if($query->num_rows())
			return true;
		else
			return false;
	}

	public function save($data)
	{
		$this->db->insert('userinfo', $data);
	}
}