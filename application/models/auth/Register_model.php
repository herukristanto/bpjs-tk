<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function register_user($data)
  {
    $this->db->trans_start();

    $result = $this->db->insert('user_account', $data);
    $this->db->trans_complete();

    return $result;
  }

  public function register_customer($data)
  {
    $this->db->trans_start();

    $result = $this->db->insert('customers', $data);
    $this->db->trans_complete();
    
    return $result;
  }

  public function get_id_account($data)
  {
    $this->db->trans_start();

    $query = "SELECT id FROM user_account WHERE username = '$data'";
    $result = $this->db->query($query)->row_array();
    if ($result != 0) {
      $data_user = [
        'id_account' => $result['id']
      ];

      $this->db->insert('company', $data_user);

      if($this->db->trans_status() === TRUE){
        $this->db->insert('theme', $data_user);
        
        $this->db->trans_complete();
        return $this->db->insert_id();
      } else {
        $this->db->trans_rollback();
      }
    }
  }

  public function get_id_account_user($data)
  {
    $this->db->trans_start();

    $query = "SELECT id FROM user_account WHERE username = '$data'";
    $result = $this->db->query($query)->row_array();
    if ($result != 0) {
      $data_user = [
        'id_account' => $result['id']
      ];

      $this->db->insert('user_profile', $data_user);
      $this->db->trans_complete();

      return $this->db->insert_id();
    }
  }

  public function get_token($user_token)
  {
    $this->db->trans_start();

    $this->db->insert('user_token', $user_token);
    $this->db->trans_complete();

    return $this->db->insert_id();
  }

  public function get_user_by_email($email)
  {
    $this->db->trans_start();

    $result = $this->db->get_where('user_account', ['email' => $email])->row_array();
    $this->db->trans_complete();

    return $result;
  }

  public function get_token_by_email($token)
  {
    $this->db->trans_start();
    
    $result = $this->db->get_where('user_token', ['token' => $token])->row_array();
    $this->db->trans_complete();

    return $result;
  }

  public function update_user($email)
  {
    $this->db->trans_start();

    $this->db->set('status', 1);
    $this->db->where('email', $email);
    $this->db->update('user_account');

    if($this->db->trans_status() === TRUE) {
      $this->db->delete('user_token', ['email' => $email]);

      $this->db->trans_complete();

      return json_encode([
        'kode' => 200
      ]);
    } else {
      $this->db->trans_rollback();
    }
  }

  public function delete_user($email)
  {
    $this->db->trans_start();
    
    $this->db->delete('user_account', ['email' => $email]);
    
    if($this->db->trans_status() === TRUE) {
      $this->db->delete('user_token', ['email' => $email]);

      if($this->db->trans_status() === TRUE) {
        $this->db->trans_complete();

        return json_encode([
          'kode' => 200
        ]);
      } else {
        $this->db->trans_rollback();
      }
    } else {
      $this->db->trans_rollback();
    }
  }
}