<?php include_once('../../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog options</title>
	</head>

	<?php
		if (isset($_SESSION['username'])) {
			include_once ('../../sql_connexion.php');
			include_once('blog_options_functions.php');
	?>
		<body>
			<a href="../index.php">Return to the blog manager</a>
			<center>
				<form action="blog_options_action.php" method="post">
					Short description of your blog :
					<br />
					<textarea name="short_about" rows="10" cols="50" style="resize:none"/><?php 
							if (user_has_already_posted_options($bdd, $_SESSION['username'])
								== TRUE) {
								echo get_short_about_data($bdd, $_SESSION['username']);
						?></textarea>
					<br /><br />
					Description of your blog :
					<br />
					<textarea name="about" rows="20" cols="50" style="resize:none"/><?php 
								echo get_about_data($bdd, $_SESSION['username']); ?>
					</textarea>
					<br /><br />
					Give information about how your readers can contact you :
					<br />
					<textarea name="contact" rows="20" cols="50" style="resize:none"/><?php 
								echo get_contact_data($bdd, $_SESSION['username']);
							}
						?></textarea>
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
