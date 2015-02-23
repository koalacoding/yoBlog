<?php include('../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="view_blog.css">
		<meta charset="utf-8" />
		<title>Blog</title>
	</head>
	<body>
		<?php
			if (isset($_GET['username'])) {
				include_once ('../sql_connexion.php');

				$request = $bdd->prepare("SELECT username FROM users WHERE username=:username");
				$request->execute(array('username'=>$_GET['username']));
				$request->closeCursor();

				if ($request->rowCount() > 0) {
		?>
					<div id="core">
						<div id="header">
							<div id="banner">
							Blog of <?php echo $_GET['username']?>
							</div>
						</div>
						<div id="menu">
							<div>
								<span class="menu_element_left actual_page">Blog</span>
								<a href="" class="menu_element_left">About</a>
								<a href="" class="menu_element_left">Contact</a>
							</div>
							<div class="menu_element_right">
								<a href="../index.php">Return to index</a>
							</div>
						</div>

						<div id="right_core">
							<div class="right_core_group">
								<span class="right_core_title">About</span>
		<?php
									$request = $bdd->prepare("SELECT about
																FROM about_blog
																WHERE username = ?");
									$request->execute(array($_GET['username']));
									$about = $request->fetch();
									echo nl2br(htmlspecialchars($about['about']));
									echo '<br /><br />';
		?>
							</div>
							<div class="right_core_group">
								<span class="right_core_title">Last comments</span>
		<?php
									$request = $bdd->prepare("SELECT posts.title, posts.id, comments.author FROM posts, comments
																WHERE posts.id = comments.post_id AND posts.author = ?
																ORDER BY comments.time_since_unix_epoch DESC LIMIT 0,5");
									$request->execute(array($_GET['username']));

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
								<!-- Months and years categories. -->
								<span class="right_core_title">Archives</span>
		<?php
									$request = $bdd->query("SELECT * FROM archives_months ORDER BY year DESC, month DESC");

									while ($data = $request->fetch()) {
										// Transforming the month numbers into month name.
										$month_number = $data['month'];
										$date_object = DateTime::createFromFormat
																	('!m', $month_number);
										$month_name = $date_object->format('F');

										echo '<span class="month_archive">';
										echo '<a href="view_blog.php?username=' . $_GET['username'] . '&month=' . $data['month'] . '&year=' . $data['year'] . '">' . $month_name . ' ' . $data['year'] . '</a>';
										echo '</span>';
										echo '<br />';
									}

									$request->closeCursor();
		?>
							</div>
						</div>


						<div id="left_core">
		<?php
								/* If a wanted month and year has been specified,
								and if it is both numeric,
								we get the blog posts from this month and year. */
								if (isset($_GET['month']) && isset($_GET['year'])
									&& is_numeric($_GET['month']) && is_numeric($_GET['year'])) {
									// Adding a zero if the month is lower than 10.
									if ($_GET['month'] < 10) {
										$_GET['month'] = "0" . $_GET['month'];
									}

									$regex = $_GET['year'] . '-' . $_GET['month'];
									$request = $bdd->query("SELECT * FROM posts WHERE post_date LIKE '%$regex%'");
									while ($posts = $request->fetch()) {
		?>
										<div class="entry">
											<span class="title">
												<a href="view_post/view_post.php?id=<?php echo $posts['id'] ?>">
													<?php echo htmlspecialchars($posts['title']) ?></a>
											</span>
											<div class="post_date">
												<br />
												<div class="post_date_clock_image">
													<img src="../images/clock.png" height="15px" width="15px"/>
												</div>
												<div class="post_date_content">
													Published : <?php echo $posts['post_date']; ?>
												</div>
											</div>
											<span class="post"><?php echo htmlspecialchars($posts['post']) ?><br /></span>
										</div>
		<?php
									} $request->closeCursor();
								}

								 /* If no specific month and year has been specified,
								or if it is typed incorrectly. */
								else {
									// Getting all the posts where the author is $_GET['username']
									$request = $bdd->prepare("SELECT * FROM posts WHERE author=? ORDER BY time_since_unix_epoch DESC");
									$request->execute(array($_GET['username']));

									while ($posts = $request->fetch()) {
		?>
										<div class="entry">
											<span class="title">
												<a href="view_post/view_post.php?id=<?php echo $posts['id'] ?>">
													<?php echo htmlspecialchars($posts['title']) ?></a>
											</span>
											<div class="post_date">
												<br />
												<div class="post_date_clock_image">
													<img src="../images/clock.png" height="15px" width="15px"/>
												</div>
												<div class="post_date_content">
													Published : <?php echo $posts['post_date']; ?>
												</div>
											</div>
											<span class="post"><?php echo htmlspecialchars($posts['post']) ?><br /></span>
										</div>
		<?php					
									}
								}
		?>
						</div>
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