<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Red Belt Exam Practice</title>
	<style type="text/css">
		*{
			padding: 5px;
			font-family: sans-serif;
		}
		a{
			color: blue;
		}
		div{
			display: inline-block;
			border: 2px solid black;
			vertical-align: top;
		}
		form *{
			display: block;
		}
		.headlink{
			float: right;
			display: inline-block;
			vertical-align: top;
		}
	</style>
</head>
<body>
<h1>Welcome!</h1>
	<?php
		if(isset($this->session->userdata['id'])){
			echo "<a class=\"headlink\" href=\"/main/logout\">Logout</a>";
		}
	?>
<?= "<p>" . $this->session->flashdata('errors') . "</p>"; ?>
<div id="register">
	<h2>Register</h2>
	<form action="main/register" method="post">
		Name: <input type="text" name="name_reg">
		Alias: <input type="text" name="alias_reg">
		Email: <input type="text" name="email_reg">
		Password: <input type="password" name="password_reg1">
		Confirm PW: <input type="password" name="password_reg2">
		<p>* Password should be at least 8 characters</p>
		<input type="submit" name="submit_reg">
	</form>
</div>
<div id="login">
	<h2>Log In</h2>
	<form action="main/login" method="post">
		Email: <input type="text" name="email_log">
		Password: <input type="password" name="password_log">
		<input type="submit" name="submit_log">
	</form>
</div>
</body>
</html>