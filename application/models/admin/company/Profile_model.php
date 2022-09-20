<?php
class Profile_model extends CI_Model
{
  public function getProfile($data)
  {
    $idCompany = $data['data']['id'];

    $query = "SELECT * FROM company WHERE id_account = $idCompany";
    $result = $this->db->query($query)->result();

    return $result;
  }

  public function post_profile($data)
  {
    $id = $data['id_account'];

    $this->db->trans_start();
    $this->db->where('id_account', $id);
    $this->db->update('company', $data);

    if ($this->db->trans_status() === TRUE) {
      $this->db->trans_complete();
      return true;
    } else {
      $this->db->trans_complete();
      return false;
    }
  }

  public function get_site($data)
  {
    $this->db->trans_start();

    $result = $this->db->get_where('company', ['id_account' => $data])->row_array();
    $this->db->trans_complete();

    return $result;
  }
}
