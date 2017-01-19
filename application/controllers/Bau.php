<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bau extends CI_Controller {

	public function index()
	{
		$data['page'] = 'bau/v_bau_index';
		$this->load->view('template', $data);
	}

	function data_kary()
	{
		$data['query'] = $this->app_model->getdatakary()->result();
		$data['unit'] = $this->db->get('tbl_unit')->result();
		$data['jabs'] = $this->db->get('tbl_jabatan')->result();
		$data['page'] = 'bau/v_bau';
		$this->load->view('template', $data);
	}

	function add_kary()
	{
		$data = array(
			'nik'			=> $this->input->post('nik'),
			'nama_karyawan'	=> $this->input->post('nama'),
			'telepon'		=> $this->input->post('tlp'),
			'email'			=> $this->input->post('email'),
			'kd_jabatan'	=> $this->input->post('jabs'),
			'status'		=> 1,
			'kd_unit'		=> $this->input->post('unit')
			);
		// var_dump($data);exit();
		$this->app_model->insertdata('tbl_karyawan',$data);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_kary';</script>";
	}

	function delkary($id)
	{
		$this->app_model->deletedata('tbl_karyawan','id',$id);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_kary';</script>";
	}

	function load($id)
	{
		$data['unit'] = $this->db->get('tbl_unit')->result();
		$data['jabs'] = $this->db->get('tbl_jabatan')->result();
		$data['dats'] = $this->app_model->loadeditkary($id)->row();
		$this->load->view('bau/v_load_kary', $data); 
	}

	function update_kary()
	{
		$data = array(
			'nik'			=> $this->input->post('nik'),
			'nama_karyawan'	=> $this->input->post('nama'),
			'telepon'		=> $this->input->post('tlp'),
			'email'			=> $this->input->post('email'),
			'kd_jabatan'	=> $this->input->post('jabs'),
			'status'		=> $this->input->post('sts'),
			'kd_unit'		=> $this->input->post('unit')
			);
		$this->app_model->updatedata('tbl_karyawan','id',$this->input->post('id'),$data);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_kary';</script>";
	}

	function data_unit()
	{
		$data['unit'] = $this->db->get('tbl_unit')->result();
		$data['page'] = 'bau/v_list_unit';
		$this->load->view('template', $data);
	}

	function add_unit()
	{
		$data = array(
			'kd_unit'	=> $this->input->post('kode'),
			'unit'		=> $this->input->post('unit')
			);
		$this->db->insert('tbl_unit', $data);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_unit';</script>";
	}

	function load_unit($id)
	{
		$data['muat'] = $this->db->where('id', $id)->get('tbl_unit')->row();
		$this->load->view('bau/v_load_unit', $data);
	}

	function update_unit()
	{
		$data = array(
			'kd_unit'	=> $this->input->post('kode'),
			'unit'		=> $this->input->post('unit')
			);
		$this->app_model->updatedata('tbl_unit','id',$this->input->post('id'),$data);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_unit';</script>";
	}

	function delunit($id)
	{
		$this->app_model->deletedata('tbl_unit','id',$id);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_unit';</script>";
	}

	function data_jabatan()
	{
		$data['jabs'] = $this->db->get('tbl_jabatan')->result();
		$data['page'] = 'bau/v_list_jabs';
		$this->load->view('template', $data);
	}

	function add_jabs()
	{
		$data = array(
			'kd_jabatan'	=> $this->input->post('kode'),
			'jabatan'		=> $this->input->post('jabs')
			);
		$this->db->insert('tbl_jabatan', $data);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_jabatan';</script>";
	}

	function load_jabs($id)
	{
		$data['muat'] = $this->db->where('id_jabatan', $id)->get('tbl_jabatan')->row();
		$this->load->view('bau/v_load_jabs', $data);
	}

	function update_jabs()
	{
		$data = array(
			'kd_jabatan'	=> $this->input->post('kode'),
			'jabatan'		=> $this->input->post('jabs')
			);
		$this->app_model->updatedata('tbl_jabatan','id_jabatan',$this->input->post('id'),$data);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_jabatan';</script>";
	}

	function deljabs($id)
	{
		$this->app_model->deletedata('tbl_jabatan','id_jabatan',$id);
		echo "<script>alert('Berhasil'); document.location.href='".base_url()."bau/data_jabatan';</script>";
	}

}

/* End of file Bau.php */
/* Location: ./application/controllers/Bau.php */