<?php

function is_username_empty($username) {
	if (!preg_match("#^[a-zA-Z0-9_-]+$#", $username)) {
		return TRUE;
	}

	return FALSE;
}

function is_comment_empty($username) {
	if (!preg_match("#\S+#", $username)) {
		return TRUE;
	}

	return FALSE;
}

function is_email_valid($email) {
	if (!preg_match("#^[a-zA-Z0-9-_]{1,17}@[a-zA-Z0-9-_]{1,17}.[a-zA-Z-]{1,7}$#", $email)) {
		return FALSE;
	}

	return TRUE;
}

?>