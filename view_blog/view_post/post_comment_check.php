<?php 
	include_once('../../to_include.php');
	include_once('post_comment_check_functions.php');

	$error = FALSE;

	if (isset($_POST['post_id']) && isset($_POST['name']) && isset($_POST['comment'])) {
		// If the username or the message the user sent is empty, there is an error.
		if (is_username_empty($_POST['name']) || is_comment_empty($_POST['comment'])) {
			$error = TRUE;
		}

		if ($error == FALSE) {
			include_once('../../sql_connexion.php');

			// If the user's email have been posted, and if it is not empty.
			if (isset($_POST['email']) && is_email_valid($_POST['email'])) {
				// Inserting into the database the new comment.
				$request = $bdd->prepare("INSERT INTO comments(post_id, author, email, comment, post_date)
											VALUES(?, ?, ?, ?, NOW())");
				// Executing the prepared request.
				$request->execute(array($_POST['post_id'], $_POST['name'], $_POST['email'], $_POST['comment']));
			}

			else { // If the user's email has not been posted, or if it is empty.
				// Inserting into the database the new comment.
				$request = $bdd->prepare("INSERT INTO comments(post_id, author, comment, post_date, time_since_unix_epoch)
											VALUES(?, ?, ?, NOW(), ?)");
				// Executing the prepared request.
				$request->execute(array($_POST['post_id'], $_POST['name'], $_POST['comment'],
										time()));
			}

			/* The user's comment has been posted,
			now we redirect him to the post where he sent a comment. */
			if (isset($_POST['post_id'])) {
				header("Location: view_post.php?id=" . $_POST['post_id']);
			}
		}

		elseif (isset($_POST['post_id'])) { // If there is an error.
			header("Location: view_post.php?id=" . $_POST['post_id']);
		}
	}

	elseif (isset($_POST['post_id'])) { // If name or comment have not been posted.
		header("Location: view_post.php?id=" . $_POST['post_id']);
	}
 ?>