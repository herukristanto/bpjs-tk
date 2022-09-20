<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->userdata('access') != 2) {
			$url=base_url('user/rekrut');
			redirect($url);
		};
	}

	public function index()
	{
		$session['data'] = $_SESSION;
		$this->load->model('share/Theme_model', 'theme');

		$dashboard['theme'] = $this->theme->getTheme($session);

		$this->load->view('template/company_header_sidebar', $dashboard);
		$this->load->view('admin/theme');
		$this->load->view('template/admin_footer');
	}

	public function change()
	{
		$id = $this->session->userdata('id');
		$data = $this->input->post();

		$this->load->model('share/Theme_model', 'theme');
		$this->theme->getUpdate($id, $data);

		$this->session->set_flashdata('msg', 'success');
		redirect('admin/company/dashboard');
	}
}