<?php include_once('include/session.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="index_style.css">
		<title>Blog</title>
	</head>

	<body>
		<div id="header"></div>

		<center>
			<br />
			<h1>PHP Blog</h1>
			<h2>An easy way to make your own blog.</h2>
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
