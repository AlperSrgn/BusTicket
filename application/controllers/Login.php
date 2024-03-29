<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->autlogin();
	}

	public function autlogin(){
		$this->load->view('frontend/login');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
	public function cekuser(){
		$username = strtolower($this->input->post('username'));
		$password = $this->input->post('password');
		$sqlCheck = $this->db->query('select * from tbl_musteri where username = "'.$username.'" OR musteri_email = "'.$username.'" ')->row();
		// die(print_r($sqlCheck));
		if ($sqlCheck) {
			if ($sqlCheck->musteri_durum == 1) { 
				if (password_verify($password,$sqlCheck->sifre_musteri)) {
						$sess = [
							'kd_musteri' => $sqlCheck->kd_musteri,
							'username' => $sqlCheck->username,
							'password' => $sqlCheck->sifre_musteri,
							'ktp'     => $sqlCheck->kimlik_no_musteri,
							'nama_lengkap'     => $sqlCheck->muster_adi,
							'musteri_foto'	=> $sqlCheck->musteri_foto,
							'email'   => $sqlCheck->musteri_email,
							'telpon'   => $sqlCheck->musteri_telefon,
							'alamat'	=> $sqlCheck->musteri_adres
						];
						$this->session->set_userdata($sess);
						if ($this->session->userdata('jadwal') == NULL) {
							redirect('tiket');
						}else{
							redirect('tiket/beforebeli/'.$this->session->userdata('jadwal').'/'.$this->session->userdata('asal').'/'.$this->session->userdata('tanggal'));
						}
					}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Wrong Password
					</div>');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Account Not verified yet!!
					</div>');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Username not found. Please try again!
					</div>');
			redirect('login');
		}
	}

	public function daftar(){
		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|is_unique[tbl_musteri.musteri_telefon]',array(
			'required' => 'Mobile number is required to be filled in.',
			'is_unique' => 'Number Already In Use.'
			 ));
		$this->form_validation->set_rules('name', 'Name', 'trim|required',array(
			'required' => 'Name Required.',
			 ));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_musteri.username]',array(
			'required' => 'Username Required.',
			'is_unique' => 'Username Already In Use.'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_musteri.musteri_email]',array(
			'required' => 'Email Required.',
			'valid_email' => 'Enter Email Correctly',
			'is_unique' => 'Email Already In Use.'
			 ));
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]',array(
			'matches' => 'Password Not Same.',
			'min_length' => 'Password Minimum 8 Characters.'
			 ));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/daftar');
		} else {
			// die(print_r($_POST));
			$this->load->model('getkod_model');
			$data = array(
			'kd_musteri'	=> $this->getkod_model->get_kodpel(),
			'muster_adi'  => $this->input->post('name'),
			'musteri_email'	    	=> $this->input->post('email'),
			'musteri_foto'		=> 'assets/frontend/img/default.png',
			'musteri_adres'		=> $this->input->post('alamat'),
			'musteri_telefon'		=> $this->input->post('nomor'),
			'username'		=> $this->input->post('username'),
			'musteri_durum' => 1,
			'musteri_ols_veri' => time(),
			'sifre_musteri'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
			);
			$token = md5($this->input->post('email').date("d-m-Y H:i:s"));
			$data1 = array(
				'token_name' => $token,
				'email_token' => $this->input->post('email'),
				'date_create_token' => time()
				 );
			$this->db->insert('tbl_musteri', $data);
			$this->db->insert('tbl_musteri_token', $data1);
			$this->_sendmail($token,'verify');
			//$this->session->set_flashdata('message', 'swal("Success", "Successfully Registered. Welcome to BTBS!", "success");');
    		redirect('login');
		}

	}
	Private function _sendmail($token='',$type=''){
		$config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'demo@email.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'P@$$\/\/0RD',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "rn",
               'newline'   => "rn"
           ];
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('BTBS');
        $this->email->to($this->input->post('email'));
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
        if ($type == 'verify') {
        	$this->email->subject('Account verify BTBS');
       		$this->email->message('Click the link to verify your account <a href="'.base_url('login/verify?email='.$this->input->post('email').'&token='.$token).'" >Verification</a>');
        }elseif ($type == 'forgot') {
        	$this->email->subject('BTBS Ticket Reset Account');
       		$this->email->message('Click the link to Reset your account <a href="'.base_url('login/forgot?email='.$this->input->post('email').'&token='.$token).'" >Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo 'Error! email cant be sent.';
        }
	}
	/* Log on to codeastro.com for more projects */
	public function verify($value=''){
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$sqlcek = $this->db->get_where('tbl_musteri',['musteri_email' => $email])->row_array();
		if ($sqlcek) {
			$sqlcek_token = $this->db->get_where('tbl_musteri_token',['token_name' => $token])->row_array();
			if ($sqlcek_token) {
				if(time() - $sqlcek_token['date_create_token'] < (60 * 60 * 24)){
					$update = array('musteri_durum' => 1, );
					$where = array('musteri_email' => $email );
					$this->db->update('tbl_musteri', $update,$where);
					$this->db->delete('tbl_musteri_token',['email_token' => $email]);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Successfully Verify Your Account, Login
					</div>');
					redirect('login');
				}else{
					$this->db->delete('tbl_musteri',['musteri_email' => $email]);
					$this->db->delete('tbl_musteri_token',['email_token' => $email]);
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Token Expired, Please re-register your account
						</div>');
	    			redirect('login');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Incorrect Token Verification Failed
						</div>');
	    		redirect('login');
			}
		}else{
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
		Email Verification Failed
						</div>');
	    redirect('login');
		}
	}
	/* Log on to codeastro.com for more projects */
	public function lupapassword($value=''){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
			'required' => 'Email Required.',
			'valid_email' => 'Enter Email Correctly',
			 ));
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/lupapassword');
		} else {
			$email = $this->input->post('email');
			$sqlcek = $this->db->get_where('tbl_musteri',['musteri_email' => $email],['musteri_durum' => 1])->row_array();
			if ($sqlcek) {
				$token = md5($email.date("d-m-Y H:i:s"));
				$data = array(
				'token_name' => $token,
				'email_token' => $email,
				'date_create_token' => time()
				 );
			$this->db->insert('tbl_musteri_token', $data);
			$this->_sendmail($token,'forgot');
			$this->session->set_flashdata('message', 'swal("Success", "Successfully Reset Password Please Check Your Email", "success");');
    		redirect('login');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						No Email Or Account Not Active
						</div>');
	   			redirect('login/lupapassword');
			}
		}
	}
	public function forgot($value=''){
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$sqlcek = $this->db->get_where('tbl_musteri',['musteri_email' => $email])->row_array();
		if ($sqlcek) {
			$sqlcek_token = $this->db->get_where('tbl_musteri_token',['token_name' => $token])->row_array();
			if ($sqlcek_token) {
				$this->session->set_userdata('resetemail' ,$email);
				$this->changepassword();
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Failed to Reset Wrong Email Token
						</div>');
	    		redirect('login');
			}
		}else{
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
		Failed to Reset Wrong Email
						</div>');
	    redirect('login');
		}
	}
	/* Log on to codeastro.com for more projects */
	public function changepassword($value=''){
		if ($this->session->userdata('resetemail') == NULL) {
			redirect('login/daftar');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]',array(
			'matches' => 'Password Not Same.',
			'min_length' => 'Password Minimum 8 Characters.'
			 ));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/resetpassword');
		}else{
			$email = $this->session->userdata('resetemail');
			$update = array(
				'musteri_durum' => 1,
				'sifre_musteri' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
			);
			$where = array('musteri_email' => $email );
			$this->db->update('tbl_musteri', $update,$where);
			$this->session->unset_userdata('resetemail');
			$this->db->delete('tbl_musteri_token',['email_token' => $email]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Successfully Reset, Login Your Account Back
					</div>');
			redirect('login');
		}
	}
}

/* End of file Login.php */
/* Log on to codeastro.com for more projects */
/* Location: ./application/controllers/Login.php */