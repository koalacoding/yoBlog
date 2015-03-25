<?php include('../include/session.php'); ?>
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
				include_once ('../sql/sql_connexion.php');
				include_once ('view_blog_functions.php');

				$blog_exists = check_if_blog_exists($bdd, $_GET['username']);

				if ($blog_exists == TRUE) {
		?>
					<div id="core">
						<div id="header">
							<div id="banner">
							Blog of <?php echo $_GET['username']?>
							</div>
						</div>
						<div id="menu">
							<div>
								<a href="view_blog.php?username=<?php echo $_GET['username']; ?>" class="menu_element_left">Blog</a>
								<a href="about/about.php?username=<?php echo $_GET['username']; ?>" class="menu_element_left">About</a>
								<a href="contact/contact.php?username=<?php echo $_GET['username']; ?>" class="menu_element_left">Contact</a>
							</div>
							<div class="menu_element_right">
								<a href="../index.php">Return to index</a>
							</div>
						</div>

						<div id="right_core">
							<div class="right_core_group">
								<span class="right_core_title">About</span>
		<?php
									include_once ('view_blog_functions.php');
									show_short_about($bdd, $_GET['username']);
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

							<div class="right_core_group">
								<span class="right_core_title">Categories</span>
								<?php print_categories_link($bdd, $_GET['username']); ?>
							</div>
						</div>


						<div id="left_core">
		<?php
								/* If a wanted month and year has been specified,
								and if it is both numeric,
								we get the blog posts from this month and year. */
								if (isset($_GET['month']) && isset($_GET['year'])
									&& is_numeric($_GET['month']) && is_numeric($_GET['year'])) {
										print_posts_by_month_and_year($_GET['month'], $_GET['year'], $bdd);
								}

								else if (isset($_GET['category'])) {
									print_posts_by_category($bdd, $_GET['username'], $_GET['category']);
								}

								/* If no specific month and year has been specified,
								or if it is typed incorrectly, or if no category has been specified. */
								else {
									print_all_posts($bdd, $_GET['username']);
								}
		?>
						</div>
					</div>
		<?php
				}

				else {
					echo "This blog doesn't exist. Redirection in 2 seconds...";
					header("refresh:2;url=../index.php");
				}
			}

			else {
				echo "No blog name specified. Redirection in 2 seconds...";
				header("refresh:2;url=../index.php");
			}
		?>
	</body>
</html>
