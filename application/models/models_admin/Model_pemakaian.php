<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pemakaian extends CI_Model{

	public function tampil_data($id_petugas)
	{
		$result = $this->db->query("SELECT no_meteran, pelanggan.nama AS nama, volume, nominal
		FROM meteran INNER JOIN pelanggan ON meteran.id_pelanggan = pelanggan.id_pelanggan AND
		pelanggan.id_petugas = '".$id_petugas."' ORDER BY no_meteran;");
        return $result;
	}
	public function tampil_pelanggan($id_petugas){
		$result = $this->db->query("SELECT * FROM pelanggan WHERE pelanggan.id_petugas = '".$id_petugas."' ORDER BY nama;");
    	return $result;
	}

	public function tambah_meteran($data, $table){
		$this->db->insert($table, $data);
	}

	public function hapus_meteran($id)
    {
        return $this->db->delete('meteran', array("no_meteran" => $id));
    }
}