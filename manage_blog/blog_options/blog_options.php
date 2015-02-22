<?php include('../../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog options</title>
	</head>

	<?php
		if (isset($_SESSION['username'])) {
	?>
		<body>
			<a href="index.php">Return to the blog manager</a>
			<center>
				<form action="blog_options_action.php" method="post">
					About your blog :
					<br />
					<textarea name="about" rows="20" cols="50" style="resize:none"/></textarea>
					<br /><br />
					<input type="submit" value="OK" />
				</form>
			</center>
		</body>
	<?php
		}

		else { // If the user is not connected to an account.
			echo 'You must be connected to access this page. Redirection in 2 seconds...';
			header("refresh:2;url=../../login.php");
		}
	?>
</html>
