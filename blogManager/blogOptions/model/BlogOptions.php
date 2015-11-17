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
    $username = htmlentities($username, ENT_QUOTES);

		$request = $bdd->prepare("INSERT INTO blog_options(username, headerBackgroundImage, headerTextColor, title, description)
                              VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY
                              UPDATE headerBackgroundImage = VALUES(headerBackgroundImage),
                              headerTextColor = VALUES(headerTextColor),
                              title = VALUES(title),
                              description = VALUES(description)");
    $request->execute(array($username, $headerBackgroundImage, $headerTextColor, $title,
                            $description));

    echo 'ok';
  }
}
