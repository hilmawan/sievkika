<script>
function edit(id){
$('#edit').load('<?php echo base_url();?>spi/topikedit/'+id);
}
</script>

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Topik Parameter</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
          <?php if ($this->session->userdata('user_type') != '1') {
            echo "";
          } else { ?>
            <a data-toggle="modal" href="#myModal" ><button class="btn btn-primary btn-flat">+ Tambah Data</button></a>
          <?php } ?>
            <hr>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kode Topik</th>
                  <th>Topik</th>
                  <?php if ($this->session->userdata('user_type')  != '1') {
                    echo "";
                  } else { ?>
                    <th width='100'>Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($getData as $value) { ?>
                <tr>
                  <td><?php echo $value->kd_topik; ?></td>
                  <td><?php echo $value->topik; ?></td>
                  <?php if ($this->session->userdata('user_type') != '1') {
                    echo "";
                  } else { ?>
                  <td>
                      <a class="btn btn-success" data-toggle="modal" href="#MyEdit" onclick="edit(<?php echo $value->id_topik; ?>)"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');" href="<?php echo base_url();?>spi/topikdelete/<?php echo $value->id_topik; ?>"><i class="fa fa-times"></i></a>
                  </td>
                  <?php } ?>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Tambah Data Topik</h4>
            </div>
            <form role='form' action="<?php echo base_url();?>spi/topiksave" method="post">
                <div class="modal-body"> 
                <div class="form-group">   
                    <table>
                      <tbody>
                        <tr>
                          <td width="150" align="center">Kode Topik</td>
                          <td width="300" style="padding:5px;"><input class="form-control" type="text" placeholder="Kode Topik" name="kode" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Topik</td>
                          <td width="300" style="padding:5px;"><input class="form-control" type="text" placeholder="Topik" name="topik" required/></td>
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