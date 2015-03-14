<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog : Register a new account</title>
	</head>

	<body>
		<a href="../index.php">Return to index</a>

		<center>
			<form action="register_action.php" method="post">
				Username : <input type="text" name="username" />
				<br /><br />
				Password : <input type="password" name="password" />
				<br /><br />
				Re-enter password : <input type="password" name="password_confirmation" />
				<br /><br />
				Email : <input type="text" name="email" />
				<br /><br />
				<input type="submit" value="OK" />
			</form>
		</center>
	</body>
</html>
