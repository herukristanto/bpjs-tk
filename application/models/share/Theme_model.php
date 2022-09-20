<?php

class Theme_model extends CI_Model 
{
  public function getTheme($data)
  {
    $this->db->trans_start();

    $id = $data['data']['id'];
    $gradient = $this->db->get_where('theme', ['id_account' => $id])->row_array();

    $this->db->trans_complete();

    return $gradient;
  }

  public function getUpdate($id, $data)
  {
    $this->db->trans_start();

    $this->db->set('gradient', $data['bg-gradient']);
    $this->db->where('id_account', $id);
    $this->db->update('theme');

    if($this->db->trans_status() === TRUE) {
      $this->db->trans_complete();
    } else {
      $this->db->trans_rollback();
    }
  }
}