<?php include('../to_include.php'); ?>
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
				background-color: rgb(86, 86, 86);
				color: #FFFFFF;
			}

			.data {
				font-weight:normal;
			}

			#menu {
				
			}

			.menu_element {
				background-color: rgb(86, 86, 86);
				color: #FFFFFF;

				font-size: 25px;
				text-decoration: none;

				border-bottom: 3px solid rgb(60, 60, 60);

				padding-bottom: 7px;
				padding-left: 7px;
				padding-right: 7px;
				padding-top: 7px;				
			}

			.menu_element:hover {
				background-color: rgb(96, 96, 96)
			}
		</style>
	</head>

	<body>
		<?php
			if (isset($_SESSION['username'])) { 
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
		?>
				<a href="../index.php">Return to index</a>
				<center>
					<div id="menu">
						<a href="new_post.php" class="menu_element">Write a new post</a>
						<a href="../view_blog/show_blog.php?username=<?php echo $_SESSION['username'] ?>" 
						class="menu_element">See your blog</a>						
					</div>
					<br /><br />
					<h3>Your blog entries :</h3>
		<?php
				$author = $_SESSION['username'];
				$request = $bdd->query("SELECT * FROM posts WHERE author='$author'");

				echo '<table>
					 	<tr class="column_name">
					 		<th>Title</th>
					 		<th>Post</th>
					 		<th>Date posted</th>
					 	</tr>';
				while ($posts = $request->fetch()) {
					echo '<tr>
						 	<th class="data">' . htmlspecialchars($posts['title']) . '</th>
						 	<th class="data">' . htmlspecialchars($posts['post']) . '</th>
						 	<th class="data">' . $posts['post_date'] . '</th>
						 	<th class="data"><a href="modify_post.php?id=' . $posts['id'] .
						 	'">Modify</a></th>
						  </tr>';
				}
				echo '</table>
					</center>';
			}

			else {
				echo 'You must be connected to access this page. Redirection in 2 seconds...';
				header("refresh:2;url=../index.php");
			}
		?>
	</body>
</html>
