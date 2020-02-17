<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <?php echo $this->session->flashdata('message'); ?>
  <small class="text-danger"><?php echo form_error('nama'); ?></small>
  <small class="text-danger"><?php echo form_error('divisi'); ?></small>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#pass">Change password</a></li>
    <li><a data-toggle="tab" href="#user">Edit User</a></li>
  </ul>
  <div class="tab-content">
    <div id="pass" class="tab-pane fade  in active">
      <div class="col-md-6">
        <?= form_open_multipart('account', ['class' => 'form-horizontal']) ?><br>
          <div class="form-group">
              <label class="col-md-6">Current Password</label>
              <div class="col-sm-6">
                  <input type="password" class="form-control" name="current_pass">
                  <small class="text-danger"><?php echo form_error('current_pass'); ?></small>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-md-6">New Password</label>
              <div class="col-sm-6">
                  <input type="password" class="form-control" name="new_pass1">
                  <small class="text-danger"><?php echo form_error('new_pass1'); ?></small>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-md-6">Confirm Password</label>
              <div class="col-sm-6">
                  <input type="password" class="form-control" name="new_pass2">
                  <small class="text-danger"><?php echo form_error('new_pass2'); ?></small>
              </div>
          </div>
          <div class="form-group row">
              <button type="submit" class="btn btn-info">Submit</button>
          </div>
        <?= form_close() ?>
      </div>
    </div>
    <div id="user" class="tab-pane fade">
      <div class="col-md-6">
        <?php echo form_open_multipart('account/editprofil'); ?>
            <div class="card-body"><br>
                <?php foreach ($user as $usr) {?>
                    <div class="form-group row">
                        <label class="col-md-3">Nama</label>
                        <div class="col-sm-9">
                            <input required type="text" name='nama' class="form-control" value="<?php echo $usr['nama']; ?>" placeholder="Masukan Nama">
                            <input type="hidden" name='id_user' value="<?php echo $usr['id_user']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name='email' class="form-control" placeholder="Masukan Email" value="<?php echo $usr['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Single Select</label>
                        <div class="col-md-9">
                            <select required class="select2 form-control custom-select" name='div' style="width: 100%; height:36px;">
                                <option value="">Select</option>
                                <?php foreach ($divisi as $div) { ?>
                                    <option value="<?php echo $div->no_div; ?>"><?php echo $div->nama_div; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Ubah foto</label>
                        <div class="col-sm-9">
                            <img src="upload/user/<?= $usr['foto']; ?>" width="60px" height="60px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3"></label>
                        <div class="col-sm-8">
                            <input type="file" name="foto"><br>
                          </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php echo form_close(); ?>     
      </div>
    </div>
  </div>
</div>

</body>
</html>
