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

					$blog_post_author = $data['author'];

					$request->closeCursor();
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
								<a href="../view_blog.php?username=<?php echo $data['author']; ?>">Return to blog</a>
							</div>
						</div>

						<div id="right_core">
							<div class="right_core_group">
								<span class="right_core_title">About</span>
		<?php
									include_once ('../view_blog_functions.php');
									show_short_about($bdd, $data['author']);
									echo '<br /><br />';
		?>
								<span class="right_core_title">Last comments</span>
		<?php
									// Getting all the comments on the blog posts of the blog owner.
									$request = $bdd->prepare("SELECT posts.title, posts.id, comments.author FROM posts, comments
																WHERE posts.id = comments.post_id AND posts.author = ?
																ORDER BY comments.time_since_unix_epoch DESC LIMIT 0,5");
									$request->execute(array($blog_post_author));

									while ($data = $request->fetch()) {
		?>
										<span class="last_comment"><?php echo htmlspecialchars($data['author']) .
												' in <a href="view_post/view_post.php?id=' . $data['id'] . '">' .
												htmlspecialchars($data['title']) . '</a>'; ?>
											<br /><br />
										</span>
		<?php
									} $request->closeCursor();			
		?>
							</div>

							<div class="right_core_group">
								<span class="right_core_title">Archives</span>
							</div>
						</div>


						<div id="left_core">
							<?php
								$request = $bdd->prepare("SELECT * FROM posts WHERE id=?");
								$request->execute(array($_GET['id']));

								$data = $request->fetch();

								$post_title = $data['title'];
							?>
							<div class="entry">
								<span class="title">Title : <?php echo htmlspecialchars($data['title']); ?></span>
								<span class="post_date"><br />Published : <?php echo $data['post_date']; ?></span>
								<span class="post"><?php echo htmlspecialchars($data['post']); ?><br /></span>
							</div>

							<div id="comments">
								<span class="title"> <!-- Number of comments -->
									<?php 
										// We count the number of comments to display it.
										$request = $bdd->prepare("SELECT COUNT(*) FROM comments WHERE post_id=?");
										$request->execute(array($_GET['id']));

										$number_of_comments = $request->fetchColumn(); 

										echo $number_of_comments;
									?> comments for "<?php echo htmlspecialchars($post_title); ?>"
								</span>

								<div id="show_comments">
									<?php

										// Getting all the comments linked to the id of the actual post.
										$request = $bdd->prepare("SELECT * FROM comments WHERE post_id=?");
										$request->execute(array($_GET['id']));

										$background = 1; // Color background of the comment. 0 = white, 1 = grey.

										// While loop to display all the comments.
										while ($comments = $request->fetch()) {
											 // If the background of the last comment was grey, we change it to white for the next comment.
											if ($background == 1) {
												$background = 0;
											}

											else {
												$background = 1;
											}
									?>
											<div class="comment_background<?php echo $background; ?>">
												<div class="comment">
													<span class="comment_author">
														<?php 
															echo htmlspecialchars($comments['author']);

															// If the user has entered an email.
															if (strlen($comments['email']) > 0) {
																echo ' (' . htmlspecialchars($comments['email']) . ')';
															}
														?>
													</span>
													<span class="comment_post_date">
														<br />
														<img src="../../images/clock.png" class="comment_post_date_clock_image"/>
														<?php echo $comments['post_date']; ?>
													</span>
													<div class="comment_content">
														<?php echo nl2br(htmlspecialchars($comments['comment'])); ?>
													</div>
												</div>
											</div>
									<?php
										}
									?>
								</div>

								<div id="post_comment">
									<span class="title">Leave a comment</span>
									<br /><br />
									<form action="post_comment_check.php" method="post">
										<input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
										Name : <input type="text" name="name" />
										<br /><br />
										Email : <input type="text" name="email" />
										<br /><br />
										<textarea name="comment" rows="10" cols="50" id="post_comment_textarea"></textarea>
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