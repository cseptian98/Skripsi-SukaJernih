<?php 

class Login_admin extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_login_admin');
  }

  function index(){
    $this->load->view('admin_templates/header');
    $this->load->view('login_admin');
    $this->load->view('admin_templates/footer');
  }
  
  public function login(){
    $this->form_validation->set_rules('username','Username','required',['required' =>'Username wajib diisi!']);
    $this->form_validation->set_rules('password','Password','required|md5',['required' =>'Password wajib diisi!']);
    if($this->form_validation->run() == FALSE){
      $this->load->view('admin_templates/header');
      $this->load->view('login_admin');
      $this->load->view('admin_templates/footer');
    }else{
      $login = $this->M_login_admin->cek_login();

      if($login == FALSE){
        $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Anda Salah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button></div>');
        redirect('login_admin/login');
      }else{

        $nama_admin = $data['nama_admin'];
        $username = $data['username'];
        $sesdata = array(
            'nama_admin'  => $nama_admin,
            'username'    => $id_admin,
            'logged_in'   => 'TRUE'
        );
        $this->session->set_userdata($sesdata);
        $this->session->set_userdata('username',$login->username);
        $this->session->set_userdata('nama_admin',$login->nama_admin);
        redirect('c_admin/dashboard_admin');
        }
      }
    }
 
  function logout(){
      $this->session->sess_destroy();
      redirect('login_admin');
  }
}