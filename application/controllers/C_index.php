<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_index extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('m_index');
    }

    public function index()
    {
        $data['pelanggan'] = $this->m_index->index()->result();
        $this->load->view('index', $data);
    }

    public function tampil_data()
    {
        $no_tagihan = $this->input->post('no_tagihan');
    	$this->m_index->tampil_data($no_meteran);
        
        redirect('c_index/index');
    }

    public function get_tagihan(){
		$postData = $this->input->post();
		$data = $this->m_index->get_data_tagihan($postData);
		echo json_encode($data);
    }
}
