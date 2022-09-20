<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model('admin/company/Dashboard_model', 'dashboard');
		$this->load->model('share/Theme_model', 'theme');

		$dashboard['theme'] = $this->theme->getTheme($session);
		$dashboard['aktif'] = $this->dashboard->getAktif($session);
		$dashboard['inaktif'] = $this->dashboard->getInaktif($session);
		$dashboard['apply'] = $this->dashboard->getApply($session);
		$dashboard['process'] = $this->dashboard->getProcess($session);
		$dashboard['send'] = $this->dashboard->getSend($session);
		$dashboard['review'] = $this->dashboard->getReview($session);
		$dashboard['accept'] = $this->dashboard->getAccept($session);
		$dashboard['reject'] = $this->dashboard->getReject($session);
		$dashboard['chart'] = $this->dashboard->getAreaChart($session);

		$this->load->view('template/company_header_sidebar', $dashboard);
		$this->load->view('admin/company/dashboard', $dashboard);
		$this->load->view('template/admin_footer');
	}
}