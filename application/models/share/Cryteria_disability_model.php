<?php

class Cryteria_disability_model extends CI_Model 
{
  public function getCryteriaDisability() 
  {
    $query = "SELECT * FROM cryteria_disability";
    $res = $this->db->query($query)->result();
    return $res;
  }
}