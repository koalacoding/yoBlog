<?php include_once('../../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog : write a new post</title>
	</head>

	<?php
		if (isset($_SESSION['username'])) {
	?>
		<body>
			<a href="../manage_blog.php">Return to the blog manager</a>
			<center>
				<form action="new_post_action.php" method="post">
					Category :
					<select name="category">
						<option value="No category" selected>No category</option>
						<?php
							include_once ('../../sql_connexion.php');
							include_once('new_post_functions.php');
							$data_array = get_categories_list($bdd, $_SESSION['username']);

							foreach ($data_array as $element) {
								echo '<option value="' . $element . '">' . htmlspecialchars($element) . '</option>';
							}
						?>
					</select>
					<br />
					<a href="manage_categories/manage_categories.php">(Click here to manage your categories)</a>
					<br /><br />
					Title : <input type="text" name="title" />
					<br /><br />
					Post : <br />
					<textarea name="post_content" rows="20" cols="50" style="resize:none"/></textarea>
					<br /><br />
					<input type="submit" value="OK" />
				</form>
			</center>
		</body>
	<?php
		}

		else { // If the user is not connected to an account.
			echo 'You must be connected to post a new blog entry. Redirection in 2 seconds...';
			header("refresh:2;url=../../login.php");
		}
	?>
</html>
