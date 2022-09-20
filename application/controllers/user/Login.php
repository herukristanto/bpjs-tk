<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
	{
			parent::__construct();

			$this->load->library(['form_validation', 'encryption']);
	}

	public function index()
	{
		if($this->session->userdata('access') != '3'){
			$header['is_login'] = false;
		} else {
			$header['is_login'] = true;
		}
		$this->load->view('template/auth_user_header', $header);
		$this->load->view('user/Login');
		$this->load->view('template/auth_user_footer');
	}
}