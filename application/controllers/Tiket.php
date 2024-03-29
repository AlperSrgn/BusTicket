<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			redirect('login');
		}
	}
	public function index(){
		$this->session->unset_userdata(array('jadwal','asal','tanggal'));
		$data['title'] = "Check Schedule";
		$data['asal'] = $this->db->query("SELECT * FROM `tbl_seferler` ORDER BY yolculuk_sehir ASC ")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM `tbl_seferler` group by yolculuk_sehir ORDER BY yolculuk_sehir ASC ")->result_array();
		$data['list'] = $this->db->query("SELECT * FROM `tbl_seferler` ORDER BY yolculuk_sehir ASC ")->result_array();
		$this->load->view('frontend/cektanggal',$data);
	}
	/* Log on to codeastro.com for more projects */
	public function cektiket($value=''){
		$this->load->view('frontend/cektiket');
	}
	public function cekjadwal($tgl='' , $asl='', $tjn=''){
		$this->session->unset_userdata(array('jadwal','asal','tanggal'));
		$data['title'] = 'Search Tickets';
		$data['tanggal'] = $this->input->get('tanggal').$tgl;
		$asal = $this->input->get('asal').$asl;
		$tujuan = $this->input->get('tujuan').$tjn;
		$data['asal'] = $this->db->query("SELECT * FROM tbl_seferler
               WHERE hedef_kod ='$asal'")->row_array();
		$data['jadwal'] = $this->db->query("SELECT * FROM tbl_sefer LEFT JOIN tbl_bus on tbl_sefer.bus_id = tbl_bus.bus_id LEFT JOIN tbl_seferler on tbl_sefer.hedef_kod = tbl_seferler.hedef_kod WHERE tbl_sefer.sehir ='$tujuan' AND tbl_sefer.kalkis_kod = '$asal'")->result_array();
		if (!empty($data['jadwal'])) {
			if ($tujuan == $data['asal']['yolculuk_sehir']) {
				//$this->session->set_flashdata('message', 'swal("Cek", "Tujuan dan Asal tidak boleh sama", "error");');
    			redirect('tiket');
			}else{
				for ($i=0; $i < count($data['jadwal']); $i++) { 
					$data['kursi'][$i] = $this->db->query("SELECT count(koltuk_no) FROM tbl_order WHERE sefer_kodu = '".$data['jadwal'][$i]['sefer_kodu']."' AND hareket_tarihi = '".$data['tanggal']."' AND cikis_kodu = '".$asal."'")->result_array();
				};
				$this->load->view('frontend/cekjadwal',$data);
			}
		}else{
			//$this->session->set_flashdata('message', 'swal("Empty", "No Schedule", "error");');
    		redirect('tiket');
		}
	}
	/* Log on to codeastro.com for more projects */
	public function beforebeli($jadwal="",$asal='',$tanggal=''){
		$array = array(
			'jadwal' => $jadwal,
			'asal'	=> $asal,
			'tanggal'	=> $tanggal
		);
		$this->session->set_userdata($array);
		if ($this->session->userdata('username')){
			$id = $jadwal;
			$asal = $asal;
			$data['tanggal'] = $tanggal;
			$data['asal'] =  $this->db->query("SELECT * FROM tbl_seferler
               WHERE hedef_kod ='".$asal."'")->row_array();
			$data['jadwal'] = $this->db->query("SELECT * FROM tbl_sefer LEFT JOIN tbl_bus on tbl_sefer.bus_id = tbl_bus.bus_id LEFT JOIN tbl_seferler on tbl_sefer.hedef_kod = tbl_seferler.hedef_kod WHERE sefer_kodu ='".$id."'")->row_array();
			$data['kursi'] = $this->db->query("SELECT koltuk_no FROM tbl_order WHERE sefer_kodu = '".$data['jadwal']['sefer_kodu']."' AND hareket_tarihi = '".$data['tanggal']."' AND cikis_kodu = '".$asal."'")->result_array();
			$this->load->view('frontend/beli_step1',$data);
		}else{ 
			redirect('login/autlogin');
		}
	}
	public function afterbeli(){
		$data['kursi'] = $this->input->get('kursi');
		$data['bank'] = $this->db->query("SELECT * FROM `tbl_bank` ")->result_array();
		$data['sefer_kodu'] = $this->session->userdata('jadwal');
		$data['asal'] = $this->session->userdata('asal');
		$data['tglberangkat'] = $this->input->get('tgl');
		if ($data['kursi']) {
			$this->load->view('frontend/beli_step2', $data);
		}else{
			//$this->session->set_flashdata('message', 'swal("Empty", "Choose Your Seat", "error");');
			redirect('tiket/beforebeli/'.$data['asal'].'/'.$data['sefer_kodu']);
		}
	}
	/* Log on to codeastro.com for more projects */
	public function gettiket($value=''){
	    include 'assets/phpqrcode/qrlib.php';
	    $asal =  $this->db->query("SELECT * FROM tbl_seferler
               WHERE hedef_kod ='".$this->session->userdata('asal')."'")->row_array();		
		$getkode =  $this->getkod_model->get_kodtmporder();
		$sefer_kodu = $this->session->userdata('jadwal');
		$kd_musteri = $this->session->userdata('kd_musteri');
		$tglberangkat = $this->input->post('tgl');
		$jambeli = date("Y-m-d H:i:s");
		$nama =  $this->input->post('nama');
		$kursi = $this->input->post('kursi');
		$tahun = $this->input->post('tahun');
		$no_ktp = $this->input->post('no_ktp');
		$nama_pemesan = $this->input->post('nama_pemesan');
		$hp = $this->input->post('hp');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$bank = $this->input->post('bank');
		$satu_hari        = mktime(0,0,0,date("n"),date("j")+1,date("Y"));
		$expired       = date("d-m-Y", $satu_hari)." ".date('H:i:s');
		$status 		= '1';
		QRcode::png($getkode,'assets/frontend/upload/qrcode/'.$getkode.".png","Q", 8, 8);
		$count = count($kursi);
		$tanggal = hari_indo(date('N',strtotime($jambeli))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$jambeli.''))).', '.date('H:i',strtotime($jambeli));
		for($i=0; $i<$count; $i++) {
			$simpan = array(
				'kd_order' => $getkode,
				'kd_bilet' => 'T'.$getkode.$sefer_kodu.str_replace('-','',$tglberangkat).$kursi[$i],
				'sefer_kodu'	=> $sefer_kodu,
				'kd_musteri' => $kd_musteri,
				'cikis_kodu' => $asal['hedef_kod'],
				'sahip'	=> $nama_pemesan,
				'alim_tarih'	=> $tanggal,
				'hareket_tarihi' => $tglberangkat,
				'koltuk_no'		=> $kursi[$i],
				'onay_isim' => $nama[$i],
				'yolcu_yas' => $tahun[$i],
				'yolcu_kimlik_no'	=> $no_ktp,
				'yolcu_tel_no'	=> $hp,
				'yolcu_adres'	=> $alamat,
				'yolcu_email'		=> $email,
				'kd_bank' => $bank,
				'gecerlilik_sure'	=> $expired,
				'qrcode_order'	=> 'assets/frontend/upload/qrcode/'.$getkode.'.png',
				'status_order'	=> $status
			);
			$this->db->insert('tbl_order', $simpan);
		}
		redirect('tiket/checkout/'.$getkode);
	}
	/* Log on to codeastro.com for more projects */
	public function cekorder($id=''){
		$id = $this->input->post('kodetiket');
		$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_sefer on tbl_order.sefer_kodu = tbl_sefer.sefer_kodu LEFT JOIN tbl_bus on tbl_sefer.bus_id = tbl_bus.bus_id LEFT JOIN tbl_bank on tbl_order.kd_bank = tbl_bank.kd_bank WHERE kd_order ='$id' AND status_order != 3 AND status_order != 2")->result_array();
		if ($sqlcek) {
			$data['tiket'] = $sqlcek;
			$data['count'] = count($sqlcek);
			$this->load->view('frontend/payment',$data);
		}else{
			$this->session->set_flashdata('message', 'swal("Empty", "No Pending Tickets Found", "error");');
    		redirect('tiket/cektiket');
		}
	}
	public function payment($id=''){
		$this->getsecurity();
		$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_sefer on tbl_order.sefer_kodu = tbl_sefer.sefer_kodu LEFT JOIN tbl_bus on tbl_sefer.bus_id = tbl_bus.bus_id LEFT JOIN tbl_bank on tbl_order.kd_bank = tbl_bank.kd_bank WHERE kd_order ='$id'")->result_array();
		$data['count'] = count($sqlcek);
		$data['tiket'] = $sqlcek;
		$this->load->view('frontend/payment',$data);
	}
	public function checkout($value='') {
		$this->getsecurity();
		$data['tiket'] = $value;
		$this->load->view('frontend/checkout', $data);
	}
	/* Log on to codeastro.com for more projects */
	public function caritiket(){
		$id = $this->input->post('kodetiket');
		$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_bus on tbl_order.bus_id = tbl_bus.bus_id LEFT JOIN tbl_sefer on tbl_order.sefer_kodu = tbl_sefer.sefer_kodu WHERE kd_order ='".$id."'")->result_array();
		if ($sqlcek == NULL) {
			$this->session->set_flashdata('message', 'swal("Kosong", "Tidak Ada Tiket", "error");');
    		redirect('tiket/cektiket');
		}else{
			$data['tiket'] = $sqlcek;
			$this->load->view('frontend/payment', $data);
		}
	}
	public function konfirmasi($value='',$harga=''){
		$this->getsecurity();
		$data['id'] = $value;
		$data['total'] = $harga;
		$this->load->view('frontend/konfirmasi', $data);
	}
	public function insertkonfirmasi($value=''){
		$this->getsecurity();
		$config['upload_path'] = './assets/frontend/upload/payment';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'swal("Fail", "Check Your Confirmation Again", "error");');
			redirect('tiket/konfirmasi/'.$this->input->post('kd_order').'/'.$this->input->post('total'));
		}
		else{
			$upload_data = $this->upload->data();
			$featured_image = '/assets/frontend/upload/payment/'.$upload_data['file_name'];
			$data = array(
						'onay_kodu' => $this->getkod_model->get_kodkon(),
						'kd_order'	=> $this->input->post('kd_order'),
						'banka_adi'		=> $this->input->post('bank_km'),
						'musteri_isim' =>  $this->input->post('nama'),
						'hesap_no'		=> $this->input->post('nomrek'),
						'total_fiyat' => $this->input->post('total'),
						'foto_dogrulama' => $featured_image
					);
			$this->db->insert('tbl_onay', $data);
			$this->session->set_flashdata('message', 'swal("Success", "Thank you. Please wait for the verification!", "success");');
			redirect('profile/tiketsaya/'.$this->session->userdata('kd_musteri'));
		}
	}
	
	public function cetak($id=''){
		$this->getsecurity();
		$order = $id;
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_bus on tbl_order.bus_id = tbl_bus.bus_id LEFT JOIN tbl_sefer on tbl_order.sefer_kodu = tbl_sefer.sefer_kodu LEFT JOIN tbl_seferler on tbl_sefer.hedef_kod = tbl_seferler.hedef_kod WHERE kd_order ='".$id."'")->result_array();
		$tiket = $this->db->query("SELECT musteri_email FROM tbl_musteri WHERE kd_musteri ='".$data['cetak'][0]['kd_musteri']."'")->row_array();
		die(print_r($tiket));
	}

}


