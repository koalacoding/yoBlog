<?php

  /*----------------------------------------
  ------------------------------------------
  ------CHECK IF USER CAN DELETE CATEGORY---
  ------------------------------------------
  ----------------------------------------*/


  function check_if_user_has_access_on_category($bdd, $username, $category) {
    $request = $bdd->prepare("SELECT COUNT(*) FROM post_categories WHERE username=?
                              AND category_name=?");
    $request->execute(array($username, $category));

    if ($request->fetchColumn() > 0) {
      $request->closeCursor();
      return TRUE;
    }

    $request->closeCursor();
    return FALSE;
  }


  /*----------------------------------------
  ------------------------------------------
  --------DELETE CATEGORY FROM DATABASE-----
  ------------------------------------------
  ----------------------------------------*/


  function delete_category($bdd, $username, $category) {
    $request = $bdd->prepare("DELETE FROM post_categories WHERE username=? AND category_name=?");
    $request->execute(array($username, $category));
    $request->closeCursor();
  }

?>
