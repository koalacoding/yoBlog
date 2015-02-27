<?php

	/*----------------------------------------
	------------------------------------------
	--------GETTING BLOG'S OPTIONS DATA-------
	------------------------------------------
	----------------------------------------*/


	/*---------------------------------------
	--------GETTING "SHORT ABOUT" DATA-------
	---------------------------------------*/

	function get_short_about_data($bdd, $username) {
		$request = $bdd->prepare("SELECT short_about FROM blog_options WHERE username=?");
		$request->execute(array($username));
		$data = $request->fetch();
		$request->closeCursor();
		return $data['short_about'];
	}

	/*---------------------------------------
	-----------GETTING "ABOUT" DATA----------
	---------------------------------------*/

	function get_about_data($bdd, $username) {
		$request = $bdd->prepare("SELECT about FROM blog_options WHERE username=?");
		$request->execute(array($username));
		$data = $request->fetch();
		$request->closeCursor();
		return $data['about'];
	}	


	/*----------------------------------------
	------------------------------------------
	------------------CHECKING----------------
	------------------------------------------
	----------------------------------------*/


	/*------------------------------------------------------------
	----------CHECK IF USER HAS ALREADY POSTED BLOG OPTIONS-------
	------------------------------------------------------------*/

	// Checking if the user has already posted the options of his blog.
	function user_has_already_posted_options($bdd, $username) { 
		$request = $bdd->prepare("SELECT COUNT(*) FROM blog_options WHERE username=?");
		$request->execute(array($username));

		if ($request->fetchColumn() == 1) {
			$request->closeCursor();
			return TRUE;
		}

		$request->closeCursor();
		return FALSE;
	}


	/*-----------------------------------------------------
	-------------------------------------------------------
	---UPDATING / INSERTING BLOG OPTIONS IN THE DATABASE---
	-------------------------------------------------------
	-----------------------------------------------------*/


	/*------------------------------------
	----------UPDATING BLOG OPTIONS-------
	------------------------------------*/

	function update_blog_options($bdd, $short_about, $about, $username) {
				$request = $bdd->prepare("UPDATE blog_options SET short_about=?, about=?
											WHERE username=?");
				$request->execute(array($short_about, $about, $username));
				$request->closeCursor();
	}

	/*------------------------------------
	---------INSERTING BLOG OPTIONS-------
	------------------------------------*/

	function insert_blog_options($bdd, $username, $short_about, $about) {
		$request = $bdd->prepare("INSERT INTO blog_options(username, short_about, about)
									VALUES(?, ?, ?)");
		$request->execute(array($username, $short_about, $about));
		$request->closeCursor();		
	}

?>