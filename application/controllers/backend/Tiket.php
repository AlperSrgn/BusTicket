<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
	$data['title'] = "Ticket List";
	$data['tiket'] = $this->db->query("SELECT * FROM tbl_bilet WHERE bilet_durum = 2 ")->result_array();
	$this->load->view('backend/tiket', $data);	
	}
	
	public function viewtiket($tiket){
		$data['title'] = "Ticket List";
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_bilet WHERE kd_bilet = '".$tiket."' ")->row_array();
		if ($data['tiket']) {
			$this->load->view('backend/view_tiket', $data);
		}else{
			$this->session->set_flashdata('message', 'swal("Empty", "No Ticket", "error");');
    		redirect('backend/tiket');
		}	
	}

}

/* End of file Tiket.php */
/* Location: ./application/controllers/backend/Tiket.php */