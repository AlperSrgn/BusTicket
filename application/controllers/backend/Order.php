<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		if (empty($this->session->userdata('username_admin'))) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
		$data['title'] = "Booking List";
 		$data['order'] = $this->db->query("SELECT * FROM tbl_order group by kd_order")->result_array();
		// die(print_r($data));
		$this->load->view('backend/order', $data);
	}
	/* Log on to codeastro.com for more projects */
	public function vieworder($id=''){
		// die(print_r($_GET));
		$cek = $this->input->get('order').$id;
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_sefer on tbl_order.sefer_kodu = tbl_sefer.sefer_kodu WHERE kd_order ='".$cek."' ")->result_array();
	 	if ($sqlcek) {
	 		$data['tiket'] = $sqlcek;
			$data['title'] = "View Bookings";
			// die(print_r($sqlcek));
			$this->load->view('backend/view_order',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Empty", "No Order", "error");');
    		redirect('backend/tiket');
	 	}
	}
	public function inserttiket($value=''){
		$id = $this->input->post('kd_order');
		$asal = $this->input->post('asal_beli');
		$tiket = $this->input->post('kd_bilet');
		$nama = $this->input->post('nama');
		$kursi = $this->input->post('no_kursi');
		$umur = $this->input->post('umur_kursi');
		$harga = $this->input->post('harga');
		$tgl = $this->input->post('tgl_beli');
		$status = $this->input->post('status');
		$where = array('kd_order' => $id );
		$update = array('status_order' => $status );
		$this->db->update('tbl_order', $update,$where);
		$data['asal'] = $this->db->query("SELECT * FROM tbl_seferler WHERE hedef_kod ='".$asal."'")->row_array();
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_sefer on tbl_order.sefer_kodu = tbl_sefer.sefer_kodu LEFT JOIN tbl_seferler on tbl_sefer.hedef_kod = tbl_seferler.hedef_kod WHERE kd_order ='".$id."'")->result_array();
		$pelanggan = $this->db->query("SELECT musteri_email FROM tbl_musteri WHERE kd_musteri ='".$data['cetak'][0]['kd_musteri']."'")->row_array();
		$pdfFilePath = "assets/backend/upload/etiket/".$id.".pdf";
		$html = $this->load->view('frontend/cetaktiket', $data, TRUE);
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath);
		for ($i=0; $i < count($nama) ; $i++) { 
			$simpan = array(
				'kd_bilet' => $tiket[$i],
				'kd_order' => $id,
				'bilet_isim' => $nama[$i],
				'bilet_koltuk' => $kursi[$i],
				'bilet_yas' => $umur[$i],
				'bilet_cikis_kod' => $asal,
				'bilet_fiyat' => $harga,
				'bilet_durum' => $status,
				'bilet_path' => $pdfFilePath,
				'bilet_olstrm_tarih' => date('Y-m-d'),
				'bilet_admin' => $this->session->userdata('username_admin')
			);
		$this->db->insert('tbl_bilet', $simpan);
		}
		$this->session->set_flashdata('message', 'swal("Succeed", "Ticket Order Processed Successfully", "success");');
		redirect('backend/order');

		
	}
	/* Log on to codeastro.com for more projects */
	public function kirimemail($id=''){
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_sefer on tbl_order.sefer_kodu = tbl_sefer.sefer_kodu LEFT JOIN tbl_seferler on tbl_sefer.hedef_kod = tbl_seferler.hedef_kod WHERE kd_order ='".$id."'")->result_array();
		$asal = $data['cetak'][0]['cikis_kodu'];
		$kodeplg = $data['cetak'][0]['kd_musteri'];
		$data['asal'] = $this->db->query("SELECT * FROM tbl_seferler WHERE hedef_kod ='$asal'")->row_array();
		$pelanggan = $this->db->query("SELECT musteri_email FROM tbl_musteri WHERE kd_musteri ='$kodeplg'")->row_array();
		//email
		$subject = 'E-ticket - Order ID '.$id.' - '.date('dmY');
		$message = $this->load->view('frontend/cetaktiket', $data ,TRUE);
		$attach  = base_url("assets/backend/upload/etiket/".$id.".pdf");
		$to 	= $pelanggan['musteri_email'];
		$config = array(
			   'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
			   'smtp_user' => 'akbabameytican@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'hzuv jmpk ytbd iavw',       // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "rn",
               'newline'   => "rn"
		);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('BTBS');
        $this->email->to($to);
        $this->email->attach($attach);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
        	$this->session->set_flashdata('message', 'swal("Succeed", "E-Ticket sent!", "success");');
			redirect('backend/order/vieworder/'.$id);
        } else {
            $this->session->set_flashdata('message', 'swal("Failed", "E-Tickets Failed to Send Contact the IT Team", "error");');
			redirect('backend/order/vieworder/'.$id);
        }

	}

}

/* End of file Order.php */
/* Log on to codeastro.com for more projects */
/* Location: ./application/controllers/backend/Order.php */