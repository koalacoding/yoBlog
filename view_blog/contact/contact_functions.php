<?php
	/*----------------------------------------
	------------------------------------------
	---------------SHOW CONTACT---------------
	------------------------------------------
	----------------------------------------*/


	function show_contact($bdd, $username) {
		$request = $bdd->prepare("SELECT contact FROM blog_options WHERE username = ?");
		$request->execute(array($username));
		$data = $request->fetch();
		echo nl2br(htmlspecialchars($data['contact']));
	}
?>