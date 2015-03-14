<?php
	session_start(); // To get the current session.

	// Destroying the current session.
	session_unset();
	session_destroy();

	echo 'Logging out... Redirection in 2 seconds.';
	header("refresh:2;url=../index.php");
