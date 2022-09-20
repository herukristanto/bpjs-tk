<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  public function __construct()
	{
			parent::__construct();

			$this->load->library(['form_validation', 'encryption']);
			$this->load->model('auth/Register_model', 'register');
	}

	public function index() {
		if($this->session->userdata('access') != '3'){
			$header['is_login'] = false;
		} else {
			$header['is_login'] = true;
		}

		$this->load->view('template/auth_user_header', $header);
		$this->load->view('user/Register');
		$this->load->view('template/auth_user_footer');
	}

	public function verify()
	{
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = $this->input->post('chk-activation-regis');
		$response = $this->input->post('g-recaptcha-response');

		$request = file_get_contents($url. '?secret=' . $secret . '&response=' . $response);
	
		$result = json_decode($request, true);

		$this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold"><small>', '</small></div>');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[16]|is_unique[user_account.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[10]');

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			if ($result['success'] == true) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
	
				$password = md5($password);
	
				$user_data = array(
					'email' => $email,
					'username' => $username,
					'password' => $password,
					'id_role' => 3,
					'status' => 0
				);

				$token = md5(uniqid(rand(), true));
				
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$user = $this->register->register_user($user_data);

				if ($user) {
					$this->register->get_id_account_user($username);
					
					$this->register->get_token($user_token);
					$this->_sendVerifEmail($token);

					echo $this->session->set_flashdata('msg', 'success');
					redirect('user/login');
				}

			} else {
				echo $this->session->set_flashdata('msg', 'danger');
				redirect('user/register');
			}
		}
	}

	private function _sendVerifEmail($token)
	{
		$dataInMail = [
			'email' => $this->input->post('email'),
			'token' => urlencode($token),
			'date_created' => time()
		];

		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => HOST,
			'smtp_user' => EMAIL,
			'smtp_pass' => PASSWORD,
			'smtp_port' => PORT,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->initialize($config);
		$this->email->from(EMAIL, 'Admin learnSoft Developer');
		$this->email->to($this->input->post('email'));

		$this->email->subject('Account Verifikasi');
		$this->email->message(''. $this->load->view('template/send_mail', $dataInMail, true) .'');

		if($this->email->send()) {
			return true;
		} else {
			echo $this->session->set_flashdata('send', 'mail');
			die;
		}
	}

	public function verifyAccount()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->register->get_user_by_email($email);

		if ($user) {
			$user_token = $this->register->get_token_by_email($token);

			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

					$update = $this->register->update_user($email);

					if ($update) {
						$this->session->set_flashdata('verif', 'success');
						redirect('user/login');
					} else {
						redirect('user/register');
					}
					
				} else {
					$delete = $this->register->delete_user($email);

					if ($delete) {
						$this->session->set_flashdata('verif', 'timeout');
						redirect('user/register');
					} else {
						redirect('user/register');
					}
				}
			} else {
				$this->session->set_flashdata('verif', 'token');
				redirect('user/register');
			}
		} else {
			$this->session->set_flashdata('verif', 'email');
			redirect('user/register');
		}
	}
}