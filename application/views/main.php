<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Red Belt Exam Practice</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<div id="container">
	<div id="login_header_div">
		<h2 id="login_site_title">Book Review Platform</h2>
	</div>
	<?= "<p>" . $this->session->flashdata('errors') . "</p>"; ?>
	<div id="register_div">
		<h2>Register</h2>
		<form action="main/register" method="post">
			Name: <input type="text" name="name_reg">
			Alias: <input type="text" name="alias_reg">
			Email: <input type="text" name="email_reg">
			Password: <input type="password" name="password_reg1">
			Confirm PW: <input type="password" name="password_reg2">
			<p id="password_reminder">* Password should be at least 8 characters</p>
			<input type="submit" name="submit_reg" class="submit">
		</form>
	</div>
	<div id="login_div">
		<h2>Log In</h2>
		<form action="main/login" method="post">
			Email: <input type="text" name="email_log">
			Password: <input type="password" name="password_log">
			<input type="submit" name="submit_log" class="submit">
		</form>
	</div>
</div>
</body>
</html>