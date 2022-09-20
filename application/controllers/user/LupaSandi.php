<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LupaSandi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation', 'encryption']);
		$this->load->model('auth/Changepass_model', 'Changepass');
	}

	public function index()
	{
		$this->load->view('template/auth_user_header');
		$this->load->view('user/LupaSandi');
		$this->load->view('template/auth_user_footer');
	}

	public function forgotPassword()
	{
		$this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold"><small>', '</small></div>');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/auth_user_header');
			$this->load->view('user/LupaSandi');
			$this->load->view('template/auth_user_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->Changepass->getUserByEmailnStatus($email);
			// $user = $this->db->get_where('user_account', ['email' => $email, 'status' => 1])->row_array();

			if ($user) {
				$token = md5(uniqid(rand(), true));

				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->Changepass->insertToken($user_token);
				// $this->db->insert('user_token', $user_token);
				$this->_sendForgotEmail($token);

				$this->session->set_flashdata('forgot', 'success');
				redirect('user/login');
			} else {
				$this->session->set_flashdata('forgot', 'danger');
				redirect('user/lupasandi');
			}
		}
	}

	private function _sendForgotEmail($token)
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
		
		$this->email->subject('Reset Password');
		$this->email->message(''. $this->load->view('template/forgot_mail', $dataInMail, true) .'');

		if($this->email->send()) {
			return true;
		} else {
			echo $this->session->set_flashdata('send', 'mail');
			die;
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->Changepass->getUserByEmail($email);
		
		if ($user) {
			$user_token = $this->Changepass->getUserByToken($token);

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('reset', 'danger');
				redirect('user/lupasandi');
			}
		} else {
			$this->session->set_flashdata('reset', 'danger');
			redirect('user/lupasandi');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('user/login');
		}

		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = $this->input->post('chk-activation');
		$response = $this->input->post('g-recaptcha-response');

		$request = file_get_contents($url. '?secret=' . $secret . '&response=' . $response);
	
		$result = json_decode($request, true);

		$this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold"><small>', '</small></div>');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/auth_user_header');
			$this->load->view('user/GantiSandi');
			$this->load->view('template/auth_user_footer');
		} else {
			if ($result['success']) {
				$password = md5($this->input->post('password1'));
				$email = $this->session->userdata('reset_email');
				
				$update = $this->Changepass->updatePassword($email, $password);
				
				if ($update) {
					$this->session->unset_userdata('reset_email');

					$this->session->set_flashdata('reset', 'success');
					redirect('user/login');
				} else {
					redirect('user/lupasandi');
				}
			} else {
				$this->session->set_flashdata('msg', 'danger');
				redirect('user/lupasandi/changePassword');
			}
		}
	}
}