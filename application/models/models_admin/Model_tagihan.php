<?php

class Model_tagihan extends CI_Model{

	public function tampil_data($id_petugas){
		$result = $this->db->query("SELECT no_tagihan, pelanggan.nama AS nama, tagihan.volume, tagihan.nominal, status_tagihan, bulan, tahun
		FROM tagihan, pelanggan, meteran WHERE meteran.id_pelanggan = pelanggan.id_pelanggan 
		AND tagihan.no_meteran = meteran.no_meteran AND status_tagihan = 'Belum Lunas' AND pelanggan.id_petugas = '".$id_petugas."';");
    	return $result;
	}

	public function update_tagihan($id){
		return $this->db->update('tagihan', array("status_tagihan" => 'Lunas'), array("no_tagihan" => $id));
	}
}