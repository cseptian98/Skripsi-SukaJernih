<?php 

class Data_laporan extends CI_Controller{

	function __construct(){
      parent::__construct();
	  $this->load->model('models_admin/model_detail_laporan');
	  
	  if($this->session->userdata('logged_in') == FALSE){
		$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda belum login!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		  redirect('login_admin/login');
	  }
    }

	public function index(){
		$id_petugas = $this->session->userdata('id_petugas');
        $bulan = $this->input->post('pilih_bulan');
        $tahun = $this->input->post('pilih_tahun');
		$data['laporan'] = $this->model_detail_laporan->tampil_data($bulan,$tahun,$id_petugas)->result();		
		$this->load->view('admin_templates/header');
		$this->load->view('admin_templates/sidebar');
		$this->load->view('admin/detail_laporan', $data);
		$this->load->view('admin_templates/footer');
	}
}