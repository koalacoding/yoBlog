<?php include('to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog</title>
		<style>
			body {
				background-color: #EDEDED;
			}

			#core {
				width: 50%;
				min-width: 780px;
				margin-left: auto;
				margin-right: auto;
				text-align: center;

				background-color: #FFFFFF;
			}

			table {
				border: 1px solid black;
				margin-left: auto;
				margin-right: auto;				
			}
		</style>
	</head>
	<body>
		<?php
			if (isset($_GET['username'])) {
				include 'sql_connexion.php';

				$request = $bdd->prepare("SELECT username FROM users WHERE username=:username");
				$request->execute(array('username'=>$_GET['username']));

				if ($request->rowCount() > 0) {
		?>
					<div id="core">
						<div id="header">Blog of</div>
						<a href="index.php">Return to index</a>

		<?php
								// Getting all the posts where the author is $_GET['username']
								$request = $bdd->prepare("SELECT * FROM posts WHERE author=:username");
								$request->execute(array('username'=>$_GET['username']));

								while ($posts = $request->fetch()) {
		?>
										<table>
										 	<tr>
										 		<th>Title : <?php echo htmlspecialchars($posts['title']) ?></th>
										 		<th>Date posted : <?php echo $posts['post_date'] ?></th>
										 	</tr>
									
											<tr>
											 	<th><?php echo htmlspecialchars($posts['post']) ?></th>
											</tr>
										</table>
		<?php					
								}
		?>
					</div>
		<?php
				}

				else {
					echo "This blog doesn't exist. Redirection in 2 seconds...";
					header("refresh:2;url=index.php");
				}
			}

			else {
				echo "No blog name specified. Redirection in 2 seconds...";
				header("refresh:2;url=index.php");
			}
		?>
	</body>
</html>