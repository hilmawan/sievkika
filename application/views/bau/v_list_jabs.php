<script>
function edit(id){
$('#edit').load('<?php echo base_url();?>bau/load_jabs/'+id);
}
</script>

<div class="content-wrapper">
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Jabatan</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a data-toggle="modal" href="#myModal" ><button class="btn btn-primary btn-flat">+ Tambah Data</button></a><hr>
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Jabatan</th>
                  <th>Jabatan</th>
                  <th width='100'>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($jabs as $val) { ?>
                <tr>
                  <td><?php echo number_format($no); ?></td>
                  <td><?php echo $val->kd_jabatan; ?></td>
                  <td><?php echo $val->jabatan; ?></td>
                  <td>
                    <a class="btn btn-success" data-toggle="modal" href="#MyEdit" onclick="edit(<?php echo $val->id_jabatan; ?>)"><i class="fa fa-pencil"></i></a></li>
                    <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');" href="<?php echo base_url();?>bau/deljabs/<?php echo $val->id_jabatan; ?>"><i class="fa fa-times"></i></a>
                  </td>
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
                <h4 class="modal-title">Form Tambah Jabatan</h4>
            </div>
            <form role='form' action="<?php echo base_url();?>bau/add_jabs" method="post">
                <div class="modal-body"> 
                <div class="form-group">   
                    <table>
                      <tbody>
                        <tr>
                          <td width="150" align="center">Kode Jabatan</td>
                          <td width="300" style="padding:5px;"><input class="form-control" type="text" placeholder="Kode Jabatan" name="kode" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Nama Jabatan</td>
                          <td width="100" style="padding:5px;"><input class="form-control" type="text" placeholder="Nama Jabatan" name="jabs" required/></td>
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