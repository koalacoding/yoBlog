<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog : write a new post</title>
	</head>

	<body>
		<a href="index.php">Return to manage your blog</a>
		<center>
			<form action="new_post_action.php" method="post">
				Title : <input type="text" name="title" />
				<br /><br />
				Post : <textarea name="post" rows="20" cols="50" style="resize:none"/></textarea>
				<br /><br />
				<input type="submit" value="OK" />
			</form>
		</center>
	</body>
</html>
