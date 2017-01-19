<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spi extends CI_Controller {

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
		$data['page'] = 'v_spi';
		$this->load->view('template', $data);
	}

	//topik parameter

	function topik()
	{
		$data['getData'] = $this->app_model->getdata('tbl_topik_parameter','kd_topik','asc')->result();
		$data['page'] = 'parameter/topik_view';
		$this->load->view('template', $data);		
	}

	function topiksave()
	{
		$data['kd_topik'] = $this->input->post('kode', TRUE);
		$data['topik'] = $this->input->post('topik', TRUE);
		$q = $this->app_model->insertdata('tbl_topik_parameter',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/topik';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function topikedit($id)
	{
		$data['getEdit'] = $this->app_model->getdetail('tbl_topik_parameter','id_topik',$id,'kd_topik','asc')->row();
		$this->load->view('parameter/topik_edit',$data);
	}

	function topikupdate()
	{
		$data['kd_topik'] = $this->input->post('kode', TRUE);
		$data['topik'] = $this->input->post('topik', TRUE);
		$q = $this->app_model->updatedata('tbl_topik_parameter','id_topik',$this->input->post('id'),$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/topik';</script>";
		} else {
			echo "<script>alert('Gagal Edit Data');history.go(-1);</script>";
		}
	}

	function topikdelete($id)
	{
		$q = $this->app_model->deletedata('tbl_topik_parameter','id_topik',$id);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/topik';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}
	}

	//parameter

	function parameter()
	{
		$data['getTopik'] = $this->app_model->getdata('tbl_topik_parameter','kd_topik','asc')->result();
		$data['getData'] = $this->app_model->getdata('view_parameter','kd_topik','asc')->result();
		$data['page'] = 'parameter/parameter_view';
		$this->load->view('template', $data);		
	}

	function parametersave()
	{
		$data['kd_topik'] = $this->input->post('kode', TRUE);
		$data['parameter'] = $this->input->post('parameter', TRUE);
		$data['bobot'] = $this->input->post('bobot', TRUE);
		$q = $this->app_model->insertdata('tbl_parameter',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/parameter';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function parameteredit($id)
	{
		$data['getTopik'] = $this->app_model->getdata('tbl_topik_parameter','kd_topik','asc')->result();
		$data['getEdit'] = $this->app_model->getdetail('view_parameter','id_parameter',$id,'id_parameter','asc')->row();
		$this->load->view('parameter/parameter_edit',$data);
	}

	function parameterupdate()
	{
		$data['kd_topik'] = $this->input->post('kode', TRUE);
		$data['parameter'] = $this->input->post('parameter', TRUE);
		$data['bobot'] = $this->input->post('bobot', TRUE);
		$q = $this->app_model->updatedata('tbl_parameter','id_parameter',$this->input->post('id'),$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/parameter';</script>";
		} else {
			echo "<script>alert('Gagal Edit Data');history.go(-1);</script>";
		}	
	}

	function parameterdelete($id)
	{
		$q = $this->app_model->deletedata('tbl_parameter','id_parameter',$id);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/parameter';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}	
	}

	function skala()
	{
		$data['getData'] = $this->app_model->getdata('tbl_skala','skala','asc')->result();
		$data['page'] = 'parameter/skala_view';
		$this->load->view('template', $data);	
	}

	function skalasave()
	{
		$data['skala'] = $this->input->post('skala', TRUE);
		$data['keterangan'] = $this->input->post('keterangan', TRUE);
		$q = $this->app_model->insertdata('tbl_skala',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/skala';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function skalaedit($id)
	{
		$data['getEdit'] = $this->app_model->getdetail('tbl_skala','id_skala',$id,'id_skala','asc')->row();
		$this->load->view('parameter/skala_edit',$data);
	}

	function skalaupdate()
	{
		$data['skala'] = $this->input->post('skala', TRUE);
		$data['keterangan'] = $this->input->post('keterangan', TRUE);
		$q = $this->app_model->updatedata('tbl_skala','id_skala',$this->input->post('id'),$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/skala';</script>";
		} else {
			echo "<script>alert('Gagal Edit Data');history.go(-1);</script>";
		}	
	}

	function skaladelete($id)
	{
		$q = $this->app_model->deletedata('tbl_skala','id_skala',$id);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."spi/skala';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}	
	}

	function evalsaw()
	{
		$data['getData'] = $this->db->query("SELECT DISTINCT tahunajaran from tbl_jadwal_matakuliah")->result();
		$data['page'] = 'penilaian/eval_saw';
		$this->load->view('template', $data);	
	}

	function eval_kary()
	{
		if (($this->session->userdata('user_type') == '1') or ($this->session->userdata('user_type') == '3')) {
			$data['getData'] = $this->db->select('a.nik,b.nama_karyawan,a.hasil_input,b.kd_unit,c.unit,a.date_input')
									->from('tbl_pengisian_kuisioner a')
									->join('tbl_karyawan b','a.nik = b.nik')
									->join('tbl_unit c','c.kd_unit = b.kd_unit')
									->get()->result();
		} else {
			$data['getData'] = $this->db->select('a.nik,b.nama_karyawan,a.hasil_input,b.kd_unit,c.unit,a.date_input')
									->from('tbl_pengisian_kuisioner a')
									->join('tbl_karyawan b','a.nik = b.nik')
									->join('tbl_unit c','c.kd_unit = b.kd_unit')
									->where('b.kd_unit',$this->session->userdata('kd_unit'))
									->get()->result();
		}
		$data['page'] = 'penilaian/eval_personal';
		$this->load->view('template', $data);	
	}

	function evaldosenajar($id)
	{
		$pecah = explode('zz', $id);
		$data['sawtahun'] = $this->app_model->sawmethode($pecah[0],$pecah[1]);
		$data['getData'] = $this->app_model->getdosenajar($pecah[0],$pecah[1])->result();
		$data['page'] = 'penilaian/eval_dosen';
		$this->load->view('template', $data);		
	}

	function evaldosentahun($id)
	{
		$data['getData'] = $this->app_model->getdosentahunajaran($id)->result();
		$data['page'] = 'penilaian/eval_tahun';
		$this->load->view('template', $data);		
	}

	function sawlihat($id)
	{
		//$q2 = $this->db->query("SELECT DISTINCT nidn FROM tbl_nilai_parameter")->result();
		//$a = 'A1';
		//foreach ($q2 as $key) {
			//echo "<br/>";
			//echo $key->nidn." = ".$a;
			//echo "<br/>";
			
			//echo "Hasil Akhir = ".number_format($kumulatip,2);
			//echo "<br/>";
			//$a++;
		//}
		$data['tahun'] = $id;
		$data['q2'] = $this->db->query("SELECT DISTINCT nidn,nama_karyawan FROM tbl_jadwal_matakuliah a JOIN tbl_karyawan b on a.nidn = b.nik where tahunajaran = '".$id."'")->result();
		$data['page'] = 'penilaian/saw_lihat';
		$this->load->view('template', $data);	
	}

	function evalbaa()
	{
		$this->db2 = $this->load->database('sia', TRUE);
		$data['getData'] = $this->db2->query("select * from tbl_jurusan_prodi")->result();
		$data['page'] = 'data/prodi_view';
		$this->load->view('template', $data);
	}

	function listtahunajaran($kodeprodi)
	{
		$this->db2 = $this->load->database('sia', TRUE);
		$data['prodi'] = $this->db2->query("select * from tbl_jurusan_prodi where kd_prodi = '".$kodeprodi."'")->row();
		$this->session->set_userdata('kodeprodi',$kodeprodi);
		$data['getData'] = $this->db2->query("select * from tbl_tahunakademik")->result();
		$data['page'] = 'data/ta_view';
		$this->load->view('template', $data);
	}

	function listdosentaprodi($ta,$kodeprodi)
	{
		$this->db2 = $this->load->database('sia', TRUE);
		$data['prodi'] = $this->db2->query("select * from tbl_jurusan_prodi where kd_prodi = '".$kodeprodi."'")->row();
		$data['getData'] = $this->app_model->getdosenajarta($kodeprodi,$ta);
		$this->session->set_userdata('ta',$ta);
		//$this->session->set_userdata('kodeprodi',$kodeprodi);
		$data['page'] = 'data/dosen_view';
		$this->load->view('template', $data);
	}

	function listdosenajartaprodi($nid)
	{
		$this->db2 = $this->load->database('sia', TRUE);
		$data['kry'] = $this->db2->query("select * from tbl_karyawan where nid = '".$nid."'")->row();
		$this->session->set_userdata('nid',$nid);
		$data['getData'] = $this->app_model->getdosenajartaprodi($this->session->userdata('kodeprodi'),$this->session->userdata('ta'),$nid);
		$data['page'] = 'data/dosen_view_detail';
		$this->load->view('template', $data);
	}

	function listdosenajartadetil($kode)
	{
		$this->db2 = $this->load->database('sia', TRUE);
		$data['kry'] = $this->db2->query("select * from tbl_karyawan where nid = '".$this->session->userdata('nid')."'")->row();
		$data['getData'] = $this->app_model->getparametertopik();
		$kdjadwal = $this->db->query("SELECT kd_jadwal FROM tbl_pengisian_kuisioner WHERE id = ".$kode."")->row()->kd_jadwal;
		$this->session->set_userdata('kdjadwal',$kdjadwal);
		//var_dump($data['getData']);exit();
		$data['page'] = 'data/kode_view_detail';
		$this->load->view('template', $data);
	}

	/*function sawmethode($id)
	{
		$q3 = $this->db->query("SELECT nilai,parameter_id FROM tbl_nilai_parameter WHERE nidn = ".$id." ")->result();
		$kumulatip = 0; 
		foreach ($q3 as $nilai) {
			//echo $nilai->nilai." | saw = ";
			$q4 = $this->db->query("SELECT MAX(nilai) AS Maks FROM tbl_nilai_parameter WHERE parameter_id = ".$nilai->parameter_id." ")->row();
			$bagi = number_format(($nilai->nilai/$q4->Maks),2);
			//echo $bagi;
			//echo "<br/>";
			$kumulatip = $kumulatip + $bagi;
			
			//insert ke table hasil perhitungan saw
			//$this->db->insert('', $data);
		}
		echo $kumulatip;
	}*/

	function evallihat($id)
	{
		$pecah = explode('z1', $id);
		//var_dump($pecah);exit();
		$data['idn'] = $pecah[0];
		$data['mk'] = $pecah[1];
		$data['tahun'] = $pecah[2];
		$data['idjad'] = $pecah[3];
		$data['parameter'] = $this->db->query("SELECT DISTINCT parameter_id,kd_mk,tahunajaran FROM tbl_nilai_parameter a JOIN tbl_parameter b ON a.`parameter_id` = b.`id_parameter` WHERE a.`nidn` = '".$pecah[0]."' and a.kd_mk = '".$pecah[1]."' and a.tahunajaran = '".$data['tahun']."' and a.id_jadwal = ".$pecah[3]."")->result();
		$data['jumlah'] = $this->db->query("SELECT DISTINCT nim FROM tbl_nilai_parameter a JOIN tbl_parameter b ON a.`parameter_id` = b.`id_parameter` WHERE a.`nidn` = '".$pecah[0]."' and a.kd_mk = '".$pecah[1]."' and a.tahunajaran = '".$data['tahun']."' and a.id_jadwal = ".$pecah[3]."")->result();
		$data['page'] = 'penilaian/eval_lihat';
		$this->load->view('template', $data);	
	}

	function grafik()
	{
		$data['page'] = 'penilaian/grafik_view';
		$this->load->view('template', $data);		
	}

	function grafik_lihat()
	{
		$data['page'] = 'penilaian/grafik_chart';
		$this->load->view('template', $data);		
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */