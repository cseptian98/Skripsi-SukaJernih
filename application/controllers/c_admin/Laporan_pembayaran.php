<?php 

class Laporan_pembayaran extends CI_Controller{

	function __construct(){
      parent::__construct();
	  $this->load->model('models_admin/model_laporan');
	  
	  if($this->session->userdata('logged_in') == FALSE){
		$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda belum login!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		  redirect('login_admin/login');
	  }
    }

	public function index(){
		$this->load->view('admin_templates/header');
		$this->load->view('admin_templates/sidebar');
		$this->load->view('admin/laporan_pembayaran');
		$this->load->view('admin_templates/footer');
	}
}