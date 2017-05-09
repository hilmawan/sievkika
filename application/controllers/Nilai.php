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
		$hitung = $this->db->query("SELECT COUNT(id_parameter) AS id_parameter FROM tbl_parameter")->row();
		$this->db->query("delete from tbl_nilai_parameter where kd_input = '".md5($pecah[0].$pecah[1].$this->session->userdata('id_user'))."'");
		$this->db->query("delete from tbl_pengisian_kuisioner where kd_input = '".md5($pecah[0].$pecah[1].$this->session->userdata('id_user'))."' and tahuneval = '".date('Y')."'");
        //input nilai parameter
        $data['user_input']     = $this->session->userdata('id_user');
        $data['kd_unit']        = $pecah[0];
        $data['date_input']     = date('Y-m-d h:i:s');
        $data['nik']            = $pecah[1];
        $data['tahuneval']      = date('Y');
        $data['kd_input']       = md5($pecah[0].$pecah[1].$this->session->userdata('id_user'));
        $data['status']         = 0;

		for ($i=1; $i <= $hitung->id_parameter; $i++) { 
			$data1[] = array(
				'kd_input'		=> $data['kd_input'],
                'parameter_id'	=> $this->input->post('parameter'.$i.'', TRUE),
                'kd_unit' 		=> $pecah[0],
                'nilai'			=> $this->input->post('nilai'.$i.'', TRUE)
				);
		}

		$this->db->insert_batch('tbl_nilai_parameter',$data1);
        $data['hasil_input']    = $this->saw($data['kd_input']);
        $this->app_model->insertdata('tbl_pengisian_kuisioner',$data);
		// var_dump($data['kd_input']);exit();
        $hoo = 0;
        $c = $this->app_model->countemploye($pecah[0]);
        $h = $this->app_model->countvalue($pecah[0]);
        $avgparam = $this->db->query("SELECT parameter_id from tbl_nilai_parameter")->result(); 
        foreach ($avgparam as $lue) {
            $maxval = $this->app_model->foreval($pecah[0],$lue->parameter_id);
            $param = $this->app_model->muataja($lue->parameter_id,$pecah[0]);
            foreach ($param as $p) {
                $hit = (($p->nilai*$p->final_weight)/$maxval)*10;
                $hoo = $hoo+$hit;                
            }
        }
        $dats = array(
            'hasil_input'   => number_format($hoo,2)
            );
        $this->app_model->updatedata('tbl_pengisian_kuisioner','kd_input',$data['kd_input'],$dats);
        if ($c == $h) {
            $dats = array(
                'status'        => 1
                );
            $this->app_model->updatedata('tbl_pengisian_kuisioner','kd_input',$data['kd_input'],$dats);
        }

        echo "<script>alert('Berhasil');document.location.href='".base_url()."kadiv';</script>";
	}

	function saw($kode)
	{
		//die($kode);	
		$q = $this->app_model->sawtunggal($kode);

		$hasil = 0;
		foreach ($q as $value) {
            $nilai = $value->nilai*$value->final_weight;
            $hasil = $hasil+$nilai;
			// die($hasil);
		}
		$hasilakhir = $hasil*100;
		//die($hasil);
		return $hasilakhir;
	}

	

	function gen_weight()
	{
		$this->db->select('*');
        $this->db->from('tbl_parameter');
        $this->db->order_by('index', 'asc');
        $arr=$this->db->get()->result();
        // var_dump(count($arr->index));exit();
        // echo "<table border='1'>
        //     <tbody>";
        for ($i=1; $i <= 25 ; $i++) {
            // echo "<tr>";
            // echo "<td>Y".$i."</td>";
            foreach ($arr as $isi) {
                if ($i == $isi->index) {
                    $y_awal = $isi->bobot;
                }
                // var_dump($y_awal);
                if ($i == $isi->index) {
                    $hasil = 0;
                    $hasil = abs(1/(1+($isi->bobot - $y_awal)));
                    $cs_ogut = number_format($hasil,2);
                    // echo "<td style='background:cyan'>".$cs_ogut."</td>";
                    $puskom[$i][$isi->index] = $cs_ogut;
                } elseif ($i < $isi->index) {
                    $hasil = 0;
                    $hasil = abs(1/(1+($isi->bobot - $y_awal)));
                    $cs_ogut = number_format($hasil,2);
                    // echo "<td>".$y_awal."-".$isi->bobot."-".$cs_ogut."</td>";
                    // echo "<td>".$cs_ogut."</td>";
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
                //    // echo "<td>".$y_awal."-".$lue->bobot."-".$cs_ogut."</td>";
                    // echo "<td>".$cs_ogut."</td>";
                    $puskom[$i][$isi->index] = $cs_ogut;
                }
               
            }
            // echo "</tr>";
        }

        // echo "<tr>";
        // echo "<td style='background:cyan'>jml</td>";
        for ($i=1; $i < 26; $i++) {
            $a = $i;
            $jumlah[$a] = 0;
            for ($b=1; $b < 26; $b++) {
                $jumlah[$a] = $jumlah[$a]+$puskom[$b][$a];
            }
            // echo "<td style='background:cyan'>".$jumlah[$a]."</td>";
            $ini[$a] = $jumlah[$a];
            // var_dump($jumlah);
        }
        // echo "</tr>";

        for ($g=1; $g < 26; $g++) {
            // $gj = $g;
            // $hasil = 0;
            // echo "<tr>";
            // echo "<td>Y".$g."</td>";
            for ($uu=1; $uu < 26; $uu++) {
                $hasil = $puskom[$g][$uu] / $ini[$uu];
                // var_dump($puskom);
                // echo "<td>".number_format($hasil,3)."</td>";
                $maybe[$g][$uu] = $hasil;
            }
            $nol = 0;
            // var_dump(count($arr->index));
            for ($zx=1; $zx < 26; $zx++) {
                $nol = $nol + $maybe[$g][$zx];
            }
            $end = number_format(($nol/25),4);
            // echo "<td>".$end."</td>";
            // echo "</tr>";
            $float = floatval($end);
            $qq[$g] = $float;

        }

        $cari = $this->db->query("SELECT max(id_parameter) as mx, min(id_parameter) as mn from tbl_parameter")->row();
        $max = number_format($cari->mx);
        $min = number_format($cari->mn);

        for ($k=$min; $k < $max+1; $k++) {
        	$per[] = $k;
       	}

    	for ($ox=1; $ox < 26; $ox++) { 
    		$this->db->query("UPDATE tbl_parameter set final_weight = ".$qq[$ox]." where id_parameter = ".$per[$ox-1]."");
    	}

        // echo "</tbody>
        // </table>
        // <br>";
        echo "<script>alert('Generate Selesai!');history.go(-1);</script>";
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}