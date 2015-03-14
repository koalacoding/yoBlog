<?php
	session_start();

	if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
	}

	else if (time() - $_SESSION['CREATED'] > 1800) { // Session started more than 30 minutes ago.
			// Change session ID for the current session and invalidate old session ID.
	    session_regenerate_id(true);
	    $_SESSION['CREATED'] = time();  // Update creation time.
	}

	// If last request was more than 30 minutes ago.
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
	    session_unset(); // Unset $_SESSION variable for the run-time.
	    session_destroy(); // Destroy session data in storage.
	}

	$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time stamp.
