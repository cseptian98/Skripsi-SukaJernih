<?php

class Model_detail_laporan extends CI_Model{

	public function tampil_data($bulan, $tahun, $id_petugas){
		$result = $this->db->query("SELECT no_tagihan, pelanggan.nama, tagihan.volume, tagihan.nominal, status_tagihan, 
		tagihan.bulan, tagihan.tahun FROM tagihan, pelanggan, meteran WHERE pelanggan.id_petugas = '".$id_petugas."' AND meteran.id_pelanggan = pelanggan.id_pelanggan 
		AND tagihan.no_meteran = meteran.no_meteran AND status_tagihan = 'Lunas' AND bulan = '".$bulan."' AND tahun = '".$tahun."';");
    	return $result;
	}
}