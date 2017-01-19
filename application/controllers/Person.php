<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('user_type')==''){
			echo "
                <script>alert('Maaf, akses tidak diijinkan.')</script>
                <script>window.location='/sinipres/login'</script>
            ";
		}
	}

	public function index()
	{
		$data['page'] = 'person/v_person';
		$this->load->view('template', $data);	
	}

}

/* End of file Person.php */
/* Location: ./application/controllers/Person.php */