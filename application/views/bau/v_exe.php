<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Nilai Personal</h3>
          </div><!-- /.box-header -->
          <?php if ($kry->jum != $vlu->jum) { ?>
              <a href="javascript:;" onclick="alert('Jumlah Karyawan Yang Dievaluasi Belum Sesuai!')" class="btn btn-danger" title="">Hitung Evaluasi</a>
            <?php } else { ?>
            <a href="" class="btn btn-success" title="">Hitung Evaluasi</a>
          <?php } ?>
          
          <br><br>
          <div class="box-body">
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>Karyawan</th>
                  <th>Unit</th>
                  <th>Tanggal Input</th>
                  <th width='40'>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($qry as $value) { ?>
                <tr>
                  <td><?php echo $value->nik; ?></td>
                  <td><?php echo $value->nama_karyawan; ?></td>
                  <td><?php echo $value->unit; ?></td>
                  <?php $pecah = explode('-', $value->tgl_input); ?>
                  <td><?php echo $pecah[2].'-'.$pecah[1].'-'.$pecah[0]; ?></td>
                  <td><a href="<?php echo base_url(); ?>bau/detil_nilai/<?php echo $value->kd_input; ?>" class="btn btn-success" title="Lihat Detail"><i class="fa fa-eye"></i></a></td>
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

