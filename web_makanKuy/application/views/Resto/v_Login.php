<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>MakanKuy | Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<style>
				/* Form */
			.form {
			position: relative;
			z-index: 1;
			background: #FFFFFF;
			max-width: 300px;
			margin: 0 auto 100px;
			padding: 30px;
			border-top-left-radius: 3px;
			border-top-right-radius: 3px;
			border-bottom-left-radius: 3px;
			border-bottom-right-radius: 3px;
			text-align: center;
			}
			.form .thumbnail {
			background: #EF3B3A;
			width: 150px;
			height: 150px;
			margin: 0 auto 30px;
			padding: 50px 30px;
			border-top-left-radius: 100%;
			border-top-right-radius: 100%;
			border-bottom-left-radius: 100%;
			border-bottom-right-radius: 100%;
			box-sizing: border-box;
			}
			.form .thumbnail img {
			display: block;
			width: 100%;
			}
			.form input {
			outline: 0;
			background: #f2f2f2;
			width: 100%;
			border: 0;
			margin: 0 0 15px;
			padding: 15px;
			border-top-left-radius: 3px;
			border-top-right-radius: 3px;
			border-bottom-left-radius: 3px;
			border-bottom-right-radius: 3px;
			box-sizing: border-box;
			font-size: 14px;
			}
			.form button {
			outline: 0;
			background: #EF3B3A;
			width: 100%;
			border: 0;
			padding: 15px;
			border-top-left-radius: 3px;
			border-top-right-radius: 3px;
			border-bottom-left-radius: 3px;
			border-bottom-right-radius: 3px;
			color: #FFFFFF;
			font-size: 14px;
			-webkit-transition: all 0.3 ease;
			transition: all 0.3 ease;
			cursor: pointer;
			}
			.form .message {
			margin: 15px 0 0;
			color: #b3b3b3;
			font-size: 12px;
			}
			.form .message a {
			color: #EF3B3A;
			text-decoration: none;
			}
			.form .register-form {
			display: none;
			}

			.container {
			position: relative;
			z-index: 1;
			max-width: 300px;
			margin: 0 auto;
			}
			.container:before, .container:after {
			content: "";
			display: block;
			clear: both;
			}
			.container .info {
			margin: 50px auto;
			text-align: center;
			}
			.container .info h1 {
			margin: 0 0 15px;
			padding: 0;
			font-size: 36px;
			font-weight: 300;
			color: #1a1a1a;
			}
			.container .info span {
			color: #4d4d4d;
			font-size: 12px;
			}
			.container .info span a {
			color: #000000;
			text-decoration: none;
			}
			.container .info span .fa {
			color: #EF3B3A;
			}

			/* END Form */
			/* Demo Purposes */
			body {
			background: #ccc;
			font-family: "Roboto", sans-serif;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			}
			body:before {
			content: "";
			position: fixed;
			top: 0;
			left: 0;
			display: block;
			background: rgba(255, 255, 255, 0.8);
			width: 100%;
			height: 100%;
			}

	</style>
</head>
<body>
<div class="container">
  <div class="info">
    <h1>Resto Login</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>

  <form class="login-form" method="post" action="<?php echo site_url();?>Resto/login"">
		<input type="text" name="username" placeholder="Username" required="required" id="username"/>
    <input type="password" name="password" placeholder="Password" required="required" id="password" />
    <button>Login</button>
    <p class="message">Not registered? <a href="#">Create an account</a></p>
  </form>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="<?php echo site_url();?>js/index.js"></script>

</body>
</html>