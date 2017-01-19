<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <?php $kode = $this->app_model->getdetail('tbl_karyawan','nik',$idn,'nik','asc')->row(); ?>
            <h3 class="box-title">Data Evaluasi Dosen <?php echo $kode->nama_karyawan; ?></h3><br>
            <?php if (($this->app_model->sawmethodemk($idn,$tahun,$mk) > 5) and ($this->app_model->sawmethodemk($idn,$tahun,$mk) < 6.5)) {
                    $rank = 'C';
                  } elseif (($this->app_model->sawmethodemk($idn,$tahun,$mk) >= 0) and ($this->app_model->sawmethodemk($idn,$tahun,$mk) <= 3.5)) {
                    $rank = 'E';
                  } elseif (($this->app_model->sawmethodemk($idn,$tahun,$mk) >= 3.6) and ($this->app_model->sawmethodemk($idn,$tahun,$mk) <= 5)) {
                    $rank = 'D';
                  } elseif (($this->app_model->sawmethodemk($idn,$tahun,$mk) > 6.49) and ($this->app_model->sawmethodemk($idn,$tahun,$mk) <= 7.9)) {
                    $rank = 'B';
                  }  elseif (($this->app_model->sawmethodemk($idn,$tahun,$mk) >= 8) and ($this->app_model->sawmethodemk($idn,$tahun,$mk) <= 10)) {
                    $rank = 'A';
                  }
                   ?>
            <?php if (($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) > 5) and ($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) < 6.5)) {
                    $rank2 = 'C';
                  } elseif (($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) >= 0) and ($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) <= 3.5)) {
                    $rank2 = 'E';
                  } elseif (($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) >= 3.6) and ($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) <= 5)) {
                    $rank2 = 'D';
                  } elseif (($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) > 6.49) and ($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) <= 7.9)) {
                    $rank2 = 'B';
                  }  elseif (($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) >= 8) and ($this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad) <= 10)) {
                    $rank2 = 'A';
                  }
                   ?>
            <h4>Nilai Kumulatif : <?php echo $this->app_model->sawmethodemk($idn,$tahun,$mk);?> ( <?php echo $rank; ?> )</h4>
            <h4>Nilai Kumulatif Kelas : <?php echo $this->app_model->sawmethodemkkelas($idn,$tahun,$mk,$idjad);?> ( <?php echo $rank2; ?> )</h4>

          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="<?php echo base_url();?>spi/evaldosen" ><button class="btn btn-primary btn-flat">< Kembali</button></a><hr>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Parameter</th>
                  <th>Nilai Akhir</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($parameter as $value) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <?php $param = $this->app_model->getdetail('tbl_parameter','id_parameter',$value->parameter_id,'id_parameter','asc')->row(); ?>
                  <td><?php echo $param->parameter; ?></td>
                  <?php //$a = 0; $getnilai = $this->app_model->nilaiparam($idn,$value->parameter_id); foreach ($getnilai as $nilai) { ?>
                  <!--td><?php //echo $nilai->nilai; ?></td-->
                  <?php $a = 0;$getnilai = $this->app_model->nilaiparam($idn,$value->parameter_id);foreach ($getnilai as $nilai) {$a = $a +$nilai->nilai;} ?>
                  <td><?php echo number_format($a/count($jumlah),2); ?></td>
                  <!--td>
                    <div class="btn-group">
                      <button class="btn btn-success" type="button">Aksi</button>
                      <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="true">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url();?>admin/evallihat/1">Lihat</a></li>
                      </ul>
                    </div>
                  </td-->
                </tr>
                <?php $no++;} ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->