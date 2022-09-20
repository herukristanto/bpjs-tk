<?php

class Category_model extends CI_Model 
{
  public function getCategory() 
  {
    $query = "SELECT * FROM job_category";
    $res = $this->db->query($query)->result();
    return $res;
  }
}