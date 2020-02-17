<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
  body{
    background: url(<?php echo base_url().'assets/login/' ?>/images/bg.jpg);
  }
   .login-form {
    width: 450px;
    margin: 100px auto;
  }
  .login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
  }
  .login-form h2 {
    margin: 0 0 35px;
  }
  .form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
  }
  .btn {        
    font-size: 15px;
    font-weight: bold;
  }
</style>
</head>
<body>
<div class="login-form">
    <?php echo form_open('register') ?>
    <h2 class="text-center">Register</h2>
    <p class="hint-text">Create your account. It's free and only takes a minute.</p>
    <div class="form-group">
      <input type="hidden" name="id_akses" value="<?php echo $kode; ?>">
      <input type="text" class="form-control" name="nama" placeholder="First Name" value="<?php echo set_value('nama'); ?>">
      <small class="text-danger"><?php echo form_error('nama'); ?></small>          
    </div>
    <div class="form-group">
      <select class="form-control" name="divisi">
          <option>Pilih Divisi</option>
          <?php foreach ($div as $d) {?>
          <option value="<?php echo $d->no_div; ?>"><?php echo $d->nama_div; ?></option>
          <?php } ?>
      </select>  
    </div>
    <div class="form-group">
      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
      <small class="text-danger"><?php echo form_error('email'); ?></small>
    </div>
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <input type="password" name="password" class="form-control input-sm" placeholder="Password">
          <small class="text-danger"><?php echo form_error('password'); ?></small>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <input type="password" class="form-control input-sm" name="password2" placeholder="Confirm Password">
        </div>
      </div>
    </div>        
    <div class="form-group">
      <label class="checkbox-inline"><input type="checkbox"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register Now</button>
        </div>
    <?= form_close(); ?>
  <div class="text-center" style="color: #fff">Already have an account? <a href="<?php echo base_url('login') ?>">Sign in</a></div>
</div>
</body>
</html>                            