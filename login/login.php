<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="login_style.css">
		<title>Blog : Login</title>
	</head>

	<body>
		<a href="../index.php">Return to index</a>

		<center>
			<form id="form" action="login_action.php" method="post">
				<div id="form_header"><span id="form_header_title">Login</span></div>
				<div id="form_fields">
					Username <br />
					<input type="text" name="username" />
					<br /><br />
					Password <br />
					<input type="password" name="password" />
					<br /><br />
					<input type="submit" value="OK" />
				</div>
			</form>
		</center>
	</body>
</html>
