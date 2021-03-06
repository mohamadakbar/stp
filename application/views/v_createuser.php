<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php echo form_open_multipart("user/create"); ?>
                    <div class="card-body">
                        <h4 class="card-title">Tambah user baru</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">No Akses</label>
                            <div class="col-sm-8">
                                <input type="text" readonly required class="form-control" name="id_akses" value="<?php echo $kode; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" placeholder="Masukan Nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="div" class="col-sm-2 text-right control-label col-form-label">Divisi</label>
                            <div class="col-sm-8">
                                <select class="select2 form-control custom-select" name="divisi" required style="width: 100%; height:36px;">
                                    <option value="">Select</option>
                                    <?php foreach ($div as $d) {?>
                                    <option value="<?php echo $d->no_div;?>"><?php echo $d->nama_div;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" required class="form-control" placeholder="Masukan Email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" required class="form-control" placeholder="Masukan Password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="lname" class="col-sm-2 text-right control-label col-form-label">Akses User</label>
                          <ul>
                            <?php foreach ($role as $rl) {
                                if ($rl->parent == 1) {
                            ?>
                              <li>
                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="<?php echo $rl->id_menu; ?>"><?php echo $rl->nama_menu; ?>
                                <ul>
                                  <?php foreach ($role as $cld) {
                                      if ($cld->child == $rl->id_menu) {
                                  ?>
                                    <li>
                                      <input type="checkbox" name="check_list[]" alt="Checkbox" value="<?php echo $cld->id_menu; ?>"><?php echo $cld->nama_menu; ?>
                                    </li>
                                  <?php } ?>
                                  <?php } ?>
                                </ul>
                              </li>
                            <?php } ?>
                            <?php } ?>
                          </ul>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" class="btn btn-info">
                            </div>
                        </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>