<?php

class Dashboard_model extends CI_Model 
{
  public function getAktif($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();

    if ($this->db->trans_status() === TRUE) {
      if($idCompany) {
        $this->db->where('id_company', $idCompany['id']);
        $this->db->where('status', 1);
        $query = $this->db->count_all_results('job');
        $this->db->trans_complete();
  
        return $query;
      } else {
        return 0;
      }
    } else {
      $this->db->trans_complete();
    }
  }

  public function getInaktif($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();

    if ($this->db->trans_status() === TRUE) {
      if($idCompany) {
        $this->db->where('id_company', $idCompany['id']);
        $this->db->where('status', 2);
        $query = $this->db->count_all_results('job');
        $this->db->trans_complete();
  
        return $query;
      } else {
        return 0;
      }
    } else {
      $this->db->trans_complete();
    }
  }

  public function getApply($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();

    if ($this->db->trans_status() === TRUE) {
      if($idCompany) {
        $idJob = $this->db->get_where('job', ['id_company' => $idCompany['id']])->row_array();

        if($this->db->trans_status() === TRUE) {
          if($idJob) {
            $id = $idJob['id_company'];
            
            $query = "select count(a.id) jml
              from 	apply a 
                left join job j on j.id = a.id_job 
              where j.id_company = $id
            ";

            $query = $this->db->query($query)->row_array();
            $this->db->trans_complete();
      
            return $query;
          } else {
            return 0;
          }
        } else {
          $this->db->trans_complete();
        }
      } else {
        return 0;
      }
    } else {
      $this->db->trans_complete();
    }
  }

  public function getProcess($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();

    if ($this->db->trans_status() === TRUE) {
      $idJob = $this->db->get_where('job', ['id_company' => $idCompany['id'], 'status' => 1])->row_array();

      if($idJob) {
        $id = $idJob['id_company'];

        $query ="select count(a.id) jml
          from 	apply a 
            left join job j on j.id = a.id_job 
          where a.status = 1 and j.id_company = $id
        ";

        $query = $this->db->query($query)->row_array();

        $this->db->trans_complete();

        return $query;
      } else {
        return 0;
      }
    } else {
      $this->db->trans_complete();
    }
  }

  public function getSend($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();

    if($idCompany['id'] != '') {
      $idJob = $this->db->get_where('job', ['id_company' => $idCompany['id'], 'status' => 1])->row_array();

      if($this->db->trans_status() === TRUE) {
        if($idJob) {
          $id = $idJob['id_company'];

          $query ="select count(a.id) jml
            from 	apply a 
              left join job j on j.id = a.id_job 
            where a.status = 1 and j.id_company = $id
          ";

          $send = $this->db->query($query)->row_array();
          $this->db->trans_complete();

          if ($send['jml'] >= 0) {
            return $send['jml'];
          } else {
            return 0;
          }
        } else {
          return 0;
        }
      } else {
        $this->db->trans_complete();
      }
    } else {
      return 0;
    }
  } 

  public function getReview($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();

    if($idCompany['id'] != '') {
      $idJob = $this->db->get_where('job', ['id_company' => $idCompany['id'], 'status' => 1])->row_array();
      
      if($this->db->trans_status() === TRUE) {
        if($idJob) {
          $id = $idJob['id_company'];

          $query ="select count(a.id) jml
            from 	apply a 
              left join job j on j.id = a.id_job 
            where a.status = 2 and j.id_company = $id
          ";

          $send = $this->db->query($query)->row_array();
          $this->db->trans_complete();

          if ($send['jml'] >= 0) {
            return $send['jml'];
          } else {
            return 0;
          }
        } else {
          return 0;
        }
      } else {
        $this->db->trans_complete();
      }
    } else {
      return 0;
    }
  } 

  public function getAccept($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();

    if($idCompany['id'] != '') {
      $idJob = $this->db->get_where('job', ['id_company' => $idCompany['id'], 'status' => 1])->row_array();
      
      if($this->db->trans_status() === TRUE) {
        if($idJob) {
          $id = $idJob['id_company'];

          $query ="select count(a.id) jml
            from 	apply a 
              left join job j on j.id = a.id_job 
            where a.status = 3 and j.id_company = $id
          ";

          $send = $this->db->query($query)->row_array();
          $this->db->trans_complete();

          if ($send['jml'] >= 0) {
            return $send['jml'];
          } else {
            return 0;
          }
        } else {
          return 0;
        }
      } else {
        $this->db->trans_complete();
      }
    } else {
      return 0;
    }
  } 

  public function getReject($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();

    if($idCompany['id'] != '') {
      $idJob = $this->db->get_where('job', ['id_company' => $idCompany['id'], 'status' => 1])->row_array();
      
      if($this->db->trans_status() === TRUE) {
        if($idJob) {
          $id = $idJob['id_company'];

          $query ="select count(a.id) jml
            from 	apply a 
              left join job j on j.id = a.id_job 
            where a.status = 4 and j.id_company = $id
          ";

          $send = $this->db->query($query)->row_array();
          $this->db->trans_complete();

          if ($send['jml'] >= 0) {
            return $send['jml'];
          } else {
            return 0;
          }
        } else {
          return 0;
        }
      } else {
        $this->db->trans_complete();
      }
    } else {
      return 0;
    }
  } 

  public function getAreaChart($data)
  {
    $this->db->trans_start();
    $id = $data['data']['id'];

    $idCompany = $this->db->get_where('company', ['id_account' => $id])->row_array();
    if($idCompany['id'] != '') {
      $idJob = $this->db->get_where('job', ['id_company' => $idCompany['id'], 'status' => 1])->row_array();
      if($idJob) {
        $id = $idJob['id_company'];

        $query = $this->db->query("
          select count(a.id_job) total, j.title title, p.name name  
          from apply a 
            left join job j on j.id = a.id_job
            left join provinces p on p.id = j.id_provinces 
          where j.id_company = $id
          group by j.title, p.name
        ");
          
        if($query->num_rows() > 0){
          foreach($query->result() as $data){
              $hasil[] = $data;
          }

          $this->db->trans_complete();
          return $hasil;
        } else {
          $this->db->trans_complete();
          return false;
        }
      } else {
        $this->db->trans_complete();
        return false;
      }
    } else {
      $this->db->trans_complete();
      return false;
    }
  }
}