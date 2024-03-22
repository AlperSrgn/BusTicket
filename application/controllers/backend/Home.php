<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$data['title'] = "Home";
		$data['order'] = $this->db->query("SELECT count(kd_order) FROM tbl_order WHERE status_order ='1'")->result_array();
		$data['tiket'] = $this->db->query("SELECT count(kd_tiket) FROM tbl_tiket WHERE status_tiket = '2'")->result_array();
		$data['konfirmasi'] = $this->db->query("SELECT count(kd_konfirmasi) FROM tbl_konfirmasi ")->result_array();
		$data['bus'] = $this->db->query("SELECT count(kd_bus) FROM tbl_bus WHERE status_bus = 1 ")->result_array();
		$data['terminal'] = $this->db->query("SELECT count(kd_tujuan) FROM tbl_tujuan")->result_array();
		$data['schedules'] = $this->db->query("SELECT count(kd_jadwal) FROM tbl_jadwal")->result_array();
		// die(print_r($data));
		$this->load->view('backend/home', $data);
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
}

/* End of file Home.php */
/* Log on to codeastro.com for more projects */
/* Location: ./application/controllers/backend/Home.php */