<?php
class Changepass_model extends CI_Model
{	
	function checking_old_password($user_id,$old_pass)
	{
		$this->db->trans_start();

		$this->db->where('id', $user_id);
		$this->db->where('password', $old_pass);
		$query = $this->db->get('user_account');
		$this->db->trans_complete();
		
		return $query;
	}

	function change_password($user_id,$new_pass)
	{
		$this->db->trans_start();

		$this->db->set('password', $new_pass);
		$this->db->where('id', $user_id);
		$this->db->update('user_account');

		if($this->db->trans_status() === TRUE) {
			$this->db->trans_complete();
		}
	}

	public function getUserByEmailnStatus($email)
	{
		$this->db->trans_start();
		
		$result = $this->db->get_where('user_account', ['email' => $email, 'status' => 1])->row_array();
		$this->db->trans_complete();

		return $result;
	}

	public function insertToken($user_token)
	{
		$this->db->trans_start();

		$this->db->insert('user_token', $user_token);

		if($this->db->trans_status() === TRUE) {
			$this->db->trans_complete();
		}
	}

	public function getUserByEmail($email)
	{
		$this->db->trans_start();

		$result = $this->db->get_where('user_account', ['email' => $email])->row_array();
		$this->db->trans_complete();

		return $result;
	}

	public function getUserByToken($token)
	{
		$this->db->trans_start();

		$result = $this->db->get_where('user_token', ['token' => $token])->row_array();
		$this->db->trans_complete();

		return $result;
	}

	public function updatePassword($email, $password)
	{
		$this->db->trans_start();

		$this->db->set('password', $password);
		$this->db->where('email', $email);
		$this->db->update('user_account');

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