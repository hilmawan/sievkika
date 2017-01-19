
<h3><i class="fa fa-angle-right"></i> Angket Penilaian Karyawan</h3>
<div class="form-panel">
	<div class="row mt">
		<div class="col-lg-12">
				<form action="<?php echo base_url();?>nilai/submit_nilai" method="post">
					<center>
						<div class="alert alert-warning">
						  <p style="text-align:center;">* Skala Penilaian : 1 = Sangat Kurang, 2 = Kurang, 3 = Sedang, 4 = Baik, 5 =  Sangat Baik</p>
							<p style="text-align:center;">Responden <span class="label label-danger"><b>WAJIB</b></span> mengisi kuisioner untuk semua dosen mata kuliah </p>
						</div>		
					</center>
					<select name="kary" class="form-control" required>
						<option disabled="" selected=""><b><i>-- Pilih Karyawan --</i></b></option>
						<?php foreach ($kary as $key) { ?>
							<option value="<?php echo $key->kd_unit.'-'.$key->nik; ?>"><?php echo $key->unit; ?> - <?php echo $key->nama_karyawan; ?></option>
						<?php } ?>
					</select>
					<table class="table">
						<thead>
							<tr>
								<td style="text-align:center" colspan="2"><b>Aspek</b></td>
								<td style="text-align:center" colspan="4"><b>Tingkat Kepuasan</b></td>
							</tr>
						</thead>
						<tbody>
						<?php $b = 100; $no = 1; $abjad= 'A'; foreach ($topik as $row) { ?>
							<tr>
								<td><b><?php echo $abjad; ?></b><hr></td>
								<td colspan="6"><b><?php echo $row->topik; ?></b><hr></td>
							</tr>
							<?php  
							$noto = 1;
							$a = $this->m_nilai->getdetail($row->kd_topik)->result();
							foreach ($a as $value) { ?>
							<input type="hidden" name="parameter<?php echo $no; ?>" value="<?php echo $value->id_parameter; ?>"/>
							<tr>
								<td><?php echo $noto; ?></td>
								<td style="width: 700px;"><?php echo $value->parameter; ?></td>
							
							<?php foreach ($skala as $key) { ?>
										<td>
											<p>
											    <input class="with-gap" name="nilai<?php echo $no; ?>" type="radio" value="<?php echo $key->keterangan; ?>" id="fuck<?php echo $b; ?>"/>
											    <label for="fuck<?php echo $b; ?>"><?php echo $key->skala; ?></label>
											</p>
										</td>
									<?php $b++;  } ?>
								<?php $no++; $noto++; } ?>
							<?php $abjad++; } ?>
							</tr>
						</tbody>
					</table>
					<center>
						<button class="btn btn-warning" type="submit"><i class="mdi-content-send right"></i>Submit</button>
						<button class="btn btn-success" type="reset"><i class="mdi-action-cached right"></i>Reset</button>						
					</center>
				</form>
		</div>
	</div>
</div>