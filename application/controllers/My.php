<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('goods_model');
		$this->load->model('address_model');
		$this->load->model('creditCard_model');
		$this->load->model('aks_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="color: #FF0000">', '</div>');
		$this->load->library('session');
	}
	
	public function index()
	{
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			$data['phone'] = $phone;
			$data['tag'] = "my";
			$this->load->view("my",$data);
			$this->load->view("templates/footer.php");
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}
	}

	public function getOrder($state = -1)
	{
		$name = $this->input->post('searchName');
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			$data['orders'] = $this->order_model->get($phone,$state,$name);
			$data['state'] = $state;
			$this->load->view("templates/header.php");
			$this->load->view("order",$data);
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}

	}
	public function confirm($id)
	{
		$this->order_model->update($id);
		$this->getOrder();
	}

	public function getAddress($msg = null)
	{
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			$data['address'] = $this->address_model->getByPhone($phone);
			$data['msg'] = $msg;
			$this->load->view("templates/header.php");
			$this->load->view("address",$data);
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}

	}

	public function deleteAddress($id)
	{
		$msg = null;
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			if($this->address_model->checkIsUse($id)){
				$this->address_model->delete($id);
			}else{
				$msg = 1;
			}
			$this->getAddress($msg);
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}

	}

	public function EditAddress($id = null,$index = null)
	{
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			if(empty($id)){
				$this->load->view("templates/header.php");
				$this->load->view("EditAddress");

			}else{
				$data['address'] = $this->address_model->getById($id);
				$data['index'] = $index;
				$this->load->view("templates/header.php");
				$this->load->view("EditAddress",$data);
			}
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}

	}

	public function UpdateAddress($id)
	{
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|exact_length[11]|numeric',
			array('required' => '手机号必填!',
				'exact_length' => '手机号为11位!',
				'numeric' => '手机号只能为数字!'));
		$this->form_validation->set_rules('name', 'Name', 'trim|required',
			array('required' => '姓名必填!'));
		$this->form_validation->set_rules('address', 'Address', 'trim|required',
			array('required' => '地址必填!'));

		if ($this->form_validation->run() == FALSE){
			$this->EditAddress($id,0);
		}
		else{
			$phone = $this->input->post('phone');
			$name = $this->input->post('name');
			$address = $this->input->post('address');

			$this->address_model->update($id,$phone,$name,$address);
			$this->getAddress();
		}

	}

	public function AddAddress()
	{
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|exact_length[11]|numeric',
				array('required' => '手机号必填!',
					'exact_length' => '手机号为11位!',
					'numeric' => '手机号只能为数字!'));
			$this->form_validation->set_rules('name', 'Name', 'trim|required',
				array('required' => '姓名必填!'));
			$this->form_validation->set_rules('address', 'Address', 'trim|required',
				array('required' => '地址必填!'));

			if ($this->form_validation->run() == FALSE){
				$this->EditAddress(null,1);
			}
			else{
				$realphone = $this->input->post('phone');
				$name = $this->input->post('name');
				$address = $this->input->post('address');

				$data = array('phone' => $phone,
							 'realphone' => $realphone,
							 'name' => $name,
							 'address' => $address);
				$this->address_model->add($data);
				$this->getAddress();
			}
		}else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}

	}

	public function getCreditCard()
	{
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			$data['creditCards'] = $this->creditCard_model->get($phone);
			$this->load->view('templates/header.php');
			$this->load->view("creditCard",$data);
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}
	}

	public function addCreditCard()
	{
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			
			$this->form_validation->set_rules('cardID', 'CardID', 'trim|required|exact_length[19]|numeric',
				array('required' => '银行卡号必填!',
					'exact_length' => '银行卡号为19位!',
					'numeric' => '银行卡号只能为数字!'));
			$this->form_validation->set_rules('password', 'Password', 'trim|required|exact_length[6]|numeric',
				array('required' => '密码必填!',
					'exact_length' => '密码为6位!',
					'numeric' => '密码只能为数字!'));

			if ($this->form_validation->run() == FALSE){
				$data['msg'] = '银行卡号或者密码或者银行选择错误!';
				$this->load->view('templates/header.php');
				$this->load->view("AddCreditCard",$data);
			}
			else{
				$cardID = $this->input->post('cardID');
				$password = $this->input->post('password');
				$bank = $this->input->post('name');

				if($this->creditCard_model->checkpsd($cardID,$password,$bank))
				{
					$data = array('phone' => $phone,
						'cardID' => $cardID,
						'bank' => $bank);
					$this->creditCard_model->add($data);
					$this->getCreditCard();
				}
				else{
					$data['msg'] = '银行卡号或者密码或者银行选择错误!';
					$this->load->view('templates/header.php');
					$this->load->view("AddCreditCard",$data);
				}
			}

			$this->getCreditCard();
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}
	}

	public function addCreditCardTable()
	{
		$this->load->view('templates/header.php');
		$this->load->view("AddCreditCard");
	}
}