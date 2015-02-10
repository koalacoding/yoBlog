<?php include_once('../to_include.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Registration</title>
	</head>
	<body>
		<center>
			<?php
				include_once('register_check_functions.php');

				if (isset($_POST['username']) && isset($_POST['password'])
					&& isset($_POST['password_confirmation']) && isset($_POST['email'])) {
					$registration_result = register_account($_POST['username'], $_POST['password'],
														$_POST['password_confirmation'],
														$_POST['email']);

					switch($registration_result) {
						case 1:
							echo 'Account successfully registered.';
							break;
						case 2:
							echo 'Invalid username.';
							break;
						case 3:
							echo 'Username already taken.';
							break;
						case 4:
							echo 'Invalid password.';
							break;
						case 5:
							echo "Passwords don't match.";
							break;
						case 6:
							echo 'Invalid email.';
							break;
					}
					echo '<br /><br />Redirection in 2 seconds...';

					if ($registration_result == 1) {
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
