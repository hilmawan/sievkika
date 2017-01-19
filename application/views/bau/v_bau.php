<script>
function edit(id){
$('#edit').load('<?php echo base_url();?>bau/load/'+id);
}
</script>

<div class="content-wrapper">
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Karyawan</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a data-toggle="modal" href="#myModal" ><button class="btn btn-primary btn-flat">+ Tambah Data</button></a><hr>
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Unit</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th width='100'>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($query as $val) { ?>
                <tr>
                  <td><?php echo number_format($no); ?></td>
                  <td><?php echo $val->nik; ?></td>
                  <td><?php echo $val->nama_karyawan; ?></td>
                  <td><?php echo $val->unit; ?></td>
                  <td><?php echo $val->jabatan; ?></td>
                  <td>
                      <?php if ($val->status == 1) {
                        $sts = 'AKTIF';
                      } else {
                        $sts = 'NON-AKTIF';
                      }
                      echo $sts; ?>
                  </td>
                  <td>
                    <a class="btn btn-success" data-toggle="modal" href="#MyEdit" onclick="edit(<?php echo $val->id; ?>)"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');" href="<?php echo base_url();?>bau/delkary/<?php echo $val->id; ?>"><i class="fa fa-times"></i></a>
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
                <h4 class="modal-title">Tambah Data Karyawan</h4>
            </div>
            <form role='form' action="<?php echo base_url();?>bau/add_kary" method="post">
                <div class="modal-body"> 
                <div class="form-group">   
                    <table>
                      <tbody>
                        <tr>
                          <td width="150" align="center">NIK</td>
                          <td width="300" style="padding:5px;"><input class="form-control" type="text" placeholder="Masukan NIK" name="nik" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Nama</td>
                          <td width="100" style="padding:5px;"><input class="form-control" type="text" placeholder="Masukan Nama" name="nama" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Telepon</td>
                          <td width="100" style="padding:5px;"><input class="form-control" type="number" placeholder="Masukan No. Telepon" name="tlp" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">E-mail</td>
                          <td width="100" style="padding:5px;"><input class="form-control" type="email" placeholder="Masukan E-mail (ex : jhon@jhon.com)" name="email" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Unit</td>
                          <td width="300" style="padding:5px;">
                            <select name="unit" class="form-control" required>
                              <option disabled selected> -- Pilih Unit -- </option>
                              <?php foreach ($unit as $key) { ?>
                                <option value="<?php echo $key->kd_unit; ?>"><?php echo $key->unit; ?></option>
                              <?php } ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Jabatan</td>
                          <td width="300" style="padding:5px;">
                            <select name="jabs" class="form-control" required>
                              <option disabled selected> -- Pilih Jabatan -- </option>
                              <?php foreach ($jabs as $key) { ?>
                                <option value="<?php echo $key->kd_jabatan; ?>"><?php echo $key->jabatan; ?></option>
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