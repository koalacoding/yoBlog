<?php include('../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog</title>
		<style>
			body {
				background-color: #EDEDED;
				font-family: "Lucida Grande", Verdana, Arial, Sans-Serif;
				font-size: 80%;
			}

			a {
				color: #FFFFFF;
			}

			a:visited {
				color: #FFFFFF;
			}

			#core {
				overflow: hidden;
				width: 50%;
				min-width: 780px;
				margin-left: auto;
				margin-right: auto;
				border: 1px solid #ddd;

				background-color: #FFFFFF;
			}

			#header {
				height: 200px;
			}

			#banner {
				position: relative;
				top: 50%;
				transform: translateY(-50%);

				text-align: center;
				font-size: 400%;
			}

			#menu {
				height: 30px;
				margin-bottom: 35px;
				background-color: #000000;

				text-decoration: none;
				color: #FFFFFF;
			}

			.menu_element_left:hover, .menu_element_right:hover {
				background-color: #333;

			}

			.menu_element_left, .menu_element_right {
				padding:4px;
				padding-left:10px;
				padding-right:10px;
				margin-top:7px;
			}

			.menu_element_left {
				float: left;
				margin-left: 15px;
			}

			.menu_element_right {
				float: right;
				margin-right: 15px;
			}

			.actual_page {
				background-color: #FFFFFF;
				color: #000000;
			}

			.actual_page:hover {
				background-color: #FFFFFF;
			}

			#right_core, #left_core {
				margin: 20px;
			}

			#right_core {
				float: right;
				max-width: 14%;

				border-left: solid 1px #D5D5D5;
				padding: 20px;
			}

			.right_core_group {
				padding-bottom: 25px;
			}

			.right_core_title {
				display: block;
				margin-bottom: 25px;

				color: #444;
				font-size: 1.4em;
				font-weight: normal;
				letter-spacing: -1px;
			}

			#left_core {
				float: left;
				width: 70%;
			}

			.entry {
				display: block;
				margin-bottom:50px;
			}

			.title {
				color: #444;
				font-size: 2.4em;
				font-weight: normal;
				letter-spacing: -1px;
			}

			.post_date {
				background-image: url("../images/clock.png");

				font-size: 0.8em;
				color: #bbb;
				letter-spacing: .07em;
			}

			.post {
				display: block;
				margin-top: 10px;

				font-size: 1.2em;
				line-height: 1.8em;
				text-align: justify;
				color: #444;				
			}
		</style>
	</head>
	<body>
		<?php
			if (isset($_GET['username'])) {
				include '../sql_connexion.php';

				$request = $bdd->prepare("SELECT username FROM users WHERE username=:username");
				$request->execute(array('username'=>$_GET['username']));

				if ($request->rowCount() > 0) {
		?>
					<div id="core">
						<div id="header">
							<div id="banner">
							Blog of <?php echo $_GET['username']?>
							</div>
						</div>
						<div id="menu">
							<div>
								<span class="menu_element_left actual_page">Blog</span>
								<a href="" class="menu_element_left">About</a>
								<a href="" class="menu_element_left">Contact</a>
							</div>
							<div class="menu_element_right">
								<a href="../index.php">Return to index</a>
							</div>
						</div>

						<div id="right_core">
							<div class="right_core_group">
								<span class="right_core_title">Last comments</span>
								<p>John : GOod blog</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
								<p>Mike : About 33 ?</p>
							</div>

							<div class="right_core_group">
								<span class="right_core_title">Archives</span>
							</div>
						</div>


						<div id="left_core">
		<?php
								// Getting all the posts where the author is $_GET['username']
								$request = $bdd->prepare("SELECT * FROM posts WHERE author=:username");
								$request->execute(array('username'=>$_GET['username']));

								while ($posts = $request->fetch()) {
		?>
									<div class="entry">
										<span class="title">Title : <?php echo htmlspecialchars($posts['title']) ?></span>
										<span class="post_date"><br />Published : <?php echo $posts['post_date'] ?></span>
										<span class="post"><?php echo htmlspecialchars($posts['post']) ?><br /></span>
									</div>
		<?php					
								}
		?>
						</div>
					</div>
		<?php
				}

				else {
					echo "This blog doesn't exist. Redirection in 2 seconds...";
					header("refresh:2;url=index.php");
				}
			}

			else {
				echo "No blog name specified. Redirection in 2 seconds...";
				header("refresh:2;url=index.php");
			}
		?>
	</body>
</html>