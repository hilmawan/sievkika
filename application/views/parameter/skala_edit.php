<div class="modal-header">
    <button class="close" aria-label="Close" data-dismiss="modal" type="button">
      <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">FORM</h4>
</div>
<form role='form' action="<?php echo base_url();?>spi/skalaupdate" method="post">
  <input type="hidden" value="<?php echo $getEdit->id_skala; ?>" name="id"/>
    <div class="modal-body"> 
    <div class="form-group">   
        <table>
          <tbody>
            <tr>
              <td width="150" align="center">Nilai / Skala</td>
              <td width="300" style="padding:5px;"><input class="form-control" type="text" name="skala" value="<?php echo $getEdit->skala; ?>" placeholder="Nilai / Skala" required/></td>
            </tr>
            <tr>
              <td width="150" align="center">Keterangan</td>
              <td width="300" style="padding:5px;"><input class="form-control" type="text" name="keterangan" value="<?php echo $getEdit->keterangan; ?>" placeholder="Keterangan" required/></td>
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