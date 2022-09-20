<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('auth/Login_model','login_model');
		error_reporting(0);
	}

	public function index()
	{
		$this->load->view('template/auth_header');
		$this->load->view('auth/login');
		$this->load->view('template/auth_footer');
	}

	function auth() 
	{
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = $this->input->post('chk-activation');
		$response = $this->input->post('g-recaptcha-response');
		$token = $this->input->post('token');
	
		$request = file_get_contents($url. '?secret=' . $secret . '&response=' . $response);
	
		$result = json_decode($request, true);
		
		$username=str_replace("'", "", htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES));
		$password=str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
		$validate_us=$this->login_model->validasi_username($username);
		if($validate_us->num_rows() > 0) {
			$validate_ps=$this->login_model->validasi_password($username,$password);
			if($validate_ps->num_rows() > 0) {
				$this->session->set_userdata('logged',TRUE);
				$this->session->set_userdata('user',TRUE);
				$x = $validate_ps->row_array();

				if($x['id_role'] == '1') { //Administrator
					if ($result['success'] == true) {
						$this->session->set_userdata('access','1');
						$id=$x['id'];
						$name=$x['username'];
						$this->session->set_userdata('id',$id);
						$this->session->set_userdata('name',$name);
						redirect('admin/bpjstk/dashboard');
					} else {
						echo $this->session->set_flashdata('msg', 'danger');
						redirect('auth/login');
					}
				} else {
					redirect('auth/login');
				}		
			} else {
				if($token == TOKEN_ADMIN){
					$url=base_url('auth/login');
					$url_log = base_url('auth/login');
					if ($this->input->post('log_user') == 1) {
						echo $this->session->set_flashdata('msg', 'warning');
						redirect($url_log);
					} else {
						echo $this->session->set_flashdata('msg', 'warning');
						redirect($url);
					}
				}
			}
		} else {
			if($token == TOKEN_ADMIN){
				$url=base_url('auth/login');
				$url_log = base_url('auth/login');
				if ($this->input->post('log_user') == 1) {
					echo $this->session->set_flashdata('msg', 'info');
					redirect($url_log);
				} else {
					echo $this->session->set_flashdata('msg', 'info');
					redirect($url);
				}
			}
		}
	}

	function auth_company()
	{
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = $this->input->post('chk-activation');
		$response = $this->input->post('g-recaptcha-response');
		$token = $this->input->post('token');
	
		$request = file_get_contents($url. '?secret=' . $secret . '&response=' . $response);
	
		$result = json_decode($request, true);
		
		$username=str_replace("'", "", htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES));
		$password=str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
		$validate_us=$this->login_model->validasi_username($username);
		if($validate_us->num_rows() > 0) {
			$validate_ps=$this->login_model->validasi_password($username,$password);
			if($validate_ps->num_rows() > 0) {
				$this->session->set_userdata('logged',TRUE);
				$this->session->set_userdata('user',TRUE);
				$x = $validate_ps->row_array();

				if($x['id_role'] == '2') {
					if ($result['success'] == true) {
						$this->session->set_userdata('access','2');
						$id=$x['id'];
						$name=$x['username'];
						$this->session->set_userdata('id',$id);
						$this->session->set_userdata('name',$name);
						redirect('admin/company/dashboard');
					} else {
						echo $this->session->set_flashdata('msg', 'danger');
						redirect('user/rekrut');
					}
				}	else {
					$this->session->set_flashdata('msg', 'company');
					redirect('user/rekrut');
				}
			} else {
				if($token == TOKEN_COMPANY){
					$url=base_url('user/rekrut');
					$url_log = base_url('user/rekrut');
					if ($this->input->post('log_user') == 1) {
						echo $this->session->set_flashdata('msg', 'warning');
						redirect($url_log);
					} else {
						echo $this->session->set_flashdata('msg', 'warning');
						redirect($url);
					}
				}
			}
		} else {
			if($token == TOKEN_COMPANY){
				$url=base_url('user/rekrut');
				$url_log = base_url('user/rekrut');
				if ($this->input->post('log_user') == 1) {
					echo $this->session->set_flashdata('msg', 'info');
					redirect($url_log);
				} else {
					echo $this->session->set_flashdata('msg', 'info');
					redirect($url);
				}
			}
		}
	}

	function auth_user()
	{
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = $this->input->post('chk-activation');
		$response = $this->input->post('g-recaptcha-response');
		$token = $this->input->post('token');
	
		$request = file_get_contents($url. '?secret=' . $secret . '&response=' . $response);
	
		$result = json_decode($request, true);
		
		$username=str_replace("'", "", htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES));
		$password=str_replace("'", "", htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
		$validate_us=$this->login_model->validasi_username($username);
		if($validate_us->num_rows() > 0) {
			$validate_ps=$this->login_model->validasi_password($username,$password);
			if($validate_ps->num_rows() > 0) {
				$this->session->set_userdata('logged',TRUE);
				$this->session->set_userdata('user',TRUE);
				$x = $validate_ps->row_array();

				if($x['id_role'] == '3') {
					if($x['status'] == 1) {
						if ($result['success'] == true) {	
							$this->session->set_userdata('access','3');
							$id=$x['id'];
							$name=$x['username'];
							$this->session->set_userdata('id',$id);
							$this->session->set_userdata('name',$name);
							redirect('jobs');
						} else {
							echo $this->session->set_flashdata('msg', 'danger');
							redirect('user/login');
						}
					} else {
						echo $this->session->set_flashdata('verif', 'please');
						redirect('user/login');
					}
				}	else {
					echo $this->session->set_flashdata('msg', 'user');
					redirect('user/login');
				}		
			} else {
				if($token == TOKEN_USER){
					$url=base_url('auth/login');
					$url_log = base_url('user/login');
					if ($this->input->post('log_user') == 1) {
						echo $this->session->set_flashdata('msg', 'warning');
						redirect($url_log);
					} else {
						echo $this->session->set_flashdata('msg', 'warning');
						redirect($url);
					}
				}
			}
		} else {
			if($token == TOKEN_USER){
				$url=base_url('auth/login');
				$url_log = base_url('user/login');
				if ($this->input->post('log_user') == 1) {
					echo $this->session->set_flashdata('msg', 'info');
					redirect($url_log);
				} else {
					echo $this->session->set_flashdata('msg', 'info');
					redirect($url);
				}
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		$url=base_url('auth/login');
		redirect($url);
	}

	function logout_company()
	{
		$this->session->sess_destroy();
		$url=base_url('/');
		redirect($url);
	}

	function logout_user()
	{
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	}
}