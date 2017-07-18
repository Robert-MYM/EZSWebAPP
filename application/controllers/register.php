<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="color: #FF0000">', '</div>');
		$this->load->helper('url_helper');
	}

	public function index($msg = null)
	{
		$data['msg'] = $msg;
		$this->load->view('templates/header.php');
		$this->load->view('register',$data);
	}

	public function register()
	{
       	$this->form_validation->set_rules('phone', 'Phone', 'trim|required|exact_length[11]|numeric|is_unique[userinfo.phone]',
            array('required' => '手机号必填!',
                  'exact_length' => '手机号为11位!',
                  'numeric' => '手机号只能为数字!',
                  'is_unique' => '手机号已使用'));
       	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[userinfo.email]',
            array('required' => '邮箱必填!',
              	  'valid_email' => '邮箱格式错误!',
              	  'is_unique' => '邮箱已使用!'));
       	$this->form_validation->set_rules('name', 'Name', 'trim|required',
            array('required' => '姓名必填!'));
       	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
            array('required' => '密码必填!',
              	  'min_length' => '密码最少为6位!'));
        $this->form_validation->set_rules('confirm', 'Confirm', 'trim|required|matches[password]',
            array('required' => '确认密码必填!',
              	  'matches' => '两次输入密码不一致!'));

        if ($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $password = $this->input->post('password');

            $data = array('phone' => $phone, 
            			  'email' => $email,
            			  'username' => $name,
            			  'password' => $password);

            $this->user_model->save($data);

            redirect('/Login/index/0'.$tag,'refresh');
        }
	}

}