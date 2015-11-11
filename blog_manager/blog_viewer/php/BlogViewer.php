<?php
class BlogViewer {
  /*-------------------------------------------
  ---------------------------------------------
  --------------GET BLOG OPTIONS---------------
  ---------------------------------------------
  -------------------------------------------*/

  function getBlogOptions($username) {
		require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/sql/sql_connexion.php');

    $request = $bdd->prepare("SELECT title, description FROM blog_options
                            WHERE username=?");
    $request->execute(array($username));
    $fetch = $request->fetch();
    $request->closeCursor();

    return $fetch; // Returns an array containing the blog's options.
  }


    /*-------------------------------------------------
    ----------GET TITLE AND DESCRIPTION COLOR----------
    -------------------------------------------------*/

    function getTitleAndDescriptionColor($username) {
		  require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/sql/sql_connexion.php');

      $request = $bdd->prepare("SELECT titleAndDescriptionColor FROM blog_options
                                WHERE username=?");
      $request->execute(array($username));
      $fetch = $request->fetch();
      $request->closeCursor();

      echo $fetch['titleAndDescriptionColor'];
    }


  /*------------------------------------
  --------------------------------------
  --------------SHOW BLOG---------------
  --------------------------------------
  ------------------------------------*/

  function showBlog($title, $description) {
    echo '<div class="jumbotron vertical-center">
            <div class="container">
              <h1>'.$title.'</h1>
              <p>'.$description.'</p>
            </div>
          </div>

          <div class="container">
            <p>This is another paragraphee.</p>
            <p>This is a paragraph.</p>
            <p>This is another paragraph.</p>
          </div>';
  }
}
