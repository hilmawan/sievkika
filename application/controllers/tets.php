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