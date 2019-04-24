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
    <form action="<?php echo base_url('login/forgotpass'); ?>" method="post">
        <h2 class="text-center">Forgot password</h2>   
        <?php echo $this->session->flashdata('message'); ?>    
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
            <small class="text-danger"><?php echo form_error('email'); ?></small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <a href="<?= base_url('register'); ?>" class="pull-left">Create account</a>
            <a href="<?= base_url('login'); ?>" class="pull-right">Have an account?</a>
        </div>        
    </form>
    <?php echo $this->session->userdata('id') ?>
</div>
</body>
</html>                                                               