<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		$this->load->library('form_validation');
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
		$data['title'] = "Schedule Management";
		$data['jadwal'] = $this->db->query("SELECT * FROM tbl_sefer LEFT JOIN tbl_bus on tbl_sefer.bus_id = tbl_bus.bus_id LEFT JOIN tbl_seferler on tbl_sefer.kalkis_kod = tbl_seferler.hedef_kod ")->result_array();
		$this->load->view('backend/jadwal', $data);
	}
	public function viewtambahjadwal($value=''){
		$data['title'] = "Add Schedule";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY bus_name asc")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_seferler ORDER BY yolculuk_sehir asc")->result_array();
		$this->load->view('backend/tambahjadwal', $data);
	}
	
	public function tambahjadwal(){
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() ==  FALSE) {
			$data['title'] = "Add Schedule";
			$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY bus_name asc")->result_array();
			$data['tujuan'] = $this->db->query("SELECT * FROM tbl_seferler ORDER BY yolculuk_sehir asc")->result_array();
			$this->load->view('backend/tambahjadwal', $data);
		} else {
			$asal = $this->input->post('asal');
			$tujuan = $this->db->query("SELECT * FROM tbl_seferler
               WHERE hedef_kod ='".$this->input->post('tujuan')."'")->row_array();
			if ($asal == $tujuan['hedef_kod']) {
				$this->session->set_flashdata('message', 'swal("Succeed", "Schedule Goals Cant Be the Same", "error");');
			redirect('backend/jadwal');
			}else{
			$kode = $this->getkod_model->get_kodjad();
			$simpan = array(
					'sefer_kodu' => $kode,
					'kalkis_kod' => $asal,
					'hedef_kod' => $tujuan['hedef_kod'],
					'bus_id' => $this->input->post('bus'),
					'sehir' => $tujuan['yolculuk_sehir'],
					'kalkis_saat' => $this->input->post('berangkat'),
					'varis_saat' => $this->input->post('tiba'),
					'ucret' =>  $this->input->post('harga'),
					 );
			// die(print_r($simpan));
			$this->db->insert('tbl_sefer', $simpan);
			$this->session->set_flashdata('message', 'swal("Succeed", "New schedule has been added", "success");');
			redirect('backend/jadwal');
			}
			
		}
		
	}
	public function viewjadwal($id=''){
		$data['title'] = "Destination List";
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_sefer LEFT JOIN tbl_bus on tbl_sefer.bus_id = tbl_bus.bus_id LEFT JOIN tbl_seferler on tbl_sefer.hedef_kod = tbl_seferler.hedef_kod WHERE sefer_kodu ='".$id."'")->row_array();
	 	if ($sqlcek) {
	 		$data['asal'] = $this->db->query("SELECT * FROM tbl_seferler WHERE hedef_kod = '".$sqlcek['kalkis_kod']."'")->row_array();
	 		$data['jadwal'] = $sqlcek;
			$data['title'] = "View Schedule";
			// die(print_r($data));
			$this->load->view('backend/view_jadwal',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Failed", "Something Went Wrong. Please Try Again", "error");');
			redirect('backend/jadwal');
	 	}
	}	
}

/* End of file Jadwal.php */

/* Location: ./application/controllers/backend/Jadwal.php */