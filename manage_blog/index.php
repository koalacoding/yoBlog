<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog : manage your blog</title>
		<style>
			table, th {
			    border: 1px solid black;
			    border-collapse: collapse;
			}
			th {
			    padding: 5px;
			}

			.column_name {
				font-weight:bold;
				background-color: #E6E6E6;
			}

			.data {
				font-weight:normal;
			}
		</style>
	</head>

	<body>
		<?php
			session_start();
			if (isset($_SESSION['username'])) {
				echo '<a href="../index.php">Return to index</a>
					  <center>
					  	<a href="new_post.php">Write a new post</a>
						<br /><br />';

				// We try to connect to the SQL database.
				try {
					$bdd = new PDO('mysql:host=localhost;
									dbname=blog;charset=utf8', 'root', '');
				}
				// In case of error.
				catch(Exception $e) {
				        die('Error : '.$e->getMessage());
				}

				$author = $_SESSION['username'];
				$request = $bdd->query("SELECT * FROM posts WHERE author='$author'");

				echo '<table>
					 	<tr class="column_name">
					 		<th>Title</th>
					 		<th>Post</th>
					 		<th>Date</th>
					 	</tr>';
				while ($posts = $request->fetch()) {
					echo '<tr>
						 	<th class="data">' . $posts['title'] . '</th>
						 	<th class="data">' . $posts['post'] . '</th>
						 	<th class="data">' . $posts['post_date'] . '</th>
						  </tr>';
				}
				echo '</table>
					</center>';
			}

			else {
				echo 'You must be connected to access this page. Redirection in 2 seconds...';
				header("refresh:2;url=../login.php");
			}
		?>
	</body>
</html>
