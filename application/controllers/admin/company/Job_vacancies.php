<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_vacancies extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('access') != 2) {
			$url = base_url('user/rekrut');
			redirect($url);
		};

		$this->load->model('share/Category_model', 'Category');
		$this->load->model('share/Type_model', 'Type');
		$this->load->model('share/Cryteria_disability_model', 'Cryteria_disability');
		$this->load->model('share/Wilayah_model', 'Wilayah');
		$this->load->model('share/Theme_model', 'theme');
		$this->load->model('admin/company/Job_vacancies_model', 'Job_vacancies');
		$this->load->model('admin/company/Profile_model', 'Profile');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	public function index()
	{
		$session['data'] = $_SESSION;

		$dashboard['theme'] = $this->theme->getTheme($session);
		$data['profile'] = $this->Profile->getProfile($session);
		$data['category'] = $this->Category->getCategory();
		$data['type'] = $this->Type->getType();
		$data['cryteria_disability'] = $this->Cryteria_disability->getCryteriaDisability();
		$data['wilayah'] = $this->Wilayah->provinsi();

		$this->load->view('template/company_header_sidebar', $dashboard);
		$this->load->view('admin/company/job_vacancies', $data);
		$this->load->view('template/admin_footer');
	}

	public function save()
	{
		$preslug  = strip_tags(htmlspecialchars($this->input->post('slug', TRUE), ENT_QUOTES));
		$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
		$trim     = trim($string);
		$praslug  = strtolower(str_replace(" ", "-", $trim));
		$query = $this->db->get_where('job', array('slug' => $praslug));

		if ($query->num_rows() > 0) {
			$uniqe_string = rand();
			$slug = $praslug . '-' . $uniqe_string;
		} else {
			$slug = $praslug;
		}

		$xcriteria[] = $this->input->post('id_disability');
		foreach ($xcriteria as $tag) {
			$id_disability = @implode(",", $tag);
		}

		$config['upload_path'] 					= './assets/admin/img/job';
		$config['allowed_types'] 				= 'png|jpg|jpeg';
		$config['file_name']      			= 'job_' . time();
		$config['overwrite']            = true;
		$config['max_size']             = 1048;

		$this->upload->initialize($config);

		if ($_FILES['image']['error'] == 0) {
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();

				$this->session->set_flashdata('file', 'error');
				redirect('admin/company/job_vacancies');
			} else {
				$data = $this->upload->data();

				$insert = [
					'id_company' => $this->input->post('id_company'),
					'id_category' => $this->input->post('id_category'),
					'id_type' => $this->input->post('id_type'),
					'id_disability' => $id_disability,
					'id_provinces' => $this->input->post('id_provinces'),
					'title' => strip_tags(htmlspecialchars($this->input->post('title', TRUE), ENT_QUOTES)),
					'slug' => $slug,
					'short_desc' => htmlspecialchars($this->input->post('short_desc', TRUE), ENT_QUOTES),
					'description' => htmlspecialchars($this->input->post('description', TRUE), ENT_QUOTES),
					'benefit' => str_replace(".", "", $this->input->post('benefit')),
					'requirement' => htmlspecialchars($this->input->post('requirement', TRUE), ENT_QUOTES),
					'date_in' => $this->input->post('date_in'),
					'date_close' => $this->input->post('date_close'),
					'image' => $data['file_name']
				];

				$this->Job_vacancies->post_jobs($insert);

				$this->session->set_flashdata('msg', 'success');
				redirect('admin/company/job_vacancies/list');
			}
		}
	}

	public function list()
	{
		$session['data'] = $_SESSION;

		$dashboard['theme'] = $this->theme->getTheme($session);
		$jobList['data'] = $this->Job_vacancies->getJobList($session);

		$this->load->view('template/company_header_sidebar', $dashboard);
		$this->load->view('admin/company/job_vacancies_list', $jobList);
		$this->load->view('template/admin_footer');
	}

	public function view($id)
	{
		$session['data'] = $_SESSION;

		$dashboard['theme'] = $this->theme->getTheme($session);
		$jobView['data'] = $this->Job_vacancies->getJobView($id);

		$this->load->view('template/company_header_sidebar', $dashboard);
		$this->load->view('admin/company/job_vacancies_view', $jobView);
		$this->load->view('template/admin_footer');
	}

	public function edit($id)
	{
		$session['data'] = $_SESSION;

		$dashboard['theme'] = $this->theme->getTheme($session);
		$jobEdit['data'] = $this->Job_vacancies->getJobEdit($id);
		$jobEdit['category'] = $this->Category->getCategory();
		$jobEdit['type'] = $this->Type->getType();
		$jobEdit['cryteria_disability'] = $this->Cryteria_disability->getCryteriaDisability();
		$jobEdit['wilayah'] = $this->Wilayah->provinsi();

		$this->load->view('template/company_header_sidebar', $dashboard);
		$this->load->view('admin/company/job_vacancies_edit', $jobEdit);
		$this->load->view('template/admin_footer');
	}

	public function actionEdit()
	{
		$id = $this->input->post('id');

		$xcriteria[] = $this->input->post('id_disability');
		foreach ($xcriteria as $tag) {
			$id_disability = @implode(",", $tag);
		}

		$config['upload_path'] 					= './assets/admin/img/job';
		$config['allowed_types'] 				= 'png|jpg|jpeg';
		$config['file_name']      			= 'job_' . time();
		$config['overwrite']            = true;
		$config['max_size']             = 1048;

		$this->upload->initialize($config);

		if ($_FILES['image']['error'] == 0) {
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();

				$this->session->set_flashdata('file', 'error');
				redirect('admin/company/job_vacancies/list');
			} else {
				$path = realpath(APPPATH . '../assets/admin/img/job') . '/' . $this->input->post('image');

				if (file_exists($path)) {
					chmod($path, 0777);
					unlink($path);

					$data = $this->upload->data();

					$update = [
						'id_company' => $this->input->post('id_company'),
						'id_category' => $this->input->post('id_category'),
						'id_type' => $this->input->post('id_type'),
						'id_disability' => $id_disability,
						'id_provinces' => $this->input->post('id_provinces'),
						'title' => strip_tags(htmlspecialchars($this->input->post('title', TRUE), ENT_QUOTES)),
						'slug' => $this->input->post('slug'),
						'short_desc' => htmlspecialchars($this->input->post('short_desc', TRUE), ENT_QUOTES),
						'description' => htmlspecialchars($this->input->post('description', TRUE), ENT_QUOTES),
						'benefit' => str_replace(".", "", $this->input->post('benefit')),
						'requirement' => htmlspecialchars($this->input->post('requirement', TRUE), ENT_QUOTES),
						'date_in' => $this->input->post('date_in'),
						'date_close' => $this->input->post('date_close'),
						'image' => $data['file_name']
					];

					$this->Job_vacancies->update_jobs($update, $id);

					$this->session->set_flashdata('msg', 'success');
					redirect('admin/company/job_vacancies/list');
				} else {
					$this->session->set_flashdata('file', 'error');
					redirect('admin/company/job_vacancies/list');
				}
			}
		} else {
			$update = [
				'id_company' => $this->input->post('id_company'),
				'id_category' => $this->input->post('id_category'),
				'id_type' => $this->input->post('id_type'),
				'id_disability' => $id_disability,
				'id_provinces' => $this->input->post('id_provinces'),
				'title' => strip_tags(htmlspecialchars($this->input->post('title', TRUE), ENT_QUOTES)),
				'slug' => $this->input->post('slug'),
				'short_desc' => htmlspecialchars($this->input->post('short_desc', TRUE), ENT_QUOTES),
				'description' => htmlspecialchars($this->input->post('description', TRUE), ENT_QUOTES),
				'benefit' => str_replace(".", "", $this->input->post('benefit')),
				'requirement' => htmlspecialchars($this->input->post('requirement', TRUE), ENT_QUOTES),
				'date_in' => $this->input->post('date_in'),
				'date_close' => $this->input->post('date_close'),
				'image' => $this->input->post('image')
			];

			$this->Job_vacancies->update_jobs($update, $id);

			$this->session->set_flashdata('msg', 'success');
			redirect('admin/company/job_vacancies/list');
		}
	}

	public function stop($id)
	{
		$this->Job_vacancies->stop_jobs($id);

		$this->session->set_flashdata('msg', 'success');
		redirect('admin/company/job_vacancies/list');
	}

	public function open($id)
	{
		$this->Job_vacancies->open_jobs($id);

		$this->session->set_flashdata('msg', 'success');
		redirect('admin/company/job_vacancies/list');
	}
}
