<script>
function edit(id){
$('#edit').load('<?php echo base_url();?>spi/parameteredit/'+id);
}
</script>

<div class="content-wrapper">
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Indikator</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <?php if ($this->session->userdata('user_type')  != '1') {
              echo "";
            } else { ?>
              <a data-toggle="modal" href="#myModal" ><button class="btn btn-primary btn-flat">+ Tambah Data</button></a>
              <a href="<?php echo base_url('nilai/gen_weight'); ?>" class="btn btn-success btn-flat" title="">Generate Bobot</a>
            <?php }
             ?>
             <hr>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Indikator</th>
                  <th>Bobot</th>
                  <th>Variabel</th>
                  <?php if ($this->session->userdata('user_type')  != '1') {
                    echo "";
                  } else { ?>
                    <th width='100'>Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($getData as $value) { ?>
                <tr>
                  <td><?php echo number_format($no); ?></td>
                  <td><?php echo $value->parameter; ?></td>
                  <td><?php echo $value->bobot; ?></td>
                  <td><?php echo $value->kd_topik; ?>.<?php echo $value->topik; ?></td>
                  <?php if ($this->session->userdata('user_type') != '1') {
                    echo "";
                  } else { ?>
                  <td>
                      <a class="btn btn-success" data-toggle="modal" href="#MyEdit" onclick="edit(<?php echo $value->id_parameter; ?>)"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');" href="<?php echo base_url();?>spi/parameterdelete/<?php echo $value->id_parameter; ?>"><i class="fa fa-times"></i></a>
                  </td>
                  <?php } ?>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">FORM</h4>
            </div>
            <form role='form' action="<?php echo base_url();?>spi/parametersave" method="post">
                <div class="modal-body"> 
                <div class="form-group">   
                    <table>
                      <tbody>
                        <tr>
                          <td width="150" align="center">Indikator</td>
                          <td width="300" style="padding:5px;"><input class="form-control" type="text" placeholder="Indikator" name="parameter" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Bobot</td>
                          <td width="100" style="padding:5px;"><input class="form-control" type="number" placeholder="Bobot" name="bobot" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Variabel</td>
                          <td width="300" style="padding:5px;">
                            <select name="kode" class="form-control" required>
                              <option disabled selected> -- Pilih Variabel -- </option>
                              <?php foreach ($getTopik as $key) { ?>
                                <option value="<?php echo $key->kd_topik; ?>"><?php echo $key->kd_topik; ?>. <?php echo $key->topik; ?></option>
                              <?php } ?>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div> 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" data-dismiss="modal" type="button">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="MyEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="edit">

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->