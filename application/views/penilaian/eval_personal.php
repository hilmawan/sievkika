<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Evaluasi Personal</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>Karyawan</th>
                  <th>Unit</th>
                  <th>Tanggal Evaluasi</th>
                  <th width='80'>Hasil</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($getData as $value) { ?>
                <tr>
                  <td><?php echo $value->nik; ?></td>
                  <td><?php echo $value->nama_karyawan; ?></td>
                  <td><?php echo $value->unit; ?></td>
                  <?php $pecah = explode(' ', $value->date_input); $pecah2 = explode('-', $pecah[0]); ?>
                  <td><?php echo $pecah2[2].'-'.$pecah2[1].'-'.$pecah2[0]; ?></td>
                  <td><?php echo $value->hasil_input; ?></td>
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

