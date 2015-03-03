<?php include('../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog : delete a post</title>
	</head>
	<body>
		<center>
			<?php
				if (isset($_GET['id']) && isset($_SESSION['username'])) {
					include('../sql_connexion.php');

					/* We look in the posts table if there are posts with the ID given as
					the GET variable, and with the username of the current user's session. */
					$request = $bdd->prepare("SELECT null FROM posts WHERE id=? AND author=?");
					$request->execute(array($_GET['id'], $_SESSION['username']));
					$request->closeCursor();

					if ($request->rowCount() > 0) { // If a post has been found.
						// If the user has confirmed that he wants to delete the post.
						if (isset($_GET['delete_confirmation']))
						{
							// Deleting the blog post.
							$request = $bdd->prepare("DELETE FROM posts WHERE id=?");
							$request->execute(array($_GET['id']));
							$request->closeCursor();

							// Deleting all the comments related to the blog post.
							$request = $bdd->prepare("DELETE FROM comments WHERE post_id=?");
							$request->execute(array($_GET['id']));
							$request->closeCursor();
							
							echo 'Post deleted. Redirection in 2 seconds...';
							header("refresh:2;url=index.php");								
						}

						else { // If the user has not confirmed yet.
			?>
							<p>Are you sure you want to delete this article ?</p>
							<p><a href="delete_post.php?id=<?php echo $_GET['id']; ?>
										&delete_confirmation=1">Yes</a>
							   <a href="index.php">No</a>
							</p>
			<?php
						}
					}

					else { // If no post matches.
						echo 'Error. Redirection in 2 seconds...';
						header("refresh:2;url=index.php");								
					}
				}

				else {
					echo 'Error. Redirection in 2 seconds...';
					header("refresh:2;url=index.php");				
				}
			?>
		</center>
	</body>
</html>	