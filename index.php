<?php include_once('include/session.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="index_style.css">
		<title>Blog</title>
	</head>

	<body>
		<center>
			<?php
				include_once('index_functions.php');

				if (isset($_SESSION['username'])) { // If the user is connected to an account.
					show_connected_buttons($_SESSION['username']);
				}

				else {
					show_not_connected_buttons();
				}
			?>
		</center>
	</body>
</html>
