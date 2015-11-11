<?php
  /*----------------------------------------
	------------------------------------------
	---------ADD NEW POST IN DATABASE---------
	------------------------------------------
	----------------------------------------*/


  function add_new_post($bdd, $username, $category, $title, $post_content) {
    $request = $bdd->prepare("INSERT INTO posts(author, category, title, post, post_date,
                              time_since_unix_epoch) VALUES(?, ?, ?, ?, NOW(), ?)");
    $request->execute(array($username, $category, $title, $post_content, time()));
    $request->closeCursor();
  }
?>
