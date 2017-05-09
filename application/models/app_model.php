<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		error_reporting(0);
	}

	function getdata($table,$key,$order)
	{
		$this->db->order_by($key, $order);
		$q = $this->db->get($table);
		return $q;
	}

	function insertdata($table,$data)
	{
		$q = $this->db->insert($table, $data);
		return $q;
	}
	
	function getdetail($table,$pk,$value,$key,$order)
	{
		$this->db->where($pk,$value);
		$this->db->order_by($key, $order);
		$q = $this->db->get($table);
		return $q;
	}

	function updatedata($table,$pk,$value,$data)
	{
		$this->db->where($pk,$value);
		$q = $this->db->update($table, $data);
		return $q;
	}

	function deletedata($table,$pk,$value)
	{
		$this->db->where($pk,$value);
		$q = $this->db->delete($table);
		return $q;
	}

	function sawmethode($id,$tahun)
	{
		$q3 = $this->db->query("SELECT nilai,parameter_id FROM tbl_nilai_parameter WHERE nidn = ".$id." and tahunajaran = '".$tahun."' ")->result();
		$jumlah = $this->db->query("SELECT COUNT(nidn) as nidn FROM tbl_nilai_parameter WHERE nidn = ".$id." and tahunajaran = '".$tahun."' ")->row();
		$kumulatip = 0; 
		foreach ($q3 as $nilai) {
			$q4 = $this->db->query("SELECT MAX(nilai) AS Maks FROM tbl_nilai_parameter WHERE parameter_id = ".$nilai->parameter_id." and tahunajaran = '".$tahun."' ")->row();
			$bobot = $this->db->query("SELECT bobot FROM tbl_parameter WHERE id_parameter = ".$nilai->parameter_id." ")->row();
			$bagi = number_format(($nilai->nilai/100),2);
			$hasil = number_format($bagi*$bobot->bobot,2);
			
			$kumulatip = $kumulatip + $hasil;
			
		}
		$kelas = $this->db->query("select id_jadwal from tbl_jadwal_matakuliah where nidn = '".$id."' and tahunajaran='".$tahun."' ")->result();
		$jumlahmk = 0;
		$datakumulatif = 0;
		foreach ($kelas as $key) {
			$banyakmhs = $this->db->query("select count(nim) as jml_mhs from tbl_kelas where id_jadwal = ".$key->id_jadwal."")->row();
			$banyak = $jumlah->nidn/$banyakmhs->jml_mhs;
			$nyaris = $kumulatip / $banyak;
			$datakumulatif = $datakumulatif + $nyaris;
			$jumlahmk++;
		}
		$data['akhir'] = $datakumulatif/$jumlahmk;
		//$data['nidn'] = $id;
		//$this->db->insert('tbl_hasil_saw', $data);
		return number_format($data['akhir'],2);
	}

	function sawmethodemk($id,$tahun,$mk)
	{
		$q3 = $this->db->query("SELECT nilai,parameter_id FROM tbl_nilai_parameter WHERE nidn = ".$id." and tahunajaran = '".$tahun."' and kd_mk = '".$mk."'")->result();
		$jumlah = $this->db->query("SELECT COUNT(nidn) as nidn FROM tbl_nilai_parameter WHERE nidn = ".$id." and tahunajaran = '".$tahun."' and kd_mk = '".$mk."' ")->row();
		$kumulatip = 0; 
		foreach ($q3 as $nilai) {
			$q4 = $this->db->query("SELECT MAX(nilai) AS Maks FROM tbl_nilai_parameter WHERE parameter_id = ".$nilai->parameter_id." and tahunajaran = '".$tahun."' and kd_mk = '".$mk."' ")->row();
			$bobot = $this->db->query("SELECT bobot FROM tbl_parameter WHERE id_parameter = ".$nilai->parameter_id." ")->row();
			$bagi = number_format(($nilai->nilai/100),2);
			$hasil = number_format($bagi*$bobot->bobot,2);
			
			$kumulatip = $kumulatip + $hasil;
			
		}
		$kelas = $this->db->query("select id_jadwal from tbl_jadwal_matakuliah where nidn = '".$id."' and tahunajaran='".$tahun."' and kd_mk = '".$mk."' ")->result();
		$jumlahmk = 0;
		$datakumulatif = 0;
		foreach ($kelas as $key) {
			$banyakmhs = $this->db->query("select count(nim) as jml_mhs from tbl_kelas where id_jadwal = ".$key->id_jadwal."")->row();
			$banyak = $jumlah->nidn/$banyakmhs->jml_mhs;
			$nyaris = $kumulatip / $banyak;
			$datakumulatif = $datakumulatif + $nyaris;
			$jumlahmk++;
		}
		$data['akhir'] = $datakumulatif/$jumlahmk;
		//$data['nidn'] = $id;
		//$this->db->insert('tbl_hasil_saw', $data);
		return number_format($data['akhir'],2);
	}

	function sawmethodemkkelas($id,$tahun,$mk,$idj)
	{
		$q3 = $this->db->query("SELECT nilai,parameter_id FROM tbl_nilai_parameter WHERE nidn = ".$id." and tahunajaran = '".$tahun."' and kd_mk = '".$mk."' and id_jadwal = ".$idj." ")->result();
		$jumlah = $this->db->query("SELECT COUNT(distinct nidn) as nidn FROM tbl_nilai_parameter WHERE nidn = ".$id." and tahunajaran = '".$tahun."' and kd_mk = '".$mk."' and id_jadwal = ".$idj." ")->row();
		$kumulatip = 0; 
		foreach ($q3 as $nilai) {
			$q4 = $this->db->query("SELECT MAX(nilai) AS Maks FROM tbl_nilai_parameter WHERE parameter_id = ".$nilai->parameter_id." and tahunajaran = '".$tahun."' and kd_mk = '".$mk."' and id_jadwal = ".$idj." ")->row();
			$bobot = $this->db->query("SELECT bobot FROM tbl_parameter WHERE id_parameter = ".$nilai->parameter_id." ")->row();
			$bagi = number_format(($nilai->nilai/100),2);
			$hasil = number_format($bagi*$bobot->bobot,2);
			
			$kumulatip = $kumulatip + $hasil;
			
		}
		$kelas = $this->db->query("select id_jadwal from tbl_jadwal_matakuliah where nidn = '".$id."' and tahunajaran='".$tahun."' and kd_mk = '".$mk."' and id_jadwal = ".$idj." ")->result();
		$jumlahmk = 0;
		$datakumulatif = 0;
		foreach ($kelas as $key) {
			$banyakmhs = $this->db->query("select count(distinct nim) as jml_mhs from tbl_kelas where id_jadwal = ".$key->id_jadwal."")->row();
			$banyak = $jumlah->nidn/$banyakmhs->jml_mhs;
			$nyaris = $kumulatip / $banyak;
			$datakumulatif = $datakumulatif + $nyaris;
			$jumlahmk++;
		}
		$data['akhir'] = $datakumulatif/$jumlahmk;
		//$data['nidn'] = $id;
		//$this->db->insert('tbl_hasil_saw', $data);
		//var_dump($jumlah);exit();
		return number_format($data['akhir'],2);
	}

	function nilaiparam($idn,$param)
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai_parameter');
		$this->db->where('parameter_id', $param);
		$this->db->where('nidn', $idn);
		
		$q = $this->db->get()->result();
		return $q;
	}

	function getdosentahunajaran($id)
	{
		$this->db->distinct();
		$this->db->select('nik,tahunajaran,nama_karyawan');
		$this->db->from('tbl_jadwal_matakuliah a');
		//$this->db->join('tbl_matakuliah b', 'a.kd_mk = b.kd_mk');
		$this->db->join('tbl_karyawan c', 'a.nidn = c.nik');
		$this->db->where('a.nidn', $id);
		//$this->db->like('a.tahunajaran', $tahun);
		return $this->db->get();
	}

	function getdosenajar($id,$tahun)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_matakuliah a');
		$this->db->join('tbl_matakuliah b', 'a.kd_mk = b.kd_mk');
		$this->db->join('tbl_karyawan c', 'a.nidn = c.nik');
		$this->db->where('a.nidn', $id);
		$this->db->like('a.tahunajaran', $tahun);
		return $this->db->get();
	}

	function getmhskelas($id)
	{
		$sql = "SELECT * FROM tbl_mahasiswa e WHERE e.`nim` NOT IN(SELECT c.`nim` FROM tbl_jadwal_matakuliah a
				JOIN tbl_kelas b ON a.id_jadwal = b.`id_jadwal`
				JOIN tbl_mahasiswa c ON b.`nim` = c.`nim`
				WHERE a.id_jadwal = ".$id.")";
		$q = $this->db->query($sql);
		return $q;
	}

	function sawtunggal($kode)
	{
		$sql = "SELECT a.parameter_id,a.nilai,b.bobot,b.final_weight FROM tbl_nilai_parameter a
				JOIN tbl_parameter b ON a.`parameter_id` = b.`id_parameter`
				WHERE a.`kd_input` = '".$kode."'";
		return $this->db->query($sql)->result();
	}

	function cekmhskelas($nim,$kelas)
	{
		$this->db->where('nim', $nim);
		$this->db->where('id_jadwal', $kelas);
		$q = $this->db->get('tbl_kelas');
		return $q;
	}

	function kelasmhs($nim)
	{
		$cektahun = $this->app_model->getdetail('tbl_tahunajaran','status','1','kode','asc')->row();
		$sql = "SELECT * FROM tbl_jadwal_matakuliah a
				JOIN tbl_kelas b ON a.`id_jadwal` = b.`id_jadwal`
				JOIN tbl_karyawan c ON a.`nidn` = c.`nik`
				JOIN tbl_matakuliah d ON a.`kd_mk` = d.`kd_mk`
				WHERE b.`nim` = '".$nim."' AND a.`tahunajaran` = '".$cektahun->kode."'";
		return $this->db->query($sql)->result();
	}

	function getkary()
	{
		$this->db->select('a.nama_karyawan,b.kd_unit,b.unit,a.nik')
				->from('tbl_karyawan a')
				->join('tbl_unit b','a.kd_unit = b.kd_unit')
				->where('kd_jabatan','stf')
				->where('a.kd_unit',$this->session->userdata('kd_unit'));
		return $this->db->get();
	}

	function getdatakary()
	{
		$this->db->select('a.nama_karyawan,a.id,a.nik,b.unit,c.jabatan,a.telepon,a.email,a.status')
				->from('tbl_karyawan a')
				->join('tbl_unit b','a.kd_unit = b.kd_unit')
				->join('tbl_jabatan c','a.kd_jabatan = c.kd_jabatan');
		return $this->db->get();
	}

	function loadeditkary($id)
	{
		$this->db->select('*')
				->from('tbl_karyawan')
				->where('id',$id);
		return $this->db->get();
	}

	function hitungmhs($mk,$tahun)
	{
		$sql = $this->db->query("SELECT id_jadwal FROM tbl_jadwal WHERE kd_mk = '".$mk."' AND tahunajaran = '".$tahun."'")->row();
        return $sql1 = $this->db->query("SELECT COUNT(nim) as jml FROM tbl_kelas WHERE id_jadwal = ".$sql->id_jadwal." ")->row(); 
	}

	function nilaimax()
	{
		return $this->db->query("SELECT * from tbl_nilai_parameter")->result();
	}

	function loadevalperson()
	{
		return $this->db->query("SELECT DISTINCT a.kd_input,a.usr,b.unit,a.tgl_input,c.nama_karyawan,c.nik FROM tbl_nilai_parameter a 
							JOIN tbl_unit b ON a.kd_unit = b.kd_unit
							JOIN tbl_karyawan c ON c.nik = a.usr");
	}

	function lookval($kd)
	{
		return $this->db->select('nilai,parameter,nama_karyawan')
						->from('tbl_nilai_parameter a')
						->join('tbl_parameter b','a.parameter_id = b.id_parameter')
						->join('tbl_karyawan c','c.nik = a.usr')
						->where('kd_input',$kd)
						->get();
	}

	function countemploye($unit)
	{
		return $this->db->query("SELECT count(nik) as jum from tbl_karyawan where kd_unit = '".$unit."' and kd_jabatan = 'stf'")->row()->jum;
	}

	function countvalue($un)
	{
		return $this->db->query("SELECT count(distinct kd_input) as jums from tbl_nilai_parameter where kd_unit = '".$un."'")->row()->jums;
	}

	function foreval($unt,$p)
	{
		return $this->db->query("SELECT max(nilai) as max from tbl_nilai_parameter where kd_unit = '".$unt."' and parameter_id = '".$p."'")->row()->max;
	}

	function muataja($id,$kd)
	{
		return $this->db->query("SELECT a.nilai, b.final_weight, a.kd_input from tbl_nilai_parameter a join tbl_parameter b on a.parameter_id = b.id_parameter where a.parameter_id = '".$id."' and a.kd_unit = '".$kd."'")->result();
	}

	
}

/* End of file app_model.php */
/* Location: ./application/models/app_model.php */