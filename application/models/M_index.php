<?php
class M_index extends CI_Model
{
    public function tampil_data($no_tagihan){
		$result = $this->db->query("SELECT meteran.no_meteran, no_tagihan, pelanggan.id_pelanggan, pelanggan.nama AS nama, pelanggan.alamat AS alamat, meteran.volume, meteran.nominal AS nominal, status_tagihan
		FROM tagihan, pelanggan, meteran WHERE meteran.id_pelanggan = pelanggan.id_pelanggan 
		AND tagihan.no_meteran = meteran.no_meteran AND status_tagihan = 'Belum Lunas' AND no_tagihan = '".$no_tagihan."';");
        return $result;
    }

    public function index(){
		$result = $this->db->query("SELECT meteran.no_meteran, no_tagihan, pelanggan.id_pelanggan, pelanggan.nama AS nama, pelanggan.alamat AS alamat, tagihan.volume, tagihan.nominal, status_tagihan
		FROM tagihan, pelanggan, meteran WHERE meteran.id_pelanggan = pelanggan.id_pelanggan 
		AND tagihan.no_meteran = meteran.no_meteran AND status_tagihan = 'Belum Lunas';");
        return $result;
    }

    function get_data_tagihan($postData=array()){
		$response = array();
 
			if(isset($postData['id_pelanggan']) ){

			$records = $this->db->query("SELECT petugas.nama_petugas, meteran.no_meteran, no_tagihan, pelanggan.id_pelanggan, pelanggan.nama,
			bulan, tahun, pelanggan.alamat, tagihan.volume, tagihan.nominal, status_tagihan
            FROM tagihan, pelanggan, meteran, petugas WHERE meteran.id_pelanggan = pelanggan.id_pelanggan 
            AND tagihan.no_meteran = meteran.no_meteran AND pelanggan.id_pelanggan = '".$postData['id_pelanggan']."' 
            AND status_tagihan = 'Belum Lunas';");
			$response = $records->result_array();
			
			}
		return $response;
	}

}
