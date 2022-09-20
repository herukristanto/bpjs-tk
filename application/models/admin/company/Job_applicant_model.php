<?php

class Job_applicant_model extends CI_Model 
{
  public function getApplicant($data)
  {
    $id_company = $data['data']['id'];

    $sql = "select 	a.id id,
          up.name ,up.file_cv,
          j.*
      from 	apply a 
        left join job j on j.id = a.id 
        left join user_profile up on up.id = a.id_user
      where j.id_company = $id_company
    ";

    $result = $this->db->query($sql)->result();

    return $result;
  }

  public function update_jobs($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->replace('job', $data);
  }
}