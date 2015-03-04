<?php include('to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog</title>
		<style>
			#top_block {
				float: right;

				font-family: 'Source Sans Pro', sans-serif;
			}

			#welcome_message {
				font-weight: bold;
				padding-right: 7px;
			}

			#right_buttons {
				margin-top: 10px;
			}

			.right_buttons_element {

				background-color: rgb(86, 86, 86);
				color: rgb(255, 255, 255);

				font-size: 14px;
				text-decoration: none;

				border-bottom: 3px solid rgb(60, 60, 60);

				padding-bottom: 7px;
				padding-left: 7px;
				padding-right: 7px;
				padding-top: 7px;
			}

			.right_buttons_element:hover {
				background-color: rgb(96, 96, 96);
			}
		</style>
	</head>

	<body>
		<center>
			<?php
				// If the user is connected to an account.
				if (isset($_SESSION['username']))
				{
			?>
				    <div id="top_block">
				    	<div id="welcome_message">Welcome <?php echo $_SESSION['username'] ?></div>
						<div id="right_buttons">
							<a href="manage_blog/manage_blog.php" class="right_buttons_element">
							Manage your blog</a>
						    <a href="logout.php" class="right_buttons_element">Logout</a>
					    </div>
				    </div>

			<?php
				}

				else {
			?>
					<div id="top_block">
						<div id="welcome_message">You are not connected</div>
						<div id="right_buttons">
							<a href="login.php" class="right_buttons_element">Login to an account</a>
						  	<a href="register/register.php"
						  		class="right_buttons_element">Register a new account</a>
						 </div>
					</div>
			<?php
				}
			?>
			<br /><br />
		</center>
	</body>
</html>
