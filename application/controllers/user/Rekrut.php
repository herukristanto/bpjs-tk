<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekrut extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('access') != '3'){
			$header['is_login'] = false;
    }else{
			$header['is_login'] = true;
		}
		
		$this->load->view('template/auth_user_header', $header);
		$this->load->view('user/rekrut');
		$this->load->view('template/auth_user_footer');
	}

}
