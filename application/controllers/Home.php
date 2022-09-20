<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_profile_model','profile');
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
		$this->load->view('home');
		$this->load->view('template/user_footer');
	}

	public function JobBoard()
	{
		$this->load->model('Job_model');
		$first_search = $this->input->post('first_search');
		$data['list_job_board'] = $this->Job_model->searchJob($first_search);
		$data['new_job'] = $this->Job_model->newJob();

		$this->load->view('template/user_header');
		$this->load->view('job-board',$data);
		$this->load->view('template/user_footer');
	}

	public function login()
	{
		if($this->session->userdata('access') != '3'){
			$header['is_login'] = false;
    }else{
			$header['is_login'] = true;
		}
		$this->load->view('template/user_header', $header);
		$this->load->view('user/login');
		$this->load->view('template/user_footer');
	}

}
