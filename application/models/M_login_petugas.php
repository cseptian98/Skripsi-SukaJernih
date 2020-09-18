<?php
class M_login_petugas extends CI_Model{
 
  public function cek_login(){

    $username = set_value('username');
    $password = set_value('password');

    $result = $this->db->where('username',$username)
               ->where('password',$password)
               ->limit(1)
               ->get('petugas');
    if($result->num_rows() > 0){
      return $result->row();
    }else{
      return array();
    }
  }

  function validatePass($username,$password){
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $result = $this->db->get('petugas',1);
    return $result;
  }
}