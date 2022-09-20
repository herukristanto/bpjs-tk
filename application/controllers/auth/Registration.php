<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library(['form_validation', 'encryption']);
		$this->load->model('auth/Register_model', 'register');

		error_reporting(0);
		if ($this->session->userdata('access') != '1') {
			$url = base_url('auth/login');
			redirect($url);
		};
	}

	public function index()
	{
		$this->load->view('template/admin_header_sidebar');
		$this->load->view('auth/registration');
		$this->load->view('template/admin_footer');
	}

	public function verify()
	{
		$this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold"><small>', '</small></div>');

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[16]|is_unique[user_account.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[10]');

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$password = md5($password);

			$user_data = array(
				'email' => $email,
				'username' => $username,
				'password' => $password,
				'id_role' => 2,
				'status' => 1
			);

			$user = $this->register->register_user($user_data);

			if ($user) {
				$this->register->get_id_account($username);

				$this->session->set_flashdata('msg', 'success');
				redirect('auth/registration');
			}
		}
	}
}
