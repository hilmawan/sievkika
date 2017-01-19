<div class="modal-header">
    <button class="close" aria-label="Close" data-dismiss="modal" type="button">
      <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Edit Data Jabatan</h4>
</div>
<form role='form' action="<?php echo base_url();?>bau/update_jabs" method="post">
    <div class="modal-body"> 
    <div class="form-group">   
        <table>
          <tbody>
            <tr>
              <td width="150" align="center">Kode Jabatan</td>
              <td width="300" style="padding:5px;"><input class="form-control" value="<?php echo $muat->kd_jabatan; ?>" type="text" placeholder="Masukan Kode Jabatan" name="kode" required/></td>
            </tr>
            <tr>
              <td width="150" align="center">Nama Jabatan</td>
              <td width="100" style="padding:5px;"><input class="form-control" value="<?php echo $muat->jabatan; ?>" type="text" placeholder="Masukan Nama Jabatan" name="jabs" required/></td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" name="id" value="<?php echo $muat->id_jabatan; ?>">
    </div> 
    </div>
    <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal" type="button">Close</button>
        <input type="submit" class="btn btn-primary" value="Simpan"/>
    </div>
</form>