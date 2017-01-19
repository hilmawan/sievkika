<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('user_type')!='1'){
			echo "
                <script>alert('Maaf, akses tidak diijinkan.')</script>
                <script>window.location='/sinipres/login'</script>
            ";
		}
	}

	function index()
	{
		//echo "ini halaman admin";
		$data['page'] = 'v_home';
		$this->load->view('template', $data);
	}
	
	function jabatan()
	{
		$data['getData'] = $this->app_model->getdata('tbl_jabatan','id_jabatan','asc')->result();
		$data['page'] = 'data/jabatan_view';
		$this->load->view('template', $data);		
	}

	function jabatansave()
	{
		$data['jabatan'] = $this->input->post('jabatan', TRUE);
		$data['kd_jabatan'] = $this->input->post('kode', TRUE);
		$q = $this->app_model->insertdata('tbl_jabatan',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/jabatan';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function jabatanedit($id)
	{
		$data['getEdit'] = $this->app_model->getdetail('tbl_jabatan','id_jabatan',$id,'id_jabatan','asc')->row();
		$this->load->view('data/jabatan_edit',$data);
	}

	function jabatanupdate()
	{
		$data['jabatan'] = $this->input->post('jabatan', TRUE);
		$data['kd_jabatan'] = $this->input->post('kode', TRUE);
		$q = $this->app_model->updatedata('tbl_jabatan','id_jabatan',$this->input->post('id'),$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/jabatan';</script>";
		} else {
			echo "<script>alert('Gagal Edit Data');history.go(-1);</script>";
		}	
	}

	function jabatandelete($id)
	{
		$q = $this->app_model->deletedata('tbl_jabatan','id_jabatan',$id);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/jabatan';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}	
	}

	//karyawan

	function karyawan()
	{
		$data['getData'] = $this->app_model->getdetail('tbl_karyawan','kd_jabatan','dsn','id_dosen','asc')->result();
		$data['getDataJabatan'] = $this->app_model->getdata('tbl_jabatan','id_jabatan','asc')->result();
		$data['page'] = 'data/karyawan_view';
		$this->load->view('template', $data);		
	}

	function karyawansave()
	{
		$data['nik'] = $this->input->post('nik', TRUE);
		$data['nama_karyawan'] = $this->input->post('nama', TRUE);
		$data['telepon'] = $this->input->post('tlp', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		$data['kd_jabatan'] = $this->input->post('jabatan', TRUE);
		$data['status'] = 1;
		$q = $this->app_model->insertdata('tbl_karyawan',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/karyawan';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function karyawanedit($id)
	{
		$data['getDataJabatan'] = $this->app_model->getdata('tbl_jabatan','id_jabatan','asc')->result();
		$data['getEdit'] = $this->app_model->getdetail('tbl_karyawan','id_dosen',$id,'id_dosen','asc')->row();
		$this->load->view('data/karyawan_edit',$data);
	}

	function karyawanupdate()
	{
		$data['nik'] = $this->input->post('nik', TRUE);
		$data['nama_karyawan'] = $this->input->post('nama', TRUE);
		$data['telepon'] = $this->input->post('tlp', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		$data['kd_jabatan'] = $this->input->post('jabatan', TRUE);
		$data['status'] = 1;
		$q = $this->app_model->updatedata('tbl_karyawan','id_dosen',$this->input->post('id'),$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/karyawan';</script>";
		} else {
			echo "<script>alert('Gagal Edit Data');history.go(-1);</script>";
		}	
	}

	function karyawandelete($id)
	{
		$q = $this->app_model->deletedata('tbl_karyawan','id_dosen',$id);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/karyawan';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}	
	}

	//mahasiswa

	function mahasiswa()
	{
		$data['getData'] = $this->app_model->getdata('tbl_mahasiswa','nim','asc')->result();
		$data['getDataFakultas'] = $this->app_model->getdata('tbl_fakultas','kd_fakultas','asc')->result();
		$data['getDataJurusan'] = $this->app_model->getdata('tbl_jurusan','kd_jurusan','asc')->result();
		$data['page'] = 'data/mahasiswa_view';
		$this->load->view('template', $data);		
	}

	function mahasiswaedit($id)
	{
		$data['getDataFakultas'] = $this->app_model->getdata('tbl_fakultas','kd_fakultas','asc')->result();
		$data['getDataJurusan'] = $this->app_model->getdata('tbl_jurusan','kd_jurusan','asc')->result();
		$data['getEdit'] = $this->app_model->getdetail('tbl_mahasiswa','id_mhs',$id,'id_mhs','asc')->row();
		$this->load->view('data/mahasiswa_edit',$data);
	}

	function mahasiswasave()
	{
		$data['nim'] = $this->input->post('nim', TRUE);
		$data['nama_mhs'] = $this->input->post('nama', TRUE);
		$data['telepon'] = $this->input->post('tlp', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		$data['kd_jurusan'] = $this->input->post('jurusan', TRUE);
		$data['jenis_kelas'] = $this->input->post('kelas', TRUE);
		$data['status'] = 1;
		$q = $this->app_model->insertdata('tbl_mahasiswa',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/mahasiswa';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function mahasiswaupdate()
	{
		$data['nim'] = $this->input->post('nim', TRUE);
		$data['nama_mhs'] = $this->input->post('nama', TRUE);
		$data['telepon'] = $this->input->post('tlp', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		$data['kd_jurusan'] = $this->input->post('jurusan', TRUE);
		$data['jenis_kelas'] = $this->input->post('kelas', TRUE);
		$data['status'] = 1;
		$q = $this->app_model->updatedata('tbl_mahasiswa','id_mhs',$this->input->post('id'),$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/mahasiswa';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function mahasiswadelete($id)
	{
		$q = $this->app_model->deletedata('tbl_mahasiswa','id_mhs',$id);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/mahasiswa';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}	
	}

	//matakuliah

	function matakuliah()
	{
		$data['getData'] = $this->app_model->getdata('tbl_matakuliah','kd_mk','asc')->result();
		$data['getDataFakultas'] = $this->app_model->getdata('tbl_fakultas','kd_fakultas','asc')->result();
		$data['getDataJurusan'] = $this->app_model->getdata('tbl_jurusan','kd_jurusan','asc')->result();
		$data['page'] = 'perkuliahan/matakuliah_view';
		$this->load->view('template', $data);		
	}

	function matakuliahedit($id)
	{
		$data['getDataFakultas'] = $this->app_model->getdata('tbl_fakultas','kd_fakultas','asc')->result();
		$data['getDataJurusan'] = $this->app_model->getdata('tbl_jurusan','kd_jurusan','asc')->result();
		$data['getEdit'] = $this->app_model->getdetail('tbl_matakuliah','id_mk',$id,'id_mk','asc')->row();
		$this->load->view('perkuliahan/matakuliah_edit',$data);
	}

	function matakuliahsave()
	{
		$data['kd_mk'] = $this->input->post('kode', TRUE);
		$data['matakuliah'] = $this->input->post('mk', TRUE);
		$data['sks'] = $this->input->post('sks', TRUE);
		$data['semester'] = $this->input->post('semester', TRUE);
		$data['kd_jurusan'] = $this->input->post('jurusan', TRUE);
		$q = $this->app_model->insertdata('tbl_matakuliah',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/matakuliah';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function matakuliahupdate()
	{
		$data['kd_mk'] = $this->input->post('kode', TRUE);
		$data['matakuliah'] = $this->input->post('mk', TRUE);
		$data['sks'] = $this->input->post('sks', TRUE);
		$data['semester'] = $this->input->post('semester', TRUE);
		$data['kd_jurusan'] = $this->input->post('jurusan', TRUE);
		$q = $this->app_model->updatedata('tbl_matakuliah','id_mk',$this->input->post('id'),$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/matakuliah';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function matakuliahdelete($id)
	{
		$q = $this->app_model->deletedata('tbl_matakuliah','id_mk',$id);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/matakuliah';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}	
	}

	//dosen ajar

	function jadwal()
	{
		$data['getData'] = $this->app_model->getdata('tbl_jadwal_matakuliah','id_jadwal','asc')->result();
		$data['getDataMk'] = $this->app_model->getdata('tbl_matakuliah','kd_mk','asc')->result();
		$data['getDataDosen'] = $this->app_model->getdetail('tbl_karyawan','kd_jabatan','dsn','nik','asc')->result();
		$data['page'] = 'perkuliahan/jadwal_view';
		$this->load->view('template', $data);		
	}

	function jadwaledit($id)
	{
		$data['getDataMk'] = $this->app_model->getdata('tbl_matakuliah','kd_mk','asc')->result();
		$data['getDataDosen'] = $this->app_model->getdetail('tbl_karyawan','kd_jabatan','dsn','nik','asc')->result();
		$data['getEdit'] = $this->app_model->getdetail('tbl_jadwal_matakuliah','id_jadwal',$id,'id_jadwal','asc')->row();
		$this->load->view('perkuliahan/jadwal_edit',$data);
	}

	function jadwalsave()
	{
		$data['nidn'] = $this->input->post('dosen', TRUE);
		$data['kd_mk'] = $this->input->post('mk', TRUE);
		$data['hari'] = $this->input->post('hari', TRUE);
		$data['jam_mulai'] = $this->input->post('mulai', TRUE);
		$data['jam_selesai'] = $this->input->post('selesai', TRUE);
		$cektahun = $this->app_model->getdetail('tbl_tahunajaran','status','1','kode','asc')->row();
		$data['tahunajaran'] = $cektahun->kode;
		$q = $this->app_model->insertdata('tbl_jadwal_matakuliah',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/jadwal';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}	
	}

	function jadwaldelete($id)
	{
		$q = $this->app_model->deletedata('tbl_jadwal_matakuliah','id_jadwal',$id);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/jadwal';</script>";
		} else {
			echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		}	
	}

	function jadwalupdate()
	{
		$data['nidn'] = $this->input->post('dosen', TRUE);
		$data['kd_mk'] = $this->input->post('mk', TRUE);
		$data['hari'] = $this->input->post('hari', TRUE);
		$data['jam_mulai'] = $this->input->post('mulai', TRUE);
		$data['jam_selesai'] = $this->input->post('selesai', TRUE);
		$q = $this->app_model->updatedata('tbl_jadwal_matakuliah','id_jadwal',$this->input->post('id'),$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/jadwal';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	//kelas
	function kelas()
	{
		$data['getData'] = $this->app_model->getdata('tbl_jadwal_matakuliah','id_jadwal','asc')->result();
		$data['page'] = 'perkuliahan/kelas_view';
		$this->load->view('template', $data);		
	}

	function kelasedit($id)
	{
		$data['kelas'] = $id;
		$data['getData'] = $this->app_model->getmhskelas($id)->result();
		//var_dump($data);exit();
		$this->load->view('perkuliahan/kelas_edit',$data);
	}

	function kelaslihat($id)
	{
		$data['kelas'] = $id;
		$data['getData'] = $this->app_model->getdetail('tbl_kelas','id_jadwal',$id,'id_jadwal','asc')->result();
		$this->load->view('perkuliahan/kelas_lihat',$data);
	}

	function savekelas()
	{
		$data['id_jadwal'] = $this->input->post('id', TRUE);
		$data['nim'] = $this->input->post('nim', TRUE);
		$q = $this->app_model->insertdata('tbl_kelas',$data);
		if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/kelas';</script>";
		} else {
			echo "<script>alert('Gagal Input Data');history.go(-1);</script>";
		}
	}

	function kelasdelete($id)
	{
		$pecah = explode('zz', $id);
		$q = $this->db->query("delete from tbl_kelas where id_jadwal = ".$pecah[1]." and nim = ".$pecah[0]." ");
		//if ($q == TRUE) {
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin/kelas';</script>";
		//} else {
			//echo "<script>alert('Gagal Hapus Data');history.go(-1);</script>";
		//}	
	}

	function syncmhs()
	{
		$this->db->select('*');
		$this->db->from('tbl_mahasiswa a');
		$this->db->join('tbl_user_login b', 'a.nim = b.username', 'left');
		$this->db->where('username', null);
		$cek = $this->db->get()->result();
		if (count($cek) > 0) {
			foreach ($cek as $key) {
				$data['username'] = trim($key->nim);
				$data['password'] = sha1(md5($data['username']));
				$data['user_type'] = 2;
				$this->app_model->insertdata('tbl_user_login',$data);			
			}
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin';</script>";
		} else {
			echo "<script>alert('selesai');document.location.href='".base_url()."admin';</script>";
		}
	}

	function synckary()
	{
		$this->db->select('*');
		$this->db->from('tbl_karyawan a');
		$this->db->join('tbl_user_login b', 'a.nik = b.username', 'left');
		$this->db->where('username', null);
		$cek = $this->db->get()->result();
		if (count($cek) > 0) {
			foreach ($cek as $key) {
				$data['username'] = trim($key->nik);
				$data['password'] = sha1(md5($data['username']));
				if ($key->kd_jabatan == 'dsn') {
					$data['user_type'] = 3;
				} elseif($key->kd_jabatan == 'spi') {
					$data['user_type'] = 4;
				} else {
					$data['user_type'] = 1;
				}
				$this->app_model->insertdata('tbl_user_login',$data);			
			}
			echo "<script>alert('Berhasil');document.location.href='".base_url()."admin';</script>";
		} else {
			echo "<script>alert('selesai');document.location.href='".base_url()."admin';</script>";
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */