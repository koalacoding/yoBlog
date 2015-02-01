<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog</title>
	</head>

	<body>
		<center>
			<?php
				session_start();
				// If the user is connected to an account.
				if (isset($_SESSION['username']))
				{

				    echo 'Welcome ' . $_SESSION['username'] . '.';
				    echo '<br /><br /><a href="logout.php">Logout</a>
				    	 <br /><br />
				    	 <a href="manage_blog/index.php">Manage your blog</a>';
				}

				else {
					echo '<a href="login.php">Login to an account</a>
						  <br /><br />
						  <a href="register.php">Register a new account</a>';
				}
			?>
			<br /><br />
		</center>
	</body>
</html>
