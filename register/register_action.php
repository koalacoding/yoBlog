<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog : Registering a new account</title>
	</head>

	<body>
		<center>
			<?php
				include_once('register_action_functions.php');

				if (isset($_POST['username'], $_POST['password'], $_POST['password_confirmation'],
									$_POST['email'])) {
					$registration_result = register_account($_POST['username'], $_POST['password'],
																									$_POST['password_confirmation'], $_POST['email']);

					if ($registration_result != 1) { // If the registration failed, we show the error message.
						echo $registration_result;
						echo '<br /><br />';
					}

					echo 'Redirection in 2 seconds...';

					if ($registration_result == 1) { // If registration succeeded.
						header("refresh:2;url=../index.php");
					}

					else {
						header("refresh:2;url=register.php");
					}

				}
			?>
		</center>
	</body>
</html>
