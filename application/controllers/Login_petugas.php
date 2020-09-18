<?php 

class Login_petugas extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_login_petugas');
  }

  function index(){
    $this->load->view('admin_templates/header');
    $this->load->view('login_petugas');
    $this->load->view('admin_templates/footer');
  }
  
  public function login(){
    $this->form_validation->set_rules('username','Username','required',['required' =>'Username wajib diisi!']);
    $this->form_validation->set_rules('password','Password','required|md5',['required' =>'Password wajib diisi!']);
    if($this->form_validation->run() == FALSE){
      $this->load->view('admin_templates/header');
      $this->load->view('login_petugas');
      $this->load->view('admin_templates/footer');
    }else{
      $login = $this->M_login_petugas->cek_login();

      if($login == FALSE){
        $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Anda Salah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button></div>');
        redirect('login_petugas/login');
      }else{

        $nama_petugas = $data['nama_petugas'];
        $id_petugas = $data['id_petugas'];
        $sesdata = array(
            'nama_petugas'  => $nama_petugas,
            'id_petugas'    => $id_petugas,
            'logged_in'     => 'TRUE'
        );
        $this->session->set_userdata($sesdata);
        $this->session->set_userdata('username',$login->username);
        $this->session->set_userdata('id_petugas',$login->id_petugas);
        $this->session->set_userdata('nama_petugas',$login->nama_petugas);
        redirect('c_admin/dashboard_petugas');
        }
      }
    }
 
  function logout(){
      $this->session->sess_destroy();
      redirect('login_petugas');
  }
}