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

  /*------------------------------------
  --------------------------------------
  --------------GET POSTS---------------
  --------------------------------------
  ------------------------------------*/

  function getPosts($username) {
	  require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');
    $fetch = array();
    $tempString = '';
    $string = '';

    $username = htmlentities($username, ENT_QUOTES);

    $request = $bdd->prepare("SELECT title, content, postDate FROM posts WHERE username=?
                            ORDER BY timeSinceEpoch DESC");
    $request->execute(array($username));

    while ($fetch = $request->fetch()) {
      $tempString = '<div class="post">
                       <div class="postTitle">'.$fetch['title'].'</div>
                       <div class="postDate">'.$fetch['postDate'].'</div>
                       <div class="postContent">'.$fetch['content'].'</div>
                     </div>';
      $string .= $tempString;
    }

    $request->closeCursor();

    return $string;
  }
}
