<?php include('../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog : modify a post</title>
	</head>

	<body>
		<a href="index.php">Return to the blog manager</a>
		<center>
			<?php
				// If the user is connected to an account.
				if (isset($_SESSION['username'], $_GET['id']))
				{ 
					// We try to connect to the SQL database.
					try {
						$bdd = new PDO('mysql:host=localhost;
							dbname=blog;charset=utf8', 'root', '');
						$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
						$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					}
					// In case of error.
					catch(Exception $e) {
				        die('Error : '.$e->getMessage());
					}

					$id = $_GET['id'];
					$username = $_SESSION['username'];

					$request = $bdd->prepare("SELECT * FROM posts WHERE id=? AND author=?");
					$request->execute(array($id, $username));

					$data = $request->fetch();
			?>
					<form action="modify_post_action.php" method="post">
						Title : <input type="text" name="title" value="<?php echo $data['title']; ?>"/>
						<br /><br />
						Post : <textarea name="post" rows="20" cols="50" style="resize:none"/><?php
							echo $data['post']; ?></textarea>
						<br /><br />
						<input type="submit" value="OK" />
						<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
					</form>
			<?php
				}

				else {
					echo 'You must be connected to access this page. Redirection in 2 seconds...';
					header("refresh:2;url=../index.php");
				}
			?>

			<br /><br />
		</center>
	</body>
</html>
