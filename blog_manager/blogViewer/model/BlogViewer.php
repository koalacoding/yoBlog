<?php
class BlogViewer {
  /*---------------------------------------------------------
  -----------------------------------------------------------
  --------------GET BLOG TITLE AND DESCRIPTION---------------
  -----------------------------------------------------------
  ---------------------------------------------------------*/

  function getBlogTitleAndDescription($username) {
		require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $request = $bdd->prepare("SELECT title, description FROM blogOptions
                            WHERE username=?");
    $request->execute(array($username));
    $fetch = $request->fetch();
    $request->closeCursor();

    return $fetch; // Returns an array containing the blog's options.
  }


  /*-----------------------------------------
  -------------------------------------------
  --------------GET HEADER CSS---------------
  -------------------------------------------
  -----------------------------------------*/

  function getHeaderCss($username) {
	  require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $request = $bdd->prepare("SELECT headerBackgroundImage, headerTextColor FROM blogOptions
                              WHERE username=?");
    $request->execute(array($username));
    $fetch = $request->fetch();
    $request->closeCursor();

    echo $fetch['headerBackgroundImage'] . ';' . $fetch['headerTextColor'];
  }
}
