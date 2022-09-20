<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile extends CI_Controller {

	public function __construct(){
		parent::__construct();

    $this->load->model('Job_model','job');
		$this->load->model('User_profile_model','profile');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	public function index()
	{
		if($this->session->userdata('access') != '3'){
			$header['is_login'] = false;
			$data['login'] = false;
    	}else{
			$id_user = $this->session->userdata('id');
			$header['is_login'] = true;
			$header['login'] = $this->profile->getName($id_user);
			$data['login'] = $this->profile->getName($id_user);
		}
		$this->load->view('template/user_header', $header);
		$this->load->view('user/UserProfile');
		$this->load->view('template/user_footer');
	}

}
