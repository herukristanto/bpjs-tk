<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

    	$this->load->model('Job_model','job');
		$this->load->model('User_profile_model','profile');
		$this->load->library('upload');
		$this->load->helper('text');
	}
	
	public function index()
	{
		if ($this->session->userdata('access') != '3') {
			$header['is_login'] = false;
			$data['login'] = false;
    	} else {
			$id_user = $this->session->userdata('id');
			$header['is_login'] = true;
			$header['login'] = $this->profile->getName($id_user);
			$data['login'] = $this->profile->getName($id_user);
		}

		$title = $this->input->post('first_search');
		$location = $this->input->post('location');
		$categori = $this->input->post('categori');

		if (!empty($title) || !empty($location) || !empty($categori)) {
			$result= $this->job->searchJob($title, $location, $categori);
			$data['rekomJob'] = $this->job->rekomJob();
		} else {
			$result= $this->job->get_all_job();
			$data['rekomJob'] = $this->job->rekomJob();
		}

		$data['JobCategory'] = $this->job->JobCategory();

		$page=$this->uri->segment(3);

		if(!$page):
				$off = 0;
		else:
				$off = $page;
		endif;

		$limit=5;
		$offset = $off > 0 ? (($off - 1) * $limit) : $off;
		
		$config['base_url'] = base_url() . 'Jobs/page/';
		$config['total_rows'] = $result->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['use_page_numbers']=TRUE;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagination-page text-center"><nav aria-label="..."><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$config['first_link'] = '<';
		$config['last_link'] = '>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		
		$this->pagination->initialize($config);
		$data['page'] =$this->pagination->create_links();

		if (empty($this->uri->segment(3))) {
			$next_page=2;
			$header['canonical']=site_url('Jobs');
			$header['url_prev']="";
		} elseif($this->uri->segment(3)=='1') {
			$next_page=2;
			$header['canonical']=site_url('Jobs');
			$header['url_prev']=site_url('Jobs');
		} elseif($this->uri->segment(3)=='2') {
			$next_page=$this->uri->segment(3)+1;
			$header['canonical']=site_url('Jobs/page/'.$this->uri->segment(3));
			$header['url_prev']=site_url('Jobs');
		} else {
			$next_page=$this->uri->segment(3)+1;
			$prev_page=$this->uri->segment(3)-1;
			$header['canonical']=site_url('jobs/page/'.$this->uri->segment(3));
			$header['url_prev']=site_url('jobs/page/'.$prev_page);
		}
		
		$header['url_next']=site_url('jobs/page/'.$next_page);

		if (!empty($title) || !empty($location) || !empty($categori)) {
			$header['jobs']= $this->job->searchJobPerpage($title, $location, $categori, $limit, $offset);
			$header['rekomJob'] = $this->job->rekomJob();
		} else {
			$header['jobs']=$this->job->get_job_perpage($offset,$limit);
			$header['rekomJob'] = $this->job->rekomJob();
		}
				
		$header['save'] = $this->cart->contents();

		$this->load->view('template/user_header', $header);
		$this->load->view('user/JobHome', $data);
		$this->load->view('template/user_footer');
	}

	public function save_job()
	{
		$action = $this->input->get('action');

		switch ($action){
			case 'add_item' :
				$id = $this->input->post('id');
				$title = $this->input->post('title');
				$short_desc = $this->input->post('short_desc');
				$provinsi = $this->input->post('provinsi');

				$equal = [];
				$equal_res = [];

				foreach ($this->cart->contents() as $items) {
					if ($items['id'] !== $id) {
						$equal[] = $items['id'];
						continue;
					}else{
						$equal_res[] = $id;
						continue;
					}
				}
				if (!empty($equal_res)) {
					$response = array('code' => 401, 'message' => 'Job sudah tersimpan');
				} elseif (isset($id)) {
					$item = array(
						'id' => $id,
						'name' => $id,
						'price' => 1,
						'qty' => 1,
						'title' => $title,
						'short_desc' => $short_desc,
						'provinsi' => $provinsi
					);
					$this->cart->insert($item);
					$total_item = count($this->cart->contents());

					$response = array('code' => 200, 'message' => 'Job telah tersimpan', 'total_job' => $total_item);
				}

			break;
			case 'remove_job' :
					$rowid = $this->input->post('rowid');

					$this->cart->remove($rowid);
					
					$data['code'] = 204;
					$data['message'] = 'job dihapus ';

					$response = $data;
			break;
			case 'cart_info' :
					$total_item = count($this->cart->contents());
					$data['total_item'] = $total_item;

					$response['data'] = $data;
			break;
		}

		$response = json_encode($response);
		$this->output->set_content_type('application/json')
				->set_output($response);
	}

	public function JobSave()
	{

		if($this->session->userdata('access') != '3') {
			$header['is_login'] = false;
			$data['login'] = false;
		} else {
			$id_user = $this->session->userdata('id');
			$header['is_login'] = true;
			$header['login'] = $this->profile->getName($id_user);
			$data['login'] = $this->profile->getName($id_user);
		}
		$data['save'] = $this->cart->contents();
		$this->load->view('template/user_header', $header);
		$this->load->view('user/JobSave',$data);
		$this->load->view('template/user_footer');
	}

	public function View($slug)
	{
		if($this->session->userdata('access') != '3') {
			$header['is_login'] = false;
			$data['login'] = false;
		} else {
			$id_user = $this->session->userdata('id');
			$header['is_login'] = true;
			$header['login'] = $this->profile->getName($id_user);
			$data['login'] = $this->profile->getName($id_user);
		}
		$data['rekomJob'] = $this->job->rekomJob();
		$data['JobShow'] = $this->job->ShowJob($slug);
		$this->load->view('template/user_header', $header);
		$this->load->view('user/JobDetail', $data);
		$this->load->view('template/user_footer');
	}

	public function Apply()
	{
		if($this->session->userdata('access') != '3') {
			$header['is_login'] = false;
			$data['login'] = false;
		} else {
			$id_user = $this->session->userdata('id');
			$header['is_login'] = true;
			$data['login'] = $this->profile->getName($id_user);;
		}
		$JobStatus = '';
		if (isset($id_user)) {
			$id_job = $this->input->post('id');

			$res = $this->job->ApplyJob($id_user, $id_job);

			if ($res == null) {
				$data = array(
					'id_user' => $id_user,
					'id_job' => $id_job,
					'status' => 1,
					'created_at' => date('Y-m-d H:i:s')
				);
				$this->db->insert('apply',$data);
				$JobStatus = 1; 
			} else {
				$JobStatus = 2;
			}
		} else {
			$JobStatus = 3;
		}

		echo json_encode($JobStatus);
	}

	public function nosegment($slug)
	{
		redirect('Jobs');
	}
}
