<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		if ($this->session->userdata('access') != '2') {
			$url = base_url('auth/login');
			redirect($url);
		};

		$this->load->model('share/Wilayah_model', 'wilayah');
		$this->load->model('admin/company/Profile_model', 'profile');
		$this->load->model('share/Theme_model', 'theme');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	public function index()
	{
		$session['data'] = $_SESSION;

		$id_user = $this->session->userdata('id');
		$dashboard['theme'] = $this->theme->getTheme($session);
		$data['provinsi'] = $this->wilayah->provinsi();
		$data['company'] = $this->profile->get_site($id_user);
		$data['get_provinsi'] = $this->wilayah->get_provinsi($id_user);

		$this->load->view('template/company_header_sidebar', $dashboard);
		$this->load->view('admin/company/profile', $data);
		$this->load->view('template/admin_footer');
	}

	public function kota()
	{
		$data = $this->input->post('id_provinces');
		$res = $this->wilayah->kota($data);
		echo json_encode($res);
	}

	public function kec()
	{
		$data = $this->input->post('id_regency');
		$res = $this->wilayah->kec($data);
		echo json_encode($res);
	}

	public function save()
	{
		$insert = [
			'id_account' => $this->session->userdata('id'),
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'address' => $this->input->post('provinsi'),
			'detail_address' => $this->input->post('detail_address'),
			'website' => $this->input->post('website')
		];

		$return = $this->profile->post_profile($insert);

		if ($return) {
			$this->session->set_flashdata('msg', 'success');
			redirect('admin/company/profile');
		} else {
			$this->session->set_flashdata('msg', 'error');
			redirect('admin/company/profile');
		}

		// $config['upload_path'] 		= './assets/admin/img/company';
		// $config['allowed_types'] 	= 'jpg|png|jpeg';
		// $config['max_size']     	= 1024 * 2;
		// $config['overwrite'] 			= true;
		// $config['file_name']      = $id_user;

		// $this->upload->initialize($config);
		// $id_user = $this->session->userdata('id');

		// if ($this->upload->do_upload('image')) {
		// 	$img_footer = $this->upload->data();
		// 	$image = 'img-'.time();
		// } else {
		// 	$image = $this->input->post('image');
		// }

		// if ($this->upload->do_upload('logo')) {
		// 	$img_big = $this->upload->data();
		// 	$logo = 'logo-'.time();
		// } else {
		// 	$logo = $this->input->post('logo');
		// }


		// if(!empty($_FILES['image']['name']) && !empty($_FILES['logo']['name'])) {
		// 	if ($_FILES['image']['size'] >= 1024 * 2 || $_FILES['logo']['size'] >= 1024 * 2) {
		// 		if(!empty($this->input->post('image')) && !empty($this->input->post('logo')))

		// 			$pathImage = './assets/admin/img/company'.$this->input->post('logo');
		// 			unlink($pathImage);

		// 			$pathLogo = './assets/admin/img/company'.$this->input->post('image');
		// 			unlink($pathLogo);

		// 			$insert = [
		// 				'name' => $this->input->post('name'),
		// 				'id_account' => $id_user,
		// 				'description' => $this->input->post('description'),
		// 				'address' => $this->input->post('provinsi'),
		// 				'detail_address' => $this->input->post('detail_address'),
		// 				'website' => $this->input->post('website'),
		// 				'image' => $image,
		// 				'logo' => $logo
		// 			];

		// 			$this->profile->post_profile($insert);

		// 			$this->session->set_flashdata('msg', 'success');
		// 			redirect('admin/company/profile');
		// 	} else {
		// 		$this->session->set_flashdata('file', 'danger');
		// 		redirect('admin/company/profile');
		// 	}
		// } elseif(!empty($_FILES['image']['name']) && empty($_FILES['logo']['name'])) {
		// 	if ($_FILES['image']['size'] >= 1024 * 2) {

		// 		$path = './assets/admin/img/company'.$this->input->post('image');
		// 		unlink($path);

		// 		$insert = [
		// 			'name' => $this->input->post('name'),
		// 			'id_account' => $id_user,
		// 			'description' => $this->input->post('description'),
		// 			'address' => $this->input->post('provinsi'),
		// 			'detail_address' => $this->input->post('detail_address'),
		// 			'website' => $this->input->post('website'),
		// 			'logo' => $this->input->post('logo'),
		// 			'image' => $image
		// 		];

		// 		$this->profile->post_profile($insert);

		// 		$this->session->set_flashdata('msg', 'success');
		// 		redirect('admin/company/profile');
		// 	} else {
		// 		$this->session->set_flashdata('file', 'danger');
		// 		redirect('admin/company/profile');
		// 	}

		// } elseif(empty($_FILES['image']['name']) && !empty($_FILES['logo']['name'])) {
		// 	if ($_FILES['logo']['size'] >= 1024 * 2) {
		// 		if ($this->input->post('image'))
		// 			$path = './assets/admin/img/company'.$this->input->post('logo');
		// 			unlink($path);

		// 			$insert = [
		// 				'name' => $this->input->post('name'),
		// 				'id_account' => $id_user,
		// 				'description' => $this->input->post('description'),
		// 				'address' => $this->input->post('provinsi'),
		// 				'detail_address' => $this->input->post('detail_address'),
		// 				'website' => $this->input->post('website'),
		// 				'image' => $this->input->post('image'),
		// 				'logo' => $logo
		// 			];
		// 			$this->profile->post_profile($insert);
		// 			$this->session->set_flashdata('msg', 'success');
		// 			redirect('admin/company/profile');
		// 	} else {
		// 		$this->session->set_flashdata('file', 'danger');
		// 		redirect('admin/company/profile');
		// 	}
		// } else {
		// 	if ($_FILES['image']['size'] >= 1024 * 2 || $_FILES['logo']['size'] >= 1024 * 2) {
		// 		$insert = [
		// 			'name' => $this->input->post('name'),
		// 			'id_account' => $id_user,
		// 			'description' => $this->input->post('description'),
		// 			'address' => $this->input->post('provinsi'),
		// 			'detail_address' => $this->input->post('detail_address'),
		// 			'website' => $this->input->post('website'),
		// 			'logo' => $this->input->post('logo'),
		// 			'image' => $this->input->post('image')
		// 		];

		// 		$this->profile->post_profile($insert);
		// 		echo $this->session->set_flashdata('msg', 'success');
		// 		redirect('admin/company/profile');
		// 	} else {
		// 		$this->session->set_flashdata('file', 'danger');
		// 		redirect('admin/company/profile');
		// 	}
		// }
	}

	public function image()
	{
		$config['upload_path']          = './assets/admin/img/company';
		$config['allowed_types']        = 'png|jpg|jpeg';
		$config['overwrite']            = true;
		$config['max_size']             = 1048;
		$config['file_name']            = 'img_' . time();

		$this->upload->initialize($config);

		if ($_FILES['image']['error'] == 0) {
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();

				$this->session->set_flashdata('file', 'error');
				redirect('admin/company/profile');
			} else {
				$path = realpath(APPPATH . '../assets/admin/img/company') . '/' . $this->input->post('image');

				if (file_exists($path)) {
					chmod($path, 0777);
					unlink($path);

					$data = $this->upload->data();

					$upload = [
						'id_account' => $this->session->userdata('id'),
						'image' => $data['file_name']
					];

					$return = $this->profile->post_profile($upload);

					if ($return) {
						$this->session->set_flashdata('file', 'success');
						redirect('admin/company/profile');
					} else {
						$this->session->set_flashdata('file', 'error');
						redirect('admin/company/profile');
					}
				} else {
					$this->session->set_flashdata('file', 'error');
					redirect('admin/company/profile');
				}
			}
		} else {
			$upload = [
				'id_account' => $this->session->userdata('id'),
				'image' => $this->input->post('image')
			];

			$return = $this->profile->post_profile($upload);

			if ($return) {
				$this->session->set_flashdata('file', 'success');
				redirect('admin/company/profile');
			} else {
				$this->session->set_flashdata('file', 'error');
				redirect('admin/company/profile');
			}
		}
	}

	public function logo()
	{
		$config['upload_path']          = './assets/admin/img/company';
		$config['allowed_types']        = 'png|jpg|jpeg';
		$config['overwrite']            = true;
		$config['max_size']             = 1048;
		$config['file_name']            = 'logo_' . time();

		$this->upload->initialize($config);

		if ($_FILES['logo']['error'] == 0) {
			if (!$this->upload->do_upload('logo')) {
				$this->upload->display_errors();

				$this->session->set_flashdata('file', 'error');
				redirect('admin/company/profile');
			} else {
				$path = realpath(APPPATH . '../assets/admin/img/company') . '/' . $this->input->post('logo');

				if (file_exists($path)) {
					chmod($path, 0777);
					unlink($path);

					$data = $this->upload->data();

					$upload = [
						'id_account' => $this->session->userdata('id'),
						'logo' => $data['file_name']
					];

					$return = $this->profile->post_profile($upload);

					if ($return) {
						$this->session->set_flashdata('file', 'success');
						redirect('admin/company/profile');
					} else {
						$this->session->set_flashdata('file', 'error');
						redirect('admin/company/profile');
					}
				} else {
					$this->session->set_flashdata('file', 'error');
					redirect('admin/company/profile');
				}
			}
		} else {
			$upload = [
				'id_account' => $this->session->userdata('id'),
				'logo' => $this->input->post('logo')
			];

			$return = $this->profile->post_profile($upload);

			if ($return) {
				$this->session->set_flashdata('file', 'success');
				redirect('admin/company/profile');
			} else {
				$this->session->set_flashdata('file', 'error');
				redirect('admin/company/profile');
			}
		}
	}
}
