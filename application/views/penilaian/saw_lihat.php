<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Penilaian Dosen Tahun Ajaran</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="<?php echo base_url();?>spi/evalsaw" ><button class="btn btn-primary btn-flat">< Kembali</button></a><hr>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIDN</th>
                  <th>NAMA DOSEN</th>
                  <th>Nilai Kumulatif</th>
                  <th>Rangking</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 'A1'; $no=1; foreach ($q2 as $key) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $key->nidn; ?></td>
                  <td><?php echo $key->nama_karyawan; ?></td>
                  <?php $nilaisaw = $this->app_model->sawmethode($key->nidn,$tahun); ?>
                  <td><?php echo $nilaisaw;?></td>
                  <?php if (($nilaisaw > 5) and ($nilaisaw < 6.5)) {
                    $rank = 'C';
                  } elseif (($nilaisaw >= 0) and ($nilaisaw <= 3.5)) {
                    $rank = 'E';
                  } elseif (($nilaisaw >= 3.6) and ($nilaisaw <= 5)) {
                    $rank = 'D';
                  } elseif (($nilaisaw >= 6.5) and ($nilaisaw <= 7.9)) {
                    $rank = 'B';
                  }  elseif (($nilaisaw >= 8) and ($nilaisaw <= 10)) {
                    $rank = 'D';
                  }
                   ?>
                  <td><?php echo $rank; ?></td>
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
                <?php $a++; $no++;} ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->