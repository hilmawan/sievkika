<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		if ($this->session->userdata('id_user') != '') {
			switch ($this->session->userdata('user_type')) {
				case '1':
					redirect('spi');
					break;
				case '4':
					redirect('kadiv');
					break;
				case '2':
					redirect('person');
					break;
				case '3':
					redirect('bau');
					break;
			}
		} else {
			$data['title'] = 'Evaluasi Proses Belajar Mengajar';
			$this->load->view('v_login', $data);
		}
		
		
	}

	public function masuk(){
		$user = $this->input->post('user_name');
		$pass = $this->input->post('user_password');
		$cek = $this->m_login->cek_user($user, $pass);
		// var_dump($cek->result());exit();
		if($cek->num_rows() == 1){
			foreach($cek->result() as $sess){
				$sess_data['id_user'] = $sess->username;
				$sess_data['kd_unit'] = $sess->kd_unit;
				$sess_data['user_type'] = $sess->user_type;
				$this->session->set_userdata($sess_data);
			}

			if($sess->user_type == '1'){
				redirect('spi');
			}elseif($sess->user_type == '2'){
				redirect('person');
			}elseif($sess->user_type == '3'){
				redirect('bau');
			}elseif ($sess->user_type == '4') {
				redirect('kadiv');
			}
		}else{
			$this->session->set_flashdata('pesan', 'Maaf, kombinasi username dan password salah. Ulangi kembali.');
			redirect('login');
		}
	}

	function keluar(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}