<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadiv extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_nilai');
		// $this->load->model('m_presenter');
		if($this->session->userdata('id_user')==''){
		//if(($this->session->userdata('user_type')!='4') or ($this->session->userdata('user_type')!='2')){
			echo "
                <script>alert('Maaf, akses tidak diijinkan.')</script>
                <script>window.location='/sievkika_web/login'</script>
            ";
		}
	}

	public function index()
	{
		$data['page'] = 'kadiv/v_kadiv';
		$this->load->view('template', $data);
	}

	function fill_point()
	{
		$data['skala'] 	= $this->app_model->getdata('tbl_skala','skala','asc')->result();
		$data['topik'] 	= $this->m_nilai->gettopik()->result();
		$data['kary']	= $this->app_model->getkary()->result();
		$data['page'] 	= 'kadiv/v_isi_nilai';
		$this->load->view('template', $data);
	}

	function submit_nilai()
	{
		$pecah = explode('-', $this->input->post('kary'));
		$hitung = $this->db->query("SELECT COUNT(id_parameter) AS id_parameter FROM tbl_parameter")->row();
		$this->db->query("delete from tbl_nilai_parameter where kd_input = '".md5($pecah[0].$pecah[1].$this->session->userdata('id_user'))."'");
		$this->db->query("delete from tbl_pengisian_kuisioner where kd_input = '".md5($pecah[0].$pecah[1].$this->session->userdata('id_user'))."'");
		//var_dump($this->session->userdata('id_user'));exit();

		#insert data pengisian -> kuisioner
		$data['npm_mahasiswa']	= $this->session->userdata('id_user');
		$data['kd_unit'] 		= $pecah[0];
		$data['date_input'] 	= date('Y-m-d h:i:s');
		$data['nid'] 			= $pecah[1];
		$data['tahuneval'] 		= date('Y');
		$data['kd_input'] 		= md5($pecah[0].$pecah[1].$this->session->userdata('id_user'));

		for ($i=1; $i <= $hitung->id_parameter; $i++) { 
			$data1[] = array(
				'kd_input'		=> $data['kd_input'],
                'parameter_id'	=> $this->input->post('parameter'.$i.'', TRUE),
                'kd_unit' 		=> $pecah[0],
                'nilai'			=> $this->input->post('nilai'.$i.'', TRUE)
				);
		}

		$this->db->insert_batch('tbl_nilai_parameter',$data1);
		// var_dump($data['kd_input']);exit();
		$data['hasil_input'] = $this->saw($data['kd_input']);
		//var_dump($data['hasil_input']);exit();
		$this->app_model->insertdata('tbl_pengisian_kuisioner',$data);
		echo "<script>alert('Berhasil');document.location.href='".base_url()."kadiv';</script>";
	}

	function saw($kode)
	{
		//die($kode);	
		$q = $this->app_model->sawtunggal($kode);
		$hasil = 0;
		foreach ($q as $value) {
			$nilai = $value->nilai*$value->bobot;
			$hasil = $hasil+$nilai;
			// die($hasil);
		}
		$hasilakhir = $hasil/100;
		//die($hasil);
		return $hasilakhir;
	}

}

/* End of file Kadiv.php */
/* Location: ./application/controllers/Kadiv.php */