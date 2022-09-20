<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('User_profile_model','profile');
        $this->load->model('Job_model','job');
	}

	public function index()
	{
        $this->load->model('share/Cryteria_disability_model', 'Cryteria_disability');
        if($this->session->userdata('access') != '3'){
                $header['is_login'] = false;
                $data['login'] = false;
        }else{
            $id_user = $this->session->userdata('id');
            $header['is_login'] = true;
            $header['login'] = $this->profile->getName($id_user);
            $data['login'] = $this->profile->getName($id_user);
        }
        if(isset($id_user)){
            $id_user; 
        }else{
            redirect('user/Login');
        }

        $data['UserProfile'] = $this->job->UserProfile($id_user);
        $data['cryteria_disability'] = $this->Cryteria_disability->getCryteriaDisability();
        
        $this->load->view('template/user_header', $header);
        $this->load->view('user/Profile',$data);
        $this->load->view('template/user_footer');
    }

    public function avatar_upload()
    {
        if($this->session->userdata('access') != '3'){
            $header['is_login'] = false;
            $data['login'] = false;
        }else{
            $id_user = $this->session->userdata('id');
            $header['is_login'] = true;
            $header['login'] = $this->profile->getName($id_user);
            $data['login'] = $this->profile->getName($id_user);
        }

		$config['upload_path']          = 'assets/uploads/avatar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $id_user;
		$config['overwrite']            = true;
		$config['max_size']             = 2048; 
        $config['max_width']            = 1080;
		$config['max_height']           = 1080;

        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
            $result = [
                'status' => false,
                'massage' => $this->upload->display_errors(),
            ];
            echo json_encode($result);
		} else {
			$uploaded_data = $this->upload->data();
			$new_data = [
				'avatar' => $uploaded_data['file_name'],
			];

            $where = array(
                'id_account' => $id_user,
            );

            if ($this->profile->update($where, $new_data, 'user_profile') == 200) {
                $result = [
                    'status' => true,
                    'massage' => 'Success uploaded!',
                ];
                echo json_encode($result);
            } else {
                $result = [
                    'status' => false,
                    'massage' => $this->upload->display_errors(),
                ];
                echo json_encode($result);
            }
            
		}
        
    }

    public function cv_upload()
    {
        if($this->session->userdata('access') != '3'){
            $header['is_login'] = false;
            $data['login'] = false;
        }else{
            $id_user = $this->session->userdata('id');
            $header['is_login'] = true;
            $header['login'] = $this->profile->getName($id_user);
            $data['login'] = $this->profile->getName($id_user);
        }

		$config['upload_path']          = 'assets/uploads/cv/';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $id_user;
		$config['overwrite']            = true;
		$config['max_size']             = 2048; 

        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('upload-cv')) {
			$data['error'] = $this->upload->display_errors();
            echo $this->session->set_flashdata('msg', 'error');
            redirect('user/Profile');
		} else {
			$uploaded_data = $this->upload->data();
			$new_data = [
				'file_cv' => $uploaded_data['file_name'],
			];

            $where = array(
                'id_account' => $id_user,
            );
	
			if ($this->profile->update($where, $new_data, 'user_profile') == 200) {
				echo $this->session->set_flashdata('msg', 'success');
                redirect('user/Profile');
			} else {
                echo $this->session->set_flashdata('msg', 'error');
                redirect('user/Profile');
            }
		}
    }

    public function update()
    {
        if($this->session->userdata('access') != '3'){
            $header['is_login'] = false;
            $data['login'] = false;
        }else{
            $id_user = $this->session->userdata('id');
            $header['is_login'] = true;
            $header['login'] = $this->profile->getName($id_user);
            $data['login'] = $this->profile->getName($id_user);
        }

        $xcriteria[]=$this->input->post('id_disability');
		foreach($xcriteria as $tag){
			$id_disability = @implode(",", $tag);
		}

        $new_data = [
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'gender' => $this->input->post('gender'),
            'birthday' => $this->input->post('birthday'),
            'id_disability' => $id_disability,
            'address' => $this->input->post('address'),
            'handphone' => $this->input->post('phonenumber'),
        ];

        $where = array(
            'id_account' => $id_user,
        );

        $this->profile->update($where, $new_data, 'user_profile');
        echo $this->session->set_flashdata('msg', 'success');
		redirect('user/Profile');
    }

}

   
