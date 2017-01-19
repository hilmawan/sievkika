<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Nilai extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_nilai');
		$this->load->model('m_presenter');
		if($this->session->userdata('id_user')==''){
		//if(($this->session->userdata('user_type')!='4') or ($this->session->userdata('user_type')!='2')){
			echo "
                <script>alert('Maaf, akses tidak diijinkan.')</script>
                <script>window.location='/sievkika_web/login'</script>
            ";
		}
	}

	function index()
	{
		//die($this->session->userdata('id_user'));
		$id = $this->session->userdata('id_user');
		$data['title'] = 'Pengisian Kuisioner Evaluasi Belajar Mengajar';
		$data['topik'] = $this->m_nilai->gettopik()->result();
		$data['skala'] = $this->app_model->getdata('tbl_skala','skala','asc')->result();
		$data['kary']	= $this->app_model->getkary()->result();
		$data['dosen'] = $this->app_model->kelasmhs($id);
		//var_dump($data['dosen']);exit();
		$this->load->view('v_nilai2', $data);
	}

	function submit_nilai()
	{
		$pecah = explode('-', $this->input->post('kary'));
		// var_dump($this->input->post('kary').'-'.$pecah[0].'-'.$pecah[1]);exit();
		$hitung = $this->db->query("SELECT COUNT(id_parameter) AS id_parameter FROM tbl_parameter")->row();
		$this->db->query("delete from tbl_nilai_parameter where kd_input = '".md5($pecah[0].$pecah[1].$this->session->userdata('id_user'))."'");
		$this->db->query("delete from tbl_pengisian_kuisioner where kd_input = '".md5($pecah[0].$pecah[1].$this->session->userdata('id_user'))."' and tahuneval = '".date('Y')."'");
		//var_dump($this->session->userdata('id_user'));exit();

		#insert data pengisian -> kuisioner
		$data['user_input']	= $this->session->userdata('id_user');
		$data['kd_unit'] 		= $pecah[0];
		$data['date_input'] 	= date('Y-m-d h:i:s');
		$data['nik'] 			= $pecah[1];
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

	//metode saw
	function metodesaw()
	{
		//hitung jumlah dosen dan pecah dosen siapa aja dan bikin kode
		$q2 = $this->db->query("SELECT DISTINCT nidn FROM tbl_nilai_parameter")->result();
		$a = 'A1';
		foreach ($q2 as $key) {
			echo "<br/>";
			echo $key->nidn." = ".$a;
			echo "<br/>";
			$q3 = $this->db->query("SELECT nilai,parameter_id FROM tbl_nilai_parameter WHERE nidn = ".$key->nidn." ")->result();
			$kumulatip = 0; 
			foreach ($q3 as $nilai) {
				echo $nilai->nilai." | saw = ";
				$q4 = $this->db->query("SELECT MAX(nilai) AS Maks FROM tbl_nilai_parameter WHERE parameter_id = ".$nilai->parameter_id." ")->row();
				$bobot = $this->db->query("SELECT bobot FROM tbl_parameter WHERE parameter_id = ".$nilai->parameter_id." ")->row();
				$bagi = number_format(($nilai->nilai/$q4->Maks),2);
				$hasil = number_format($bagi*$bobot->bobot,2);
				echo $hasil;
				echo "<br/>";
				$kumulatip = $kumulatip + $bagi;
				
				//insert ke table hasil perhitungan saw
				//$this->db->insert('', $data);
			}
			echo "Hasil Akhir = ".number_format($kumulatip,2);
			echo "<br/>";
			$a++;
		}
	}

	function gen_weight()
	{
		$this->db->select('*');
		$this->db->from('tbl_parameter');
		$this->db->order_by('index', 'asc');
		$arr=$this->db->get()->result();
		// var_dump($arr->jums);
		echo "<table border='1'>
			<tbody>";
		for ($i=1; $i <= 25 ; $i++) { 
			echo "<tr>";
			echo "<td>Y".$i."</td>";
			foreach ($arr as $isi) {
				if ($i == $isi->index) {
					$y_awal = $isi->bobot;
				}
				// var_dump($y_awal);
				if ($i == $isi->index) {
					$hasil = 0;
					$hasil = abs(1/(1+($isi->bobot - $y_awal)));
					$cs_ogut = number_format($hasil,2);
					echo "<td style='background:cyan'>".$cs_ogut."</td>";
					$puskom[$i][$isi->index] = $cs_ogut;
				} elseif ($i < $isi->index) {
					$hasil = 0;
					$hasil = abs(1/(1+($isi->bobot - $y_awal)));
					$cs_ogut = number_format($hasil,2);
					// echo "<td>".$y_awal."-".$isi->bobot."-".$cs_ogut."</td>";
					echo "<td>".$cs_ogut."</td>";
					$puskom[$i][$isi->index] = $cs_ogut;
				} elseif ($i > $isi->index) {
					$this->db->select('*');
					$this->db->from('tbl_parameter');
					$this->db->where('index !=', 1);
					$this->db->order_by('index', 'asc');
					$rr=$this->db->get()->result();
					foreach ($rr as $lue) {
						if ($i == $lue->index) {
							$y_awal = $lue->bobot;
						}
					}
					$hasil = 0;
					$hasil = abs(1+($y_awal - $isi->bobot)/1);
					$cs_ogut = number_format($hasil,2);
					// echo "<td>".$y_awal."-".$lue->bobot."-".$cs_ogut."</td>";
					echo "<td>".$cs_ogut."</td>";
					$puskom[$i][$isi->index] = $cs_ogut;
				}
				
			}
			echo "<tr>";
		}
		echo "<tr><td></td>";

		for ($z=1; $z <= 25 ; $z++) { 
			echo "<td>".$z."</td>";
		}
		echo "</tr>";

		echo "<tr>";
		echo "<td>jml</td>";

		foreach ($puskom as $kunci) {
			$jml=0;
			for ($lor=1; $lor <= 25 ; $lor++) {
				if ($lor == $isi->index) {
					$jml = $jml + $kunci[$lor];
				} 
			}
			echo "<td>".$jml."</td>";
			// var_dump($isi->index);
		}

		echo "<tr>";

		echo "</tbody>
		</table>
		<br>";

		var_dump($puskom);exit();

	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}