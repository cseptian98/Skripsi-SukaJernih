<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    public function tampil_data(){
		$result = $this->db->query("SELECT * FROM petugas");
        return $result;
    }

    public function tambah_petugas($data, $table){
		$this->db->insert($table, $data);
    }

    public function edit_petugas($data, $kondisi, $table){
		
		$this->db->update($table, $data, $kondisi);
	}

    public function hapus_petugas($id)
    {
        return $this->db->delete('petugas', array("id_petugas" => $id));
	}
}