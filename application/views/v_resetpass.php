<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    <form action="<?php echo base_url('login/changepass'); ?>" method="post">
        <h3 class="text-center">Change your password for</h3>
        <center><h5 style="font-style: italic"><?php echo $this->session->userdata('reset_email'); ?></h5></center>
        <?php echo $this->session->flashdata('message'); ?>    
        <div class="form-group">
            <input type="password" class="form-control" name="password1" id="password1" placeholder="Enter new password">
            <small class="text-danger"><?php echo form_error('password1'); ?></small>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat password">
            <small class="text-danger"><?php echo form_error('password2'); ?></small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
        </div>  
    </form>
    <?php echo $this->session->userdata('id') ?>
</div>
</body>
</html>                                                               