<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="index_style.css">
		<title>Blog</title>
	</head>

	<body>
		<div id="header"></div>

		<center>
			<br />
			<h1>PHP Blog</h1>
			<h2>An easy way to make your own blog.</h2>
			<?php
				require_once('include/session.php');
				require_once('index_functions.php');
				handleConnectedOrNot($_SESSION);
			?>

			<form id="loginForm" action="login_action.php" method="post">
				<div id="form_header"><span id="form_header_title">Login</span></div>
				<div id="form_fields">
					Username <br />
					<input type="text" name="username" />
					<br /><br />
					Password <br />
					<input type="password" name="password" />
					<br /><br />
					<input id="OK" type="submit" value="OK" />
				</div>
			</form>
		</center>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="index.js"></script>
	</body>
</html>
