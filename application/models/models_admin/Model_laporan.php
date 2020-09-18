<?php

class Model_laporan extends CI_Model{

	public function tampil_data(){
		$result = $this->db->query("SELECT no_tagihan, pelanggan.nama AS nama, tagihan.volume, tagihan.nominal, status_tagihan
		FROM tagihan, pelanggan, meteran WHERE meteran.id_pelanggan = pelanggan.id_pelanggan 
		AND tagihan.no_meteran = meteran.no_meteran AND status_tagihan = 'Lunas';");
    	return $result;
	}
}