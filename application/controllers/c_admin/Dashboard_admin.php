<?php 

class Dashboard_admin extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('models_admin/model_admin');

    if($this->session->userdata('logged_in') == FALSE){
      $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda belum login!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button></div>');
        redirect('login_admin/login');
    }
  }

  function index(){
    $data['petugas'] = $this->model_admin->tampil_data()->result();
    $this->load->view('admin_templates/header');
    $this->load->view('admin_templates/sidebar_admin');
    $this->load->view('admin/data_petugas', $data);
    $this->load->view('admin_templates/footer');
  }

  public function tambah(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm_password', 'Masukan Ulang Password', 'required|matches[password]');

    $id_petugas   = $this->input->post('id_petugas');
    $id_admin     = $this->input->post('id_admin');
		$username	    = $this->input->post('username');
    $password	    = md5($this->input->post('password'));
    $pass_conf    = md5($this->input->post('confirm_password'));
    $nama_petugas	= $this->input->post('nama_petugas');
    $no_telp      = $this->input->post('no_telp');

		$data = array (			
			'id_petugas'	      => $id_petugas,
			'id_admin'	        => $id_admin,
			'username' 			    => $username,
      'password' 		      => $password,
      'confirm_password'  => $pass_conf,
      'nama_petugas'	    => $nama_petugas,
      'no_telp'           => $no_telp,
		);

		$this->model_admin->tambah_petugas($data, 'petugas');
		redirect('c_admin/dashboard_admin/index');
  }

  public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_admin->hapus_petugas($id)) {
            redirect('c_admin/dashboard_admin/index');
        }
  }
  
  public function edit(){
		$id_petugas   = $this->input->post('id_petugas');
		$username	    = $this->input->post('username');
    $password	    = md5($this->input->post('password'));
    $pass_conf    = md5($this->input->post('confirm_password'));
    $nama_petugas	= $this->input->post('nama_petugas');
    $no_telp      = $this->input->post('no_telp');

		$data = array (			
			'id_petugas'	      => $id_petugas,
			'username' 			    => $username,
      'password' 		      => $password,
      'confirm_password'  => $pass_conf,
      'nama_petugas'	    => $nama_petugas,
      'no_telp'           => $no_telp,
		);

		$kondisi = array('id_petugas' => $id_petugas);
		$this->model_admin->edit_petugas($data,$kondisi, 'petugas');
		redirect('c_admin/dashboard_admin/index');
	}
} 