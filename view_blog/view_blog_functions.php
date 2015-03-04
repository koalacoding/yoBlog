<?php

	/*----------------------------------------
	------------------------------------------
	----------CHECKING IF BLOG EXISTS---------
	------------------------------------------
	----------------------------------------*/


	function check_if_blog_exists($bdd, $username) {
		$request = $bdd->prepare("SELECT username FROM users WHERE username=?");
		$request->execute(array($username));


		if ($request->rowCount() > 0) {
			$request->closeCursor();
			return TRUE;
		}

		$request->closeCursor();
		return FALSE;
	}


	/*----------------------------------------
	------------------------------------------
	-------------SHOW SHORT ABOUT-------------
	------------------------------------------
	----------------------------------------*/


	function show_short_about($bdd, $username) {
		$request = $bdd->prepare("SELECT short_about FROM blog_options WHERE username = ?");
		$request->execute(array($username));
		$data = $request->fetch();
		echo nl2br(htmlspecialchars($data['short_about']));
		$request->closeCursor();
	}


	/*----------------------------------------
	------------------------------------------
	---GET, PRINT AND LINK CATEGORIES LIST----
	------------------------------------------
	----------------------------------------*/


	function print_categories_link($bdd, $username) {
			// This file contains the "get_categories_list" function.
			include_once('../manage_blog/new_post/new_post_functions.php');

			$categories_list = get_categories_list($bdd, $username);

			// Adding a link to the "No category" category.
			echo '<a href="view_blog.php?username=' . $username . '&category=No category">
						No category</a><br />';

			foreach ($categories_list as $category) {
				echo '<a href="view_blog.php?username=' . $username . '&category=' . $category . '">'
							. htmlspecialchars($category) . '</a><br />';
			}
	}


	/*----------------------------------------
	------------------------------------------
	----------------BLOG POSTS----------------
	------------------------------------------
	----------------------------------------*/

	/*---------------------------------------
	-------PRINT POSTS (POSTS TEMPLATE)------
	---------------------------------------*/

	function print_posts($request) {
		while ($posts = $request->fetch()) {
			echo '
			<div class="entry">
				<span class="title">
					<a href="view_post/view_post.php?id=' . $posts['id'] . '">'
										. htmlspecialchars($posts['title']) .
					'</a>
				</span>

				<div class="post_date">
					<br />
					<div class="post_date_clock_image">
						<img src="../images/clock.png" height="15px" width="15px"/>
					</div>
					<div class="post_date_content">
						Published : ' . $posts['post_date'] .
					'</div>
				</div>
				<span class="post">' . htmlspecialchars($posts['post']) . '<br /></span>
			</div>';
		}

		$request->closeCursor();
	}

	/*---------------------------------------
	----------GET AND PRINT ALL POSTS--------
	---------------------------------------*/

	function print_all_posts($bdd, $username) {
		$request = $bdd->prepare("SELECT * FROM posts WHERE author=? ORDER BY time_since_unix_epoch
																																					DESC");
		$request->execute(array($username));

		print_posts($request);
	}

	/*---------------------------------------
	------GET AND PRINT POSTS BY CATEGORY----
	---------------------------------------*/

	function print_posts_by_category($bdd, $username, $category) {
		$request = $bdd->prepare("SELECT * FROM posts WHERE author=? AND category=?");
		$request->execute(array($username, $category));

		print_posts($request);
	}
?>
