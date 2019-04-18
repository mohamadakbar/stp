<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                  <?php echo form_open_multipart("user/updateuser"); ?>
                    <div class="card-body">
                        <h4 class="card-title">Edit user</h4>
                        <?php foreach ($user as $usr) { ?>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">No Akses</label>
                            <div class="col-sm-8">
                                <input type="text" readonly required class="form-control" name="id_akses" value="<?php echo $usr->id_akses; ?>">
                                <input type="hidden" readonly required class="form-control" name="id_user" value="<?php echo $this->uri->segment(3); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" placeholder="Masukan Nama" name="nama" value="<?php echo $usr->nama ;?>">
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
                                <input type="email" required class="form-control" placeholder="Masukan Email" name="email" value="<?php echo $usr->email ; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-8">
                              <input type="password" required class="form-control" placeholder="Masukan Password" name="password" value="<?php echo $usr->password; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="lname" class="col-sm-2 text-right control-label col-form-label"></label>
                          <div class="col-sm-8">
                            <img src="<?php echo base_url().'upload/user/'.$usr->foto; ?>" width="80" height="90"><br><i style="font-size: 11px; color: red">*Abaikan jika foto tidak di ubah</i>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="lname" class="col-sm-2 text-right control-label col-form-label">Foto</label>
                          <div class="col-sm-8">
                            <input type="file" name="foto">
                          </div>
                        </div>
                    <?php } ?>
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