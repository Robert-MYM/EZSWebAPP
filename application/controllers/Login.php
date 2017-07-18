<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="color: #FF0000">', '</div>');
		$this->load->helper('url_helper');
        $this->load->library('session');
	}

	public function index($msg = null)
	{
        $data['msg'] = $msg;
        $this->load->view('templates/header.php');
		$this->load->view('login',$data);
	}

	public function login()
	{
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|exact_length[11]|numeric',
            array('required' => '手机号必填!',
              'exact_length' => '手机号为11位!',
              'numeric' => '手机号只能为数字!'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
            array('required' => '密码必填!',
              'min_length' => '密码最少为6位!'));

        if ($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $phone = $this->input->post('phone');
            $password = $this->input->post('password');

            if($this->user_model->checkphone($phone)){
                if($this->user_model->checkpsd($phone,$password)){
                    $this->session->set_userdata('phone',$phone);
                    redirect('Goods','refresh');
                }
                else
                    $this->index('手机号或者密码错误!');
            }
            else
                $this->index('手机号不存在!');
        }
  	}

    public function logout()
    {
        $this->session->sess_destroy();
        $this->index();

    }
}