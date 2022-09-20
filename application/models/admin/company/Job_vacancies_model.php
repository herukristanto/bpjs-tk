<?php
class Job_vacancies_model extends CI_Model
{
  public function getJobList($data)
  {
    $idAccount = $data['data']['id'];

    $sql = "SELECT * FROM company WHERE id_account = $idAccount";

    $result = $this->db->query($sql)->row();

    if (!empty($result)) {
      $idCompany = $result->id;

      $sql = "
        select
          j.id ,
          c.name company_name,
          t.name type_name,
          p.name location_name,
          j.id_disability,
          j.title title_name ,
          j.description ,
          j.date_in ,
          j.date_close ,
          j.status
        from
            job j
          left join company c on
            c.id = j.id_company
          left join type t on
            t.id = j.id_type
          left join cryteria_disability cd on
            cd.id = j.id_disability
          left join provinces p on
            p.id  = j.id_provinces 
        where j.id_company = $idCompany
        order by j.created_at desc
      ";

      $result = $this->db->query($sql)->result();
    }

    return $result;
  }

  public function getJobView($id)
  {
    $sql = "
      select
        j.id ,
        c.name company_name,
        t.name type_name,
        cd.name cryteria_name,
        p.name location_name,
        jc.name category_name,
        j.id_disability,
        j.slug slug,
        j.title title_name ,
        j.benefit,
        j.requirement,
        j.short_desc,
        j.description ,
        j.image,
        j.date_in ,
        j.date_close
      from
          job j
        left join company c on
          c.id = j.id_company
        left join type t on
          t.id = j.id_type
        left join cryteria_disability cd on
          cd.id = j.id_disability
        left join provinces p on
          p.id  = j.id_provinces 
        left join job_category jc on 
          jc.id = j.id_category  
      where j.id = $id
    ";

    $result = $this->db->query($sql)->result();

    return $result;
  }

  public function getJobEdit($id)
  {
    $sql = "
      select j.*, p.name, jc.name category_name, t.name type_name
      from job j 
        left join provinces p on
          p.id  = j.id_provinces
        left join job_category jc on 
          jc.id = j.id_category
        left join type t on
          t.id = j.id_type
      where j.id = $id
    ";

    $result = $this->db->query($sql)->result();

    return $result;
  }

  public function post_jobs($data)
  {
    $this->db->trans_start();

    $this->db->insert('job', $data);

    if ($this->db->trans_status() === TRUE) {
      $this->db->trans_complete();
    } else {
      $this->db->trans_rollback();
    }
  }

  public function update_jobs($data, $id)
  {
    $this->db->trans_start();

    $this->db->where('id', $id);
    $this->db->update('job', $data);

    if ($this->db->trans_status() === TRUE) {
      $this->db->trans_complete();
    } else {
      $this->db->trans_rollback();
    }
  }

  public function stop_jobs($id)
  {
    $this->db->trans_start();

    $this->db->set('status', 2);
    // $this->db->set('date_close', date('Y-m-d'));
    $this->db->where('id', $id);
    $this->db->update('job');

    if ($this->db->trans_status() === TRUE) {
      $this->db->trans_complete();
    } else {
      $this->db->trans_rollback();
    }
  }

  public function open_jobs($id)
  {
    $this->db->trans_start();

    $this->db->set('status', 1);
    // $this->db->set('date_close', date('Y-m-d'));
    $this->db->where('id', $id);
    $this->db->update('job');

    if ($this->db->trans_status() === TRUE) {
      $this->db->trans_complete();
    } else {
      $this->db->trans_rollback();
    }
  }
}
