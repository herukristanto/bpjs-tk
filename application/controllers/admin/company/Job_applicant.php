<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_applicant extends CI_Controller
{
  function __construct() {
    parent::__construct();
    if($this->session->userdata('access') != 2) {
      $url=base_url('user/rekrut');
      redirect($url);
    };
  }

  public function index() {
    $session['data'] = $_SESSION;

    $this->load->model('admin/company/Job_applicant_model', 'Job_applicant');
    $this->load->model('share/Theme_model', 'theme');

		$dashboard['theme'] = $this->theme->getTheme($session);
    $data['job_applicant'] = $this->Job_applicant->getApplicant($session);

    $this->load->view('template/company_header_sidebar', $dashboard);
    $this->load->view('admin/company/job_applicant', $data);
    $this->load->view('template/admin_footer');
  }
}