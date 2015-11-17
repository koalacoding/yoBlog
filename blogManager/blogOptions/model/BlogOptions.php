<?php
class BlogOptions {
  /*-------------------------------------------
  ---------------------------------------------
  --------------GET BLOG OPTIONS---------------
  ---------------------------------------------
  -------------------------------------------*/

  function getBlogOptions($username) {
		require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $request = $bdd->prepare("SELECT headerBackgroundImage, headerTextColor, title, description
                              FROM blog_options WHERE username=?");
    $request->execute(array($username));
    $fetch = $request->fetch();

    return $fetch;
  }

  /*----------------------------------------------
  ------------------------------------------------
  --------------UPDATE BLOG OPTIONS---------------
  ------------------------------------------------
  ----------------------------------------------*/

  function updateBlogOptions($headerBackgroundImage, $headerTextColor, $title, $description,
                             $username) {
		require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');


    $headerBackgroundImage = htmlentities($headerBackgroundImage, ENT_QUOTES);
    $headerTextColor = htmlentities($headerTextColor, ENT_QUOTES);
    $title = htmlentities($title, ENT_QUOTES);
    $description = htmlentities($description, ENT_QUOTES);

		$request = $bdd->prepare("UPDATE blog_options SET headerBackgroundImage=?, headerTextColor=?,
                                                      title=?, description=? WHERE username=?");
    $request->execute(array($headerBackgroundImage, $headerTextColor, $title, $description,
                            $username));
    $request->closeCursor();

    echo 'ok';
  }
}
