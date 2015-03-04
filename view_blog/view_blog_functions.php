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

			foreach ($categories_list as $category) {
				echo '<a href="view_blog.php?username=' . $username . '&category=' . $category . '">'
							. htmlspecialchars($category) . '</a><br />';
			}
	}

?>
