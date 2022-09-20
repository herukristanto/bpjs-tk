<?php
class Login_model extends CI_Model{

    function validasi_username($username){
    	$result = $this->db->query("SELECT * FROM user_account WHERE username='$username' or email='$username' LIMIT 1");
        return $result;
    }

    function validasi_password($username,$password){
    	$result = $this->db->query("SELECT * FROM user_account WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $result;
    }

}