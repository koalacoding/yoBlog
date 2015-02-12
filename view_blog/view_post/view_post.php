<?php include('../../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../view_blog.css">
		<link rel="stylesheet" type="text/css" href="view_post.css">
		<meta charset="utf-8" />
		<title>Blog</title>
	</head>
	<body>
		<?php
			if (isset($_GET['id'])) {
				include ('../../sql_connexion.php');

				$request = $bdd->prepare("SELECT * FROM posts WHERE id=?");
				$request->execute(array($_GET['id']));

				if ($request->rowCount() > 0) {
					$data = $request->fetch();
		?>
					<div id="core">
						<div id="header">
							<div id="banner">
							Blog of <?php echo $data['author']?>
							</div>
						</div>
						<div id="menu">
							<div>
								<span class="menu_element_left actual_page">Blog</span>
								<a href="" class="menu_element_left">About</a>
								<a href="" class="menu_element_left">Contact</a>
							</div>
							<div class="menu_element_right">
								<a href="../../index.php">Return to index</a>
							</div>
						</div>

						<div id="right_core">
							<div class="right_core_group">
								<span class="right_core_title">Last comments</span>
								<p>John : GOod blog</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
							</div>

							<div class="right_core_group">
								<span class="right_core_title">Archives</span>
							</div>
						</div>


						<div id="left_core">
							<div class="entry">
								<span class="title">Title : <?php echo htmlspecialchars($data['title']); ?></span>
								<span class="post_date"><br />Published : <?php echo $data['post_date']; ?></span>
								<span class="post"><?php echo htmlspecialchars($data['post']); ?><br /></span>
							</div>

							<div id="comments">
								<div id="post_comment">
									<span class="title">Leave a comment</span>
									<br /><br />
									<form action="post_comment_check.php"method="post">
										Name : <input type="text" name="name" />
										<br /><br />
										Email : <input type="text" name="email" />
										<br /><br />
										<textarea name="comment" rows="10" cols="50" id="comment"></textarea>
										<br /><br />
										<input type="submit" id="post_comment_button" value="Post Comment" />
									</form>
								</div>
							</div>
						</div>


		<?php
				}

				else {
					echo "This post doesn't exist. Redirection in 2 seconds...";
					header("refresh:2;url=index.php");
				}
			}

			else {
				echo "No post id specified. Redirection in 2 seconds...";
				header("refresh:2;url=index.php");
			}
		?>
	</body>
</html>