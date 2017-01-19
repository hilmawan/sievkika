<div class="modal-header">
    <button class="close" aria-label="Close" data-dismiss="modal" type="button">
      <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">FORM</h4>
</div>
<form role='form' action="<?php echo base_url();?>spi/parameterupdate" method="post">
  <input type="hidden" value="<?php echo $getEdit->id_parameter; ?>" name="id"/>
    <div class="modal-body"> 
    <div class="form-group">   
        <table>
          <tbody>
            <tr>
              <td width="150" align="center">Parameter</td>
              <td width="300" style="padding:5px;"><input class="form-control" type="text" placeholder="Parameter" name="parameter" value="<?php echo $getEdit->parameter; ?>" required/></td>
            </tr>
            <tr>
              <td width="150" align="center">Bobot</td>
              <td width="100" style="padding:5px;"><input class="form-control" type="number" placeholder="Parameter" name="bobot" value="<?php echo $getEdit->bobot; ?>" required/></td>
            </tr>
            <tr>
              <td width="150" align="center">Topik</td>
              <td width="300" style="padding:5px;">
                <select name="kode" class="form-control" required>
                  <option value="<?php echo $getEdit->kd_topik; ?>" selected><?php echo $getEdit->topik; ?></option>
                  <option disabled> -- Pilih Topik -- </option>
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