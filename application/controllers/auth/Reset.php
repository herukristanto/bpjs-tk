<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reset extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		if ($this->session->userdata('access') != 2) {
			$url = base_url('user/rekrut');
			redirect($url);
		};
		$this->load->model('auth/Changepass_model', 'changepass_model');
		$this->load->model('share/Theme_model', 'theme');
		$this->load->helper('text');
	}

	public function index()
	{
		$session['data'] = $_SESSION;
		$dashboard['theme'] = $this->theme->getTheme($session);

		$this->load->view('template/company_header_sidebar', $dashboard);
		$this->load->view('auth/reset', $session);
		$this->load->view('template/admin_footer');
	}

	public function change()
	{
		$user_id = $this->session->userdata('id');
		if (!empty($user_id)) {
			$this->load->library(['form_validation', 'encryption']);

			$this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold"><small>', '</small></div>');
			$this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[8]|matches[conf_password]');
			$this->form_validation->set_rules('conf_password', 'Password', 'required|trim|min_length[8]|matches[new_password]');

			$old_password = htmlspecialchars($this->input->post('old_password', TRUE), ENT_QUOTES);
			$new_password = htmlspecialchars($this->input->post('new_password', TRUE), ENT_QUOTES);
			$conf_password = htmlspecialchars($this->input->post('conf_password', TRUE), ENT_QUOTES);

			$old_pass = md5($old_password);
			$new_pass = md5($new_password);
			$checking_old_password = $this->changepass_model->checking_old_password($user_id, $old_pass);
			if ($checking_old_password->num_rows() > 0) {
				if ($new_password == $conf_password) {
					$this->changepass_model->change_password($user_id, $new_pass);
					$this->session->set_flashdata('change', 'success');
					redirect('user/rekrut');
				} else {
					$this->session->set_flashdata('change', 'info');
					redirect('auth/reset');
				}
			} else {
				$this->session->set_flashdata('change', 'warning');
				redirect('auth/reset');
			}
		} else {
			$this->session->set_flashdata('change', 'danger');
			redirect('auth/reset');
		}
	}
}
