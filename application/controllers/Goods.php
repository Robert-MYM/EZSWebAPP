<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('goods_model');
		$this->load->helper('form');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
     	$data['goods'] = $this->goods_model->getAll();
     	$data['tag'] = "shopping";
     	$this->load->view('templates/header.php');
     	$this->load->view('goods',$data);
     	$this->load->view('templates/footer.php');
	}

	public function search()
	{
		$name = $this->input->post('searchName');
		if(empty($name))
	    	$data['goods'] = $this->goods_model->getAll();
	    else
	    	$data['goods'] = $this->goods_model->get($name);
	    
     	$data['tag'] = "shopping";
     	$this->load->view('templates/header.php');
     	$this->load->view('goods',$data);
     	$this->load->view('templates/footer.php');

	}
}