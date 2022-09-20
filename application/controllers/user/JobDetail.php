<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobDetail extends CI_Controller {

	public function index()
	{
		$this->load->view('template/user_login_header');
		$this->load->view('user/JobDetail');
		$this->load->view('template/user_footer');
	}

}
