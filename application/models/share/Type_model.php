<?php

class Type_model extends CI_Model 
{
  public function getType() 
  {
    $query = "SELECT * FROM type";
    $res = $this->db->query($query)->result();
    return $res;
  }
}