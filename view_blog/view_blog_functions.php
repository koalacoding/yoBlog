<?php

function show_short_about($bdd, $username) {
	$request = $bdd->prepare("SELECT short_about FROM blog_options WHERE username = ?");
	$request->execute(array($username));
	$data = $request->fetch();
	echo nl2br(htmlspecialchars($data['short_about']));
}

?>