<?php
class address_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}



	public function getByPhone($phone)
	{
		$this->db->where('phone',$phone);
		$query = $this->db->get('address');
		return $query->result_array();
	}

	public function getById($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('address');
		return $query->row();
	}



	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('address');
	}

	public function update($id,$phone,$name,$address)
	{
		$this->db->set('realphone',$phone);
		$this->db->set('name',$name);
		$this->db->set('address',$address);
		$this->db->where('id',$id);
		$this->db->update('address');
	}

	public function add($data)
	{
		$this->db->insert('address',$data);
	}

	public function checkIsUse($id)
	{
		$this->db->where('addressid',$id);
		$query = $this->db->get('aks');
		if($query->num_rows())
			return false;
		else
			return true;
	}

}