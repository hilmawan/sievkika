<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Evaluasi Dosen Ajar</h3>
            <h4>Nilai Kumulatif Per Tahun Ajaran :  <?php echo $sawtahun; ?></h4>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kode MK</th>
                  <th>Mata Kuliah</th>
                  <th>Semester</th>
                  <th>Dosen</th>
                  <th width='80'>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($getData as $value) { ?>
                <tr>
                  <td><?php echo $value->kd_mk; ?></td>
                  <td><?php echo $value->matakuliah; ?></td>
                  <td><?php echo $value->semester; ?></td>
                  <td><?php echo $value->nama_karyawan; ?></td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-success" type="button">Aksi</button>
                      <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="true">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url();?>spi/evallihat/<?php echo $value->nik.'z1'.$value->kd_mk.'z1'.$value->tahunajaran.'z1'.$value->id_jadwal; ?>">Lihat</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->