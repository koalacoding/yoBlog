<?php
	/*----------------------------------------
	------------------------------------------
	----------------SHOW ABOUT----------------
	------------------------------------------
	----------------------------------------*/


	function show_about($bdd, $username) {
		$request = $bdd->prepare("SELECT about FROM blog_options WHERE username = ?");
		$request->execute(array($username));
		$data = $request->fetch();
		echo nl2br(htmlspecialchars($data['about']));
	}
?>