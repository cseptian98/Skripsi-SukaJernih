<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{    
    function get_id_petugas($id_petugas){
        $result = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '".$id_petugas."' ");
        return $result;
    }
}