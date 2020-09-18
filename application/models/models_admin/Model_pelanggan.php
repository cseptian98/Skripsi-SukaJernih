<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pelanggan extends CI_Model{

	public function tampil_data($id_petugas){
		$result = $this->db->query("SELECT * FROM pelanggan WHERE id_petugas = '".$id_petugas."'  ORDER BY nama;");
        return $result;
	}
	public function tambah_pelanggan($data, $table){
		$this->db->insert($table, $data);
	}

	public function edit_pelanggan($data, $kondisi, $table){
		
		$this->db->update($table, $data, $kondisi);
	}

    public function hapus_pelanggan($id)
    {
        return $this->db->delete('pelanggan', array("id_pelanggan" => $id));
	}
}