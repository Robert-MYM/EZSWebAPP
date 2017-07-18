<?php
class order_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function newOrder($order)
	{
		$this->db->insert($order);
	}

	public function get($phone,$state,$name)
	{
		$this->db->select('*');
		$this->db->from('order');
		$this->db->where('phone',$phone);
		if($state != -1)
			$this->db->where('condition', $state);
		$this->db->join('goods', 'goods.id = order.goodsid');
		if(!empty($name))
			$this->db->where('name',$name);
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function update($id)
	{
		$this->db->set('condition',2);
		$this->db->where('orderid', $id);
		$this->db->update('order');
	}
}