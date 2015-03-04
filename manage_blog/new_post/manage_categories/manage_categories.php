<?php include_once('../../../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="manage_categories_style.css">
		<title>Blog : Manage your categories</title>
	</head>

	<?php
		if (isset($_SESSION['username'])) {
	?>
		<body>
			<a href="../new_post.php">Return to "Write a new post"</a>
			<center>
        Add a new category :
        <form action="new_category/new_category_action.php" method="post">
          <input type="text" name="category" />
          <input type="submit" value="OK" />
        </form>
        <br /><br />
        Your categories :
        <br /><br />
        <table>
          <?php
            include_once ('../../../sql_connexion.php');
            include_once('../new_post_functions.php');
            // Getting all the post categories of the user.
            $data_array = get_categories_list($bdd, $_SESSION['username']);

            foreach ($data_array as $element) {
              echo '<tr>
                      <td>' . htmlspecialchars($element) . '</td>
                      <td>
                          <a href="delete_category/delete_category_confirmation.php?category_name='
                                    . $element . '">
                            Delete
                          </a>
                      </td>
                    </tr>';
            }
          ?>
        </table>
			</center>
		</body>
	<?php
		}

		else { // If the user is not connected to an account.
			echo 'You must be connected to post a new blog entry. Redirection in 2 seconds...';
			header("refresh:2;url=../../login.php");
		}
	?>
</html>
