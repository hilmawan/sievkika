<div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Edit Data Karyawan</h4>
            </div>
            <form role='form' action="<?php echo base_url();?>bau/update_kary" method="post">
                <div class="modal-body"> 
                <div class="form-group">   
                    <table>
                      <tbody>
                        <tr>
                          <td width="150" align="center">NIK</td>
                          <td width="300" style="padding:5px;"><input class="form-control" value="<?php echo $dats->nik; ?>" type="text" placeholder="Masukan NIK" name="nik" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Nama</td>
                          <td width="100" style="padding:5px;"><input class="form-control" value="<?php echo $dats->nama_karyawan; ?>" type="text" placeholder="Masukan Nama" name="nama" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Telepon</td>
                          <td width="100" style="padding:5px;"><input class="form-control" value="<?php echo $dats->telepon; ?>" type="number" placeholder="Masukan No. Telepon" name="tlp" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">E-mail</td>
                          <td width="100" style="padding:5px;"><input class="form-control" value="<?php echo $dats->email; ?>" type="email" placeholder="Masukan E-mail (ex : jhon@jhon.com)" name="email" required/></td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Unit</td>
                          <td width="300" style="padding:5px;">
                            <select name="unit" class="form-control" required>
                              <option disabled selected> -- Pilih Unit -- </option>
                              <?php foreach ($unit as $key) { ?>
                                <option <?php if($dats->kd_unit == $key->kd_unit) { echo "selected=''"; } ?> value="<?php echo $key->kd_unit; ?>"><?php echo $key->kd_unit; ?></option>
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
                                <option <?php if($dats->kd_jabatan == $key->kd_jabatan){ echo "selected=''"; } ?> value="<?php echo $key->kd_jabatan; ?>"><?php echo $key->jabatan; ?></option>
                              <?php } ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="150" align="center">Status</td>
                          <td width="300" style="padding:5px;">
                            <select name="sts" class="form-control" required>
                              <option disabled> -- Pilih Status -- </option>
                              <option <?php if ($dats->status == '1 ') { echo "selected=''";} ?> value="1">Aktif</option>
                              <option  <?php if ($dats->status == '2 ') { echo "selected=''";} ?> value="2">Non-Aktif</option>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <input type="hidden" name="id" value="<?php echo $dats->id; ?>">
                </div> 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" data-dismiss="modal" type="button">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>
            </form>