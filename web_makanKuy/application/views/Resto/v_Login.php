<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>MakanKuy | Login</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/logo-min.png');?>" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css" />
</head>
<body>
<div class="container">
  <div class="info">
    <h1>Resto Login</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="<?php echo base_url('assets/img/logo.png');?>"/></div>

  <form class="login-form" method="post" action="<?php echo site_url();?>Resto/login">
		<input type="text" name="username" placeholder="Username" required="required" id="username"/>
    <input type="password" name="password" placeholder="Password" required="required" id="password" />
    <button>Login</button>
    <p class="message">Not registered? <a href="<?php echo base_url();?>Resto/signup"> Create an account</a></p>
  </form>
</div>
  <script  src="<?php echo site_url();?>js/index.js"></script>
</body>
</html>
