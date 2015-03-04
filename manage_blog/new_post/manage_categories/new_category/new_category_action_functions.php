<?php
  /*----------------------------------------
  ------------------------------------------
  -----ADD A NEW CATEGORY IN THE DATABASE---
  ------------------------------------------
  ----------------------------------------*/


  function add_new_category($bdd, $username, $category) {
    $request = $bdd->prepare("INSERT INTO post_categories(username, category_name) VALUES(?, ?)");
    $request->execute(array($username, $category));
    $request->closeCursor();
  }
?>
