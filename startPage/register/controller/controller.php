<?php
require_once '../model/Register.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/controller/controller.php';

$register = new Register;

if (isset($_POST['username'], $_POST['password'], $_POST['passwordConfirmation'])) {
  if ($register->isUsernameValid($_POST['username'])) {
    if (!$register->checkIfUsernameAlreadyTaken($_POST['username'])) {
			if ($register->isPasswordValid($_POST['password'])) {
				if ($register->checkIfPasswordsMatch($_POST['password'], $_POST['passwordConfirmation'])) {
					$register->insertAccountInDb($_POST['username'], $_POST['password']);
					echo 'ok';
				}

				else {
					echo 'Passwords don\'t match';
				}
			}

			else {
				echo 'Invalid password';
			}
		}

		else {
			echo 'Username already taken';
		}
  }

	else {
		echo 'Invalid username';
	}
}

else {
	echo 'Error';
}
