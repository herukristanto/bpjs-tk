<?php
class User_profile_model extends CI_Model{

    function getName($data){
      $sql = "SELECT * FROM user_account WHERE id = $data";
      $result = $this->db->query($sql)->result();
      return $result;
    }

    function update($where,$data,$table){		
      $this->db->where($where);
		  $this->db->update($table,$data);

      if($this->db->trans_status() === TRUE) {
        return 200;
      } else {
        return 201;
      }
      
    }
}