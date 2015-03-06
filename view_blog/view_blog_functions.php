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

	function print_posts($request, $bdd) {
		while ($posts = $request->fetch()) {
			echo '
			<div class="entry">
				<span class="title">
					<a href="view_post/view_post.php?id=' . $posts['id'] . '">'
										. htmlspecialchars($posts['title']) .
					'</a>
				</span>

				<div class="post_date">
					<div class="post_date_content">
						Published : ' . $posts['post_date'] .
					'</div>
				</div>
				<div class="post_categories">
					<a href="view_blog.php?category=' . $posts['category'] . '">' . $posts['category'] . '</a>
				</div>

				<div class="number_of_comments">'
				. print_post_number_of_comments($bdd, $posts['id']) .
				'</div>
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

		print_posts($request, $bdd);
	}

	/*---------------------------------------
	--GET AND PRINT POSTS BY MONTH AND YEAR--
	---------------------------------------*/

	function print_posts_by_month_and_year($month, $year, $bdd) {
		// Adding a zero if the month is lower than 10.
		if ($month < 10) {
			$month = "0" . $month;
		}

		$regex = $year . '-' . $month; // Transforming the date into this format : YYYY-MM.

		$request = $bdd->query("SELECT * FROM posts WHERE post_date LIKE '%$regex%'
														ORDER BY time_since_unix_epoch DESC");

		print_posts($request, $bdd);
	}

	/*---------------------------------------
	------GET AND PRINT POSTS BY CATEGORY----
	---------------------------------------*/

	function print_posts_by_category($bdd, $username, $category) {
		$request = $bdd->prepare("SELECT * FROM posts WHERE author=? AND category=?
															ORDER BY time_since_unix_epoch DESC");
		$request->execute(array($username, $category));

		print_posts($request, $bdd);
	}

	/*---------------------------------------
	----GET THE POST'S NUMBER OF COMMENTS----
	---------------------------------------*/

	function print_post_number_of_comments($bdd, $post_id) {
		$request = $bdd->prepare("SELECT COUNT(*) FROM comments WHERE post_id=?");
		$request->execute(array($post_id));

		// Printing a small chat icon and the number of comments for the post.
		$string = '<span class="number_of_comments_text"><a href="view_post/view_post.php?id='
					. $post_id . '#comments">' . $request->fetchColumn() . ' comments</a></span>';

		$request->closeCursor();

		return $string;
	}
?>
