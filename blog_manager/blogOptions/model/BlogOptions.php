<?php
class BlogOptions {
  /*-------------------------------------------
  ---------------------------------------------
  --------------GET BLOG OPTIONS---------------
  ---------------------------------------------
  -------------------------------------------*/

  function getBlogOptions($username) {
		require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $request = $bdd->prepare("SELECT backgroundImage, title, description, headerTextColor
                              FROM blogOptions WHERE user=?");
    }

  /*----------------------------------------------
  ------------------------------------------------
  --------------UPDATE BLOG OPTIONS---------------
  ------------------------------------------------
  ----------------------------------------------*/

  function updateBlogOptions($headerBackgroundImage, $headerTextColor, $title, $description,
                             $username) {
		require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $headerBackgroundImage = htmlspecialchars($headerBackgroundImage);
    $headerTextColor = htmlspecialchars($headerTextColor);
    $title = htmlspecialchars($title);
    $description = htmlspecialchars($description);

		$request = $bdd->prepare("UPDATE blogOptions SET headerBackgroundImage=?, headerTextColor=?,
                                                      title=?, description=? WHERE username=?");
    $request->execute(array($headerBackgroundImage, $headerTextColor, $title, $description,
                            $username));
    $request->closeCursor();

    echo 'ok';
  }
}
