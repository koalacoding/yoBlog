<?php include('../include/session.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="manage_blog_style.css">
		<title>Blog : manage your blog</title>
	</head>

	<body>
		<?php
			if (isset($_SESSION['username'])) {
				include_once('../sql/sql_connexion.php');
		?>
				<a href="../index.php">Return to index</a>
				<center>
					<div id="menu">
						<a href="new_post/new_post.php" class="menu_element">Write a new post</a>
						<a href="../view_blog/view_blog.php?username=<?php echo $_SESSION['username'] ?>"
						class="menu_element">See your blog</a>
						<a href="blog_options/blog_options.php" class="menu_element">
							Blog options</a>
					</div>
					<br /><br />
					<h3>Your blog entries :</h3>
		<?php
				$request = $bdd->prepare("SELECT * FROM posts WHERE author=? ORDER BY time_since_unix_epoch DESC");
				$request->execute(array($_SESSION['username']));
		?>
				<table>
					<tr class="column_name">
						<th>Category</th>
				 		<th>Title</th>
				 		<th>Post</th>
				 		<th>Date posted</th>
				 		<th colspan="2">Actions</th>
					 </tr>
		<?php
				while ($posts = $request->fetch()) {
		?>
					<tr>
						<th class="data"><?php echo htmlspecialchars($posts['category']) ?></th>
					 	<th class="data"><?php echo htmlspecialchars($posts['title']) ?></th>
					 	<th class="data"><?php
					 						if (strlen($posts['post']) > 164) {
					 							echo mb_substr(htmlspecialchars($posts['post']), 0,
					 										164) . '...';
					 						}

					 						else {
					 							echo htmlspecialchars($posts['post']);
					 						}
										?></th>
					 	<th class="data"><?php echo $posts['post_date'] ?></th>
					 	<th class="data"><a href="modify_post.php?id=<?php echo $posts['id']; ?>">
					 						Modify</a></th>
					 	<th class="data"><a href="delete_post.php?id=<?php echo $posts['id']; ?>">
					 						Delete</a></th>
					</tr>
		<?php
				}
		?>
				</table>
				</center>
		<?php
			}

			else {
				echo 'You must be connected to access this page. Redirection in 2 seconds...';
				header("refresh:2;url=../index.php");
			}
		?>
	</body>
</html>
