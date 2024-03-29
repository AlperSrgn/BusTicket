<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
	$data['title'] = "Bus Management";
	$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY bus_name asc")->result_array();
	// die(print_r($data));
	$this->load->view('backend/bus', $data);	
	}
	public function viewbus($id=''){
		$data['title'] = "View Bus";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus WHERE bus_id = '".$id."'")->row_array();
		$this->load->view('backend/view_bus', $data);
	}
	public function tambahbus(){
		$kode = $this->getkod_model->get_kodbus();
		$data = array(
			'bus_id' => $kode,
			'bus_name' => $this->input->post('bus_name'),
			'plaka'		 => $this->input->post('plaka'),
			'kapasite'		 => $this->input->post('seat'),
			'status_bus'			=> '1'
			 );
		$this->db->insert('tbl_bus', $data);
		$this->session->set_flashdata('message', 'swal("Succeed", "Bus Data Saved", "success");');
		redirect('backend/bus');
	}

}
