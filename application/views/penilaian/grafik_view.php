<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Grafik Penilaian</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <section class="content">
          <div class="row">
            <div class="col-md-12">

              <div class="box box-danger">
                <div class="box-body">
                  <form action="<?php echo base_url(); ?>spi/grafik_lihat" method="post" accept-charset="utf-8">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Pilih Dosen</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="checkbox" class="flat-red" name="" /> Semua Dosen
                      <select class="form-control" name="" multiple>
                        <option value="0">Dosen 1</option>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label>Periode</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <select class="form-control" name="">
                        <option disabled selected>Pilih Periode Awal</option>
                        <option value=""></option>
                      </select>

                      <select class="form-control" name="">
                        <option disabled selected>Pilih Periode Akhir</option>
                        <option value=""></option>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label>Keterangan</label>
                    <div class="input-group">
                      <input type="checkbox" class="flat-red" name="" /> Per Semester
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <div class="input-group">
                      <input type="submit" class="btn btn-block btn-primary" value="Submit" />
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col (left) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->