<div class="modal-header">
    <button class="close" aria-label="Close" data-dismiss="modal" type="button">
      <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Edit Data Topik</h4>
</div>
<form role='form' action="<?php echo base_url();?>spi/topikupdate" method="post">
  <input type="hidden" value="<?php echo $getEdit->id_topik; ?>" name="id"/>
    <div class="modal-body"> 
    <div class="form-group">   
        <table>
          <tbody>
            <tr>
              <td width="150" align="center">Kode Topik</td>
              <td width="300" style="padding:5px;"><input class="form-control" type="text" placeholder="Kode Topik" name="kode" value="<?php echo $getEdit->kd_topik; ?>" required/></td>
            </tr>
            <tr>
              <td width="150" align="center">Topik</td>
              <td width="300" style="padding:5px;"><input class="form-control" type="text" placeholder="Topik" name="topik" value="<?php echo $getEdit->topik; ?>" required/></td>
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