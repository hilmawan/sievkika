<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Detail Nilai - <?php echo $n->nama_karyawan; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="<?php echo base_url(); ?>bau/exeval" title="" class="btn btn-primary">< Kembali</a>
            <br><br>
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aspek</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($z as $value) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $value->parameter; ?></td>
                  <td><?php echo $value->nilai; ?></td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

