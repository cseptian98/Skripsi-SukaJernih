<?php 

class Data_pemakaian extends CI_Controller{

	function __construct(){
      parent::__construct();
	  $this->load->model('models_admin/model_pemakaian');
	  
	  if($this->session->userdata('logged_in') == FALSE){
		$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda belum login!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		  redirect('login_admin/login');
	  }
    }

	public function index(){
		$id_petugas = $this->session->userdata('id_petugas');
		$data['pelanggan'] = $this->model_pemakaian->tampil_pelanggan($id_petugas)->result();
		$data['pemakaian'] = $this->model_pemakaian->tampil_data($id_petugas)->result();		
		$this->load->view('admin_templates/header');
		$this->load->view('admin_templates/sidebar');
		$this->load->view('admin/data_pemakaian', $data);
		$this->load->view('admin_templates/footer');
	}

	public function tambah(){
		$no_meteran		= $this->input->post('no_meteran');
		$id_pelanggan 	= $this->input->post('id_pelanggan');

		$data = array (			
			'no_meteran'		=> $no_meteran,
			'id_pelanggan' 		=> $id_pelanggan,
		);

		$this->model_pemakaian->tambah_meteran($data, 'meteran');
		redirect('c_admin/data_pemakaian/index');
	}

	public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_pemakaian->hapus_meteran($id)) {
            redirect('c_admin/data_pemakaian/index');
        }
	}
}