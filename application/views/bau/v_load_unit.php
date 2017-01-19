<div class="modal-header">
    <button class="close" aria-label="Close" data-dismiss="modal" type="button">
      <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Edit Data Unit</h4>
</div>
<form role='form' action="<?php echo base_url();?>bau/update_unit" method="post">
    <div class="modal-body"> 
    <div class="form-group">   
        <table>
          <tbody>
            <tr>
              <td width="150" align="center">Kode Unit</td>
              <td width="300" style="padding:5px;"><input class="form-control" value="<?php echo $muat->kd_unit; ?>" type="text" placeholder="Masukan Kode Unit" name="kode" required/></td>
            </tr>
            <tr>
              <td width="150" align="center">Nama Unit</td>
              <td width="100" style="padding:5px;"><input class="form-control" value="<?php echo $muat->unit; ?>" type="text" placeholder="Masukan Nama Unit" name="unit" required/></td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" name="id" value="<?php echo $muat->id; ?>">
    </div> 
    </div>
    <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal" type="button">Close</button>
        <input type="submit" class="btn btn-primary" value="Simpan"/>
    </div>
</form>