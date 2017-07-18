<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Button extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('aks_model');
		$this->load->model('address_model');
		$this->load->model('creditCard_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="color: #FF0000;text-align:center">', '</div>');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}
	
	public function index()
	{
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			$data['buttons'] = $this->aks_model->getByPhone($phone);
			$data['tag'] = "setting";
			$this->load->view('templates/header.php');
			$this->load->view('button',$data);
			$this->load->view('templates/footer.php');
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}
	}

	public function add($tag = null)
	{
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			$this->form_validation->set_rules('aksid', 'Aksid', 'trim|required|max_length[10]|numeric|is_unique[aks.aksid]',
				array('required' => '按钮ID必填!',
					'max_length' => '按钮ID最大为10位!',
					'numeric' => '按钮ID只能为数字!',
					'is_unique' => '按钮已被使用'));
			$this->form_validation->set_rules('goodsid', 'Goodsid', 'trim|required|exact_length[13]|numeric',
				array('required' => '商品ID必填!',
					'exact_length' => '商品ID为13位!',
					'numeric' => '商品ID为13位只能为数字!'));
			$this->form_validation->set_rules('num', 'Num', 'trim|required|numeric',
				array('required' => '数量必填!',
					'numeric' => '数量只能为数字!'));

			$aksid = $this->input->post('aksid');
			$goodsid = $this->input->post('goodsid');
			$address = $this->input->post('address');
			$addressid = $this->input->post('addressid');
			$card = $this->input->post('card');
			$cardid = $this->input->post('cardid');
			$num = $this->input->post('num');
			$result = array('aksid' => $aksid,
							 'goodsid' => $goodsid,
							 'address' => $address,
							 'addressid' => $addressid,
							 'card' => $card,
							 'cardid' => $cardid,
							 'num' => $num);

			//var_dump($result);
			if($tag == null)
			{
				if ($this->form_validation->run() == FALSE){
					$data['button'] = $result;
					$this->load->view('templates/header.php');
					$this->load->view("AddButton",$data);
				}
				else{
					$data = array('aksid' => $aksid,
						'phone' => $phone,
						'goodsid' => $goodsid,
						'addressid' => $addressid,
						'cardid' => $cardid,
						'num' => $num);
					$this->aks_model->bind($data);
					$this->index();
				}
			}else{
				switch ($tag) {
					case 'goods':
					    $data['button'] = $result;
						$this->load->view('scan',$data);
						break;
					case 'address':
						$data['address'] = $this->address_model->getByPhone($phone);
						$data['choose'] = 'choose';
						$data['button'] = $result;
						$this->load->view("templates/header.php");
						$this->load->view("address",$data);
						break;
					case 'card':
						$data['creditCards'] = $this->creditCard_model->get($phone);
						$data['choose'] = 'choose';
						$data['button'] = $result;
						$this->load->view('templates/header.php');
						$this->load->view("creditCard",$data);
						break;
					case 'undo':
						$data['button'] = $result;
						$this->load->view('templates/header.php');
						$this->load->view("AddButton",$data);
						break;
				}
			}			
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}
	}

	public function scan()
	{
		$this->load->view('scan');
	}


}