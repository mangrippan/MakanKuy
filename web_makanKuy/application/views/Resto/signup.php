<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>MakanKuy | Sign Up</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/logo-min.png');?>" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css" />
</head>
<body>
<div class="container">
  <div class="info">
    <h1>Resto Sign Up</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="<?php echo base_url('assets/img/logo.png');?>"/></div>

  <form class="login-form" method="post" action="<?php echo site_url();?>Resto/signup">
		<input type="text" name="username" placeholder="Username" required="required" id="username"/>
		<input type="text" name="nama" placeholder="Nama Restoran" required="required" id="nama"/>
    <input type="password" name="password" placeholder="Password" required="required" id="password" />
    <button>Sign Up</button>
    <p class="message">Registered? <a href="<?php echo base_url();?>Resto/login"> Login</a></p>
  </form>
</div>

<script  src="<?php echo site_url();?>js/index.js"></script>

</body>
</html>
