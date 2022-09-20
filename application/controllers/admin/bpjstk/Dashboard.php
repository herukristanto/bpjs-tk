<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		error_reporting(0);
		if($this->session->userdata('access') != '1'){
			$url=base_url('auth/login');
			redirect($url);
    };
	}

	public function index()
	{
		$this->load->view('template/admin_header_sidebar');
		$this->load->view('admin/bpjstk/dashboard');
		$this->load->view('template/admin_footer');
	}
}