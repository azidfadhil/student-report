<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model {
  
  function check_email($email) {
    $result = $this->db->query("SELECT * FROM master_trainer WHERE email='$email' LIMIT 1");
    return $result;
  }

  function check_password($email, $password) {
    $result = $this->db->query("SELECT * FROM master_trainer WHERE email='$email' AND password='$password' LIMIT 1");
    return $result;
  }
}