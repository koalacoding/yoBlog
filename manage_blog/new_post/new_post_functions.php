<?php

	/*----------------------------------------
	------------------------------------------
	------------GET CATEGORIES LIST-----------
	------------------------------------------
	----------------------------------------*/


  // Get all the post categories of an user.
  function get_categories_list($bdd, $username) {
    $request = $bdd->prepare("SELECT category_name FROM post_categories WHERE username=?");
    $request->execute(array($username));

    $data_array = array();

    while ($data = $request->fetch()) {
      array_push($data_array, $data['category_name']);
    }

    $request->closeCursor();

    return $data_array;
  }
