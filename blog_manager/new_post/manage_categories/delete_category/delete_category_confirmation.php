<?php include_once('../../../../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog : Category deletion confirmation</title>
	</head>

	<?php
		if (isset($_SESSION['username'])) {
	?>
		<body>
			<center>
        Do you really want to delete the category "<?php
				echo htmlspecialchars($_GET['category_name']);
				?>" ?
        <br /><br />
        <a href="../manage_categories.php">No</a>
        <br />
        <br />
        <a href="delete_category_action.php?category_name=<?php echo $_GET['category_name']; ?>">
          Yes
        </a>
			</center>
		</body>
	<?php
		}

		else { // If the user is not connected to an account.
			echo 'You must be connected to post a new blog entry. Redirection in 2 seconds...';
			header("refresh:2;url=../../../login.php");
		}
	?>
</html>
