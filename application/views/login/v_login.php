<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .container {
  position: fixed;
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-30%, -70%);
  }
  @media screen and (max-width: 1140px) {
    .container {
    transform: translate(-40%, -70%);
    }
  
  }

  .login-title {
    text-align: center;
  }
  .login-form {
   
  }
</style>
</head>
<body>
<div class="container"> 
  <div class="row">
    <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6">
      <h2 class="login-title"><strong>Login<br/></h2><br/>
      <!-- Start form -->
      <form action='<?php echo base_url('login/auth'); ?>' class="login-form" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <input type="text" class="form-control" name="username"placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" id="password">
        </div>
         <?php echo $this->session->flashdata('msg'); ?>
        <div class="form-check">
          <button class="btn btn-info" type="button" name="showpassword" id="showpassword" value="Show Password">Show password</button>
          <input type="submit" class="btn btn-primary" value="Login">
        </div>
      </form>
    </div>
    
  
    
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function(){

  $("#showpassword").on('click', function(){
    var pass = $("#password");
    var fieldtype = pass.attr('type');
    if (fieldtype == 'password') {
      pass.attr('type', 'text');
      $(this).text("Hide Password");
    }else{
      pass.attr('type', 'password');
      $(this).text("Show Password");
    }
  });
});

</script>

</body>
</html>