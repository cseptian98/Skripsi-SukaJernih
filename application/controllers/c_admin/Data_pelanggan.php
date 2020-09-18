<?php 

class Data_pelanggan extends CI_Controller{

	function __construct(){
      parent::__construct();
	  $this->load->model('models_admin/model_pelanggan');
	  
	  if($this->session->userdata('logged_in') == FALSE){
		$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda belum login!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		  redirect('login_admin/login');
	  }
    }

	public function index(){
		$id_petugas = $this->session->userdata('id_petugas');
		$data['pelanggan'] = $this->model_pelanggan->tampil_data($id_petugas)->result();
		$this->load->view('admin_templates/header');
		$this->load->view('admin_templates/sidebar');
		$this->load->view('admin/data_pelanggan', $data);
		$this->load->view('admin_templates/footer');
	}

	public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_pelanggan->hapus_pelanggan($id)) {
            redirect('c_admin/data_pelanggan/index');
        }
	}
	
	public function edit(){
		$id_pelanggan = $this->input->post('id_pelanggan');
		$nama_plg	= $this->input->post('nama_plg');
		$alamat_plg	= $this->input->post('alamat_plg');
		$telp		= $this->input->post('telp');

		$data = array (			
			'id_pelanggan'	=> $id_pelanggan,
			'nama' 			=> $nama_plg,
			'alamat' 		=> $alamat_plg,
			'no_telp'		=> $telp,
		);

		$kondisi = array('id_pelanggan' => $id_pelanggan);
		$this->model_pelanggan->edit_pelanggan($data,$kondisi, 'pelanggan');
		redirect('c_admin/data_pelanggan/index');
	}

	public function tambah(){
		$id_petugas = $this->input->post('id_petugas');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$nama_plg	= $this->input->post('nama_plg');
		$alamat_plg	= $this->input->post('alamat_plg');
		$telp		= $this->input->post('telp');

		$data = array (			
			'id_pelanggan'	=> $id_pelanggan,
			'id_petugas'	=> $id_petugas,
			'nama' 			=> $nama_plg,
			'alamat' 		=> $alamat_plg,
			'no_telp'		=> $telp,
		);

		$this->model_pelanggan->tambah_pelanggan($data, 'pelanggan');
		redirect('c_admin/data_pelanggan/index');
	}	
}